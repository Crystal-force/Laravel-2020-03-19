<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session ;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sql="select category_name from categories  group by category_name ";
        $data["category"] = DB::select($sql);
        $sql="select spec_location from locations  group by spec_location ";
        $data["spec_location"] = DB::select($sql);
        $data["accounts"] = DB::table('accounts')->get();
        $data["ads"]=DB::table('ads')->get();
        $data["campaigns"]=DB::table('campaigns')->get();
        if($request->session()->get("campaign_id")){
            $data["campaign_id"]=$request->session()->get("campaign_id");
        }
        if($request->session()->get("ad_id")){
            $data["ad_id"]=$request->session()->get("ad_id");
            $data["start"]=$request->session()->get("start");
            $data["end"]=$request->session()->get("end");
        }
        if($request->session()->get("account_id")){
            $data["account_id"]=$request->session()->get("account_id");
        }
        $query = $request->input();
        if(isset($query["flag"])&&$query["flag"]>0) $data["flag"]=1;
        else { 
                $data["flag"]=0;
               //if($request->session()->get("campaign_id")) $request->session()->forget("campaign_id");
        } 
        return view('manage/post')->with($data);
     }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

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
        $sql="SELECT (@row_number:=@row_number + 1) AS num ,a.* FROM  posts a,(SELECT @row_number:=0) AS t where title like '%' ";
         if(isset($query["start"])){
            $sql.=" and CONVERT(pid_date,DATE)>=CONVERT('".$query["start"]."',DATE) and CONVERT(pid_date,DATE)<=CONVERT('".$query["end"]."',DATE)";
        }
        if(isset($query["category"])) $sql.=" and category_name='".$query["category"]."'";
        if(isset($query["psite"])) $sql.=" and ".$query["psite"]."='1'";
        if(isset($query["campaign_id"])) $sql.=" and campaign_id='".$query["campaign_id"]."'";
        if(isset($query["account_id"])) $sql.=" and account_id='".$query["account_id"]."'";
        if(isset($query["sads_id"])) $sql.=" and ad_id='".$query["sads_id"]."'";
        $sort = $request->input('sort');
        if(isset($sort['field'])) $sql.=" order by ".$sort['field'].' '.$sort['sort'];
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
