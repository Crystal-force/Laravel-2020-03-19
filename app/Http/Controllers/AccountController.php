<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session ;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data["users"]=DB::table('users')->get();
        $data["campaigns"]=DB::table('campaigns')->get();
        $data["scampaigns"]=$data["campaigns"];
        $data["cards"]=DB::table('cards')->get();
        $sql="select metro_name from locations  group by metro_name ";
        $data["metros"] = DB::select($sql);
        $query = $request->input();
        if(isset($query["flag"])&&$query["flag"]>0) $data["flag"]=1;
        else { 
                $data["flag"]=0;
               if($request->session()->get("campaign_id")) $request->session()->forget("campaign_id");
        } 
        if($request->session()->get("campaign_id")){
            $data["campaign_id"]=$request->session()->get("campaign_id");
            $data["start"]=$request->session()->get("start");
            $data["end"]=$request->session()->get("end");
            $metro=DB::table('campaigns')->where('campaign_id',$data["campaign_id"])->get();
            if($metro[0]->metro_name!="GLOBAL") $data["metros"]=$metro;

        }
        return view('manage/account')->with($data);
    }
    public function getLocation(Request $request)
    {
       $campaignid = $request->input('campaignid');
       if($campaignid){
            $metro=DB::table('campaigns')->where('campaign_id',$campaignid)->get();
                if($metro[0]->metro_name=="GLOBAL"){
                $sql="select metro_name from locations  group by metro_name ";
                $metros = DB::select($sql);
                echo json_encode($metros);
            }else{
                    echo json_encode($metro);
                }
        }else echo json_encode("");
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $fds=array("campaign_id","b_day","metro_name","total_ads_used","active_ads_cl","removed_ads_cl","emulator_id","post_loop","last_post_id","ad_on_top","last_category_posted",
            "notes","email_id","email_password","phone_number","b_day",
            "profile_id","geo_latitude","geo_longitude","fist_name","last_name","account_street","account_city","account_state","account_zipcode","gender","card_id","used");
            $checks=array("craigslist_pay","offerup_pay","letgo_pay","fbmarket_pay","craigslist","offerup","letgo","fbmarket","active","auto_post","post_trigger");
            $query = $request->input();
            for($i=0;$i<sizeof($fds);$i++){
                if(isset($query[$fds[$i]])){
                     $r=$query[$fds[$i]];
                     $data[$fds[$i]]=($r!=null)?$r:'';
                }else{
                    $data[$fds[$i]]='';
                    if($fds[$i]=="notes") $data[$fds[$i]]='';
                }
            }
           // if($request->session()->get("campaign_id")) 
            $data["user_id"]=$request->session()->get("user_id");
            for($i=0;$i<sizeof($checks);$i++){
                if(isset($query[$checks[$i]])){
                    $r=$query[$checks[$i]];
                    $data[$checks[$i]]=($r!=null&&($r=="on"))?'1':'0';
                }else $data[$checks[$i]]='0';
            }
            if(isset($query["schedule"])){
                $data["schedule"]=date($query["schedule"]);
           }
       $file = $request->profile_img;
       if($file){
           $file->move(public_path()."/img/users",$file->getClientOriginalName());
           $data['profile_imgs']="/img/users/".$file->getClientOriginalName();
       }else $data['profile_imgs']="";
        DB::table('accounts')->insert($data);
        echo "ok";
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $query = $request->input('search');
        $sql1=" select count(*) cnt,account_id, campaign_id from ads group by account_id,campaign_id ";
        $sql="SELECT (@row_number:=@row_number + 1) AS num ,c.* FROM (\n".
                "	select a.*,IF((b.cnt is null),0,b.cnt) cnt from accounts a left join ( ".$sql1." ) b on a.account_id=b.account_id and a.campaign_id=b.campaign_id  \n".
                ") c,(SELECT @row_number:=0) AS t where metro_name like '%'"; 
        if(isset($query["start"])){
            $sql.=" and CONVERT(pid_date,DATE)>=CONVERT('".$query["start"]."',DATE) and CONVERT(pid_date,DATE)<=CONVERT('".$query["end"]."',DATE)";
        }
        if(isset($query["campaign_id"])) $sql.=" and campaign_id='".$query["campaign_id"]."'"; 
       // else if($request->session()->get("campaign_id")) $sql.=" and campaign_id='".$request->session()->get("campaign_id")."'"; 
       
        if(isset($query["metro"])) $sql.=" and metro_name='".$query["metro"]."'";  
        $checks=array("craigslist","craigslist_pay","offerup","offerup_pay","letgo_pay","letgo","fbmarket","fbmarket_pay");
        for($i=0;$i<sizeof($checks);$i++){
             if(isset($query[$checks[$i]])&&$query[$checks[$i]]==1)
            {             
                $sql.=" and ".$checks[$i]."=1"; 
            }
        }
        $sort = $request->input('sort');
        if(isset($sort['field'])){
            if($sort['field']=="post_loop") $sql.=' order by CONVERT(post_loop,INT) '.$sort['sort'];
             else $sql.=" order by ".$sort['field'].' '.$sort['sort'];
        }
         $accounts = DB::select($sql);
        echo json_encode($accounts);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }
    public function updateAccountCell(Request $request)
    {
        $fds=array("post_trigger","auto_post","active","post_loop","schedule");
        $query = $request->input("data");
        for($i=0;$i<sizeof($fds);$i++){
            if(isset($query[$fds[$i]])){
                 $r=$query[$fds[$i]];
                 $data[$fds[$i]]=($r!=null)?$r:'0';
                 if($fds[$i]=="schedule") $data["schedule"]=$r;
            }
        }
       DB::table('accounts')
            ->where('account_id', $query['account_id'])
            ->update($data);
        echo "ok";
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fds=array("campaign_id","b_day","metro_name","active_ads_cl","removed_ads_cl","emulator_id","post_loop","last_post_id","ad_on_top","last_category_posted",
            "notes","email_id","email_password","phone_number",//"b_day","schedule",
            "profile_id","geo_latitude","geo_longitude","fist_name","last_name","account_street","account_city","account_state","account_zipcode","gender","card_id","used");
            $checks=array("craigslist_pay","offerup_pay","letgo_pay","fbmarket_pay","craigslist","offerup","letgo","fbmarket","active","auto_post","post_trigger");
            $query = $request->input();
            $data=array();
            for($i=0;$i<sizeof($fds);$i++){
                if(isset($query[$fds[$i]])){
                     $r=$query[$fds[$i]];
                     $data[$fds[$i]]=($r!=null)?$r:'';
                }else{
                     $data[$fds[$i]]='';
                     if($fds[$i]=="notes") $data[$fds[$i]]='';
                }
            }
            for($i=0;$i<sizeof($checks);$i++){
                if(isset($query[$checks[$i]])){
                    $r=$query[$checks[$i]];
                    $data[$checks[$i]]=($r!=null&&($r=="on"))?'1':'0';
                }else $data[$checks[$i]]='0';
            }
           // if(isset($query["trigger"]) && $query["trigger"]=="on") $data["post_trigger"]=1;
           if(isset($query["schedule"])){
                $data["schedule"]=date($query["schedule"]);
           }
       $file = $request->profile_img;
       if($file){
           $file->move(public_path()."/img/users",$file->getClientOriginalName());
           $data['profile_imgs']="/img/users/".$file->getClientOriginalName();
       }
       DB::table('accounts')
            ->where('account_id', $query['account_id'])
            ->update($data);
        echo "ok";
    }
    public function delete(Request $request)
    {
        $query = $request->input();
        if(isset($query["id"])) DB::table('accounts')->where('account_id', $query["id"])->delete();
        else if(isset($query["ids"])) DB::table('accounts')->whereIn('account_id', $query["ids"])->delete();
        echo "ok";
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
