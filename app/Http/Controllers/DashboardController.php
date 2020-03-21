<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session ;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sql="select category_name from categories group by category_name";// where `craigslist_pay`=1 AND `craigslist`=1";
        $cates = DB::select($sql); 
        $sql="select metro_name from locations group by metro_name";// where `craigslist_pay`=1 AND `craigslist`=1";
        $data["cates"]=$cates; 
        $metros = DB::select($sql); 
        $data["metros"]=$metros; 
        $data["users"]=DB::table('users')->get();
        $data["campaigns"]=DB::table('campaigns')->get();
        $data["cards"]=DB::table('cards')->get();
        if($request->session()!=null){
            $user_id=$request->session()->get("user_id");
            $user=DB::table('users')->where("user_id",$user_id)->get();
            $data["udata"]=$user;
        };

        return view('home')->with($data);
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

    }
    public function setRouteParam(Request $request)
    {
        $data=$request->input();
        if(isset($data["campaign_id"])) $request->session()->put("campaign_id",$data["campaign_id"]);
        if(isset($data["metro_name"])) $request->session()->put("metro_name",$data["metro_name"]);
        if(isset($data["account_id"])) $request->session()->put("account_id",$data["account_id"]);
        if(isset($data["ad_id"])) $request->session()->put("ad_id",$data["ad_id"]);
        if(isset($data["post_id"])) $request->session()->put("post_id",$data["post_id"]);
        if(isset($data["start"])) $request->session()->put("start",$data["start"]);
        else{
            $request->session()->put("start",null);
            $request->session()->put("end",null);
        }
        if(isset($data["end"])) $request->session()->put("end",$data["end"]);
        return 'ok';
    }
    public function addCampaign(Request $request)
    {
       $data=$request->input();
       $data["user_id"]=$request->session()->get("user_id");
       if($data["user_id"]){
            DB::table('campaigns')->insert($data);
            echo "ok";
       } else echo "no";
    }
    public function updateCampaign(Request $request)
    {
       $query=$request->input();
      if(isset($query["campaign_name"])) $data["campaign_name"]=$query["campaign_name"];
       if(isset($query["metro_name"])) $data["metro_name"]=$query["metro_name"];
            DB::table('campaigns')
                ->where('campaign_id', $query['campaign_id'])
                ->update($data);
            echo "ok";
    }
    public function deleteCampaign(Request $request)
    {
        $query = $request->input();
        if(isset($query["id"])) DB::table('campaigns')->where('campaign_id', $query["id"])->delete();
        echo "ok";
    }
    public function getCampaign(Request $request)
    {
        $query = $request->input("search");
        $sql="SELECT (@row_number:=@row_number + 1) AS num ,campaign_id,campaign_name,metro_name FROM  campaigns,(SELECT @row_number:=0) AS t where metro_name like '%' ";
        if(isset($query["metro_name"])) $sql.=" and metro_name='".$query["metro_name"]."'";
        $sort = $request->input('sort');
        if(isset($sort['field'])) $sql.=" order by ".$sort['field'].' '.$sort['sort'];
        $campaign = DB::select($sql);
        echo json_encode($campaign);

    }
    public function getPostCharts(Request $request)
    {
        $query = $request->input();
        $cquery = $request->input("filter");
        //start,end,category,psite,
        $end = date('Y-m-d');
        $start=date('Y-m-d', strtotime($end. ' - 30 days'));
        $barsql="";
        $sql="select pid_date date, craigslist_pay*5 `value`  from posts a join campaigns b on a.campaign_id=b.campaign_id ";// where `craigslist_pay`=1 AND `craigslist`=1";
        $sql30= "select CONVERT(pid_date,DATE) date, sum(craigslist_pay)*5 `value`  from posts a join campaigns b on a.campaign_id=b.campaign_id  ".
        " where CONVERT(pid_date,DATE)>=CONVERT('".$start."',DATE) and CONVERT(pid_date,DATE)<=CONVERT('".$end."',DATE)";
        if(isset($query["start"])){
            $sql.=" where CONVERT(pid_date,DATE)>=CONVERT('".$query["start"]."',DATE) and CONVERT(pid_date,DATE)<=CONVERT('".$query["end"]."',DATE)";
        }
        if(isset($query["category"])){ $sql.=" and category_name='".$query["category"]."'"; $sql30.=" and category_name='".$query["category"]."'";}
        if(isset($query["psite"])){  $sql.=" and ".$query["psite"]."='1'"; $sql30.=" and ".$query["psite"]."='1'";}
        if(isset($query["campaign_id"])) { $sql.=" and a.campaign_id='".$query["campaign_id"]."'";$sql30.=" and a.campaign_id='".$query["campaign_id"]."'";}
        if(isset($query["account_id"])) { $sql.=" and account_id='".$query["account_id"]."'";$sql30.=" and account_id='".$query["account_id"]."'";}
        $checks=array("craigslist","craigslist_pay","offerup","offerup_pay","letgo_pay","letgo","fbmarket","fbmarket_pay");
        if(isset($query["metro_name"])){ $sql.=" and metro_name='".$query["metro_name"]."'";$sql30.=" and metro_name='".$query["metro_name"]."'";}
        for($i=0;$i<sizeof($checks);$i++){
             if(isset($cquery[$checks[$i]])&&$cquery[$checks[$i]]==1)
            {             
                $sql.=" and ".$checks[$i]."=1";
                $sql30.=" and ".$checks[$i]."=1";  
            }
        }
        
        $posts = DB::select($sql30." group by CONVERT(pid_date,DATE) order by CONVERT(pid_date,DATE) ");
        $data["posts"]=json_encode($posts);
        $data["posts_query"]=$sql30." group by CONVERT(pid_date,DATE) order by CONVERT(pid_date,DATE) ";
        $barsql=" select sum(value) value from ( ".$sql.") as x";
        $bar_posts = DB::select($barsql);
        $data["money_bar"]=json_encode($bar_posts);
        $data["moneybar_sql"]=$barsql;
        //////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $sql="select count(*) value,DATE(pid_date) date from posts a join campaigns b on a.campaign_id=b.campaign_id ";// where `craigslist_pay`=1 AND `craigslist`=1";
        $account_sql="select count(*) value from accounts ";
        $post_sql="select count(*) value from posts a join campaigns b on a.campaign_id=b.campaign_id";
        $actsql="select count(*) value from ads where active='1' ";
        $sql.=" where CONVERT(pid_date,DATE)>=CONVERT('".$start."',DATE) and CONVERT(pid_date,DATE)<=CONVERT('".$end."',DATE)";
        if(isset($query["start"])){
           
            $post_sql.=" where CONVERT(pid_date,DATE)>=CONVERT('".$query["start"]."',DATE) and CONVERT(pid_date,DATE)<=CONVERT('".$query["end"]."',DATE)";
            $account_sql.=" where email_id like '%' ";
        }
        if(isset($query["category"])){ $sql.=" and category_name='".$query["category"]."'"; }
        if(isset($query["metro_name"])){ $sql.=" and metro_name='".$query["metro_name"]."'"; $post_sql.=" and metro_name='".$query["metro_name"]."'"; $account_sql.=" and metro_name='".$query["metro_name"]."'";}
        if(isset($query["psite"])) $sql.=" and ".$query["psite"]."='1'";
        if(isset($query["campaign_id"])){ $sql.=" and a.campaign_id='".$query["campaign_id"]."'";$actsql.=" and campaign_id='".$query["campaign_id"]."'";$post_sql.=" and a.campaign_id='".$query["campaign_id"]."'";$account_sql.=" and campaign_id='".$query["campaign_id"]."'";}
        if(isset($query["account_id"])) { $sql.=" and account_id='".$query["account_id"]."'";$actsql.=" and account_id='".$query["account_id"]."'";$post_sql.=" and account_id='".$query["account_id"]."'"; $account_sql.=" and account_id='".$query["account_id"]."'";}
        for($i=0;$i<sizeof($checks);$i++){
            if(isset($cquery[$checks[$i]])&&$cquery[$checks[$i]]==1)
           {             
               $sql.=" and ".$checks[$i]."=1";
               $actsql.=" and ".$checks[$i]."=1";
               $post_sql.=" and ".$checks[$i]."=1"; 
               $account_sql.=" and ".$checks[$i]."=1"; 
           }
       }
        $sql.=" and ad_status=1";
        $sql.=" group by DATE(pid_date) order by pid_date";
        $ads = DB::select($sql);
        $data["ads"]=json_encode($ads);
        $data["ads_query"]=$sql;
        $barsql=" select sum(value) value from ( ".$sql.") as x";
        $ads_posts = DB::select($barsql);
        $data["ads_bar"]=json_encode($ads_posts);
        ///////////////////////////////////////////////////////
        $active_account = DB::select($account_sql." and active='1'");
        $data["active_account"]=json_encode($active_account);
        $hold_account = DB::select($account_sql." and notes='hold'");
        $data["hold_account"]=json_encode($hold_account);
        /////////////////////post bar chart/////////////////////////////////
        if(isset($query["ad_id"])) $post_sql.=" and ad_id='".$query["ad_id"]."'";
        $posted_ads = DB::select($post_sql." and ad_status='1'");
        $data["posted_ads"]=json_encode($posted_ads);
        $data["posted_ads_query"]=$post_sql;
        $flaged_ads = DB::select($post_sql." and ad_status='2'");
        $data["flaged_ads"]=json_encode($flaged_ads);
        ////active ads
        $active_ads = DB::select($actsql);
        $data["active_ads"]=json_encode($active_ads);
        
        echo json_encode($data);
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
        $sql="select c.*,d.email_id,d.profile_imgs from (select a.*,b.user_name from posts a join users b on a.user_id=b.user_id) c join accounts d on c.account_id=d.account_id";
         $posts = DB::select($sql);
          echo json_encode($posts);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }
    public function delete(Request $request)
    {

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
