<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session ;
use Illuminate\Http\Request;

class CallController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sql="select category_name from categories  group by category_name ";
        $data["category"] = DB::select($sql);
        $sql="select spec_location from locations  group by spec_location ";
        $data["spec_location"] = DB::select($sql);
        return view('manage/call')->with($data);
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
        $sql="select * from calls_log where answered_by like '%' ";
        //called_to,phone_number_tag,answered_by
        if(isset($query["start"])){
            $sql.=" and CONVERT(call_date,DATE)>=CONVERT('".$query["start"]."',DATE) and CONVERT(call_date,DATE)<=CONVERT('".$query["end"]."',DATE)";
        }
        if(isset($query["called_to"])) $sql.=" and called_to like '%".$query["called_to"]."%'";
        if(isset($query["phone_number_tag"])) $sql.=" and phone_number_tag like '%".$query["phone_number_tag"]."%'";
        if(isset($query["answered_by"])) $sql.=" and answered_by like '%".$query["answered_by"]."%'";
        $sort = $request->input('sort');
        if(isset($sort['field'])) $sql.=" order by ".$sort['field'].' '.$sort['sort'];
         $posts = DB::select($sql);
          echo json_encode($posts);
    }
    public function getCallCharts(Request $request){

        $query = $request->input("search");
        $sql="select count(*) value from calls_log where answered_by like '%'";
        $sql30="select count(*) value,call_date date from calls_log where answered_by like '%'";
       if(isset($query["start"])){
            $sql.=" and CONVERT(call_date,DATE)>=CONVERT('".$query["start"]."',DATE) and CONVERT(call_date,DATE)<=CONVERT('".$query["end"]."',DATE)";
            $end30 = date('Y-m-d');
            $start30=date('Y-m-d', strtotime($end30. ' - 30 days'));
            $sql30.=" and CONVERT(call_date,DATE)>=CONVERT('".$start30."',DATE) and CONVERT(call_date,DATE)<=CONVERT('".$end30."',DATE)";
       }
        if(isset($query["called_to"])){$sql.=" and called_to like '%".$query["called_to"]."%'";$sql30.=" and called_to like '%".$query["called_to"]."%'";}
        if(isset($query["phone_number_tag"])){$sql.=" and phone_number_tag like '%".$query["phone_number_tag"]."%'";$sql30.=" and phone_number_tag like '%".$query["phone_number_tag"]."%'";}
        if(isset($query["answered_by"])){$sql.=" and answered_by like '%".$query["answered_by"]."%'";$sql30.=" and answered_by like '%".$query["answered_by"]."%'";}
        $calls = DB::select($sql);
        $data["calls"]=json_encode($calls);
        $data["calls_query"]=$sql;
        $calls30 = DB::select($sql30." group by call_date");
        $data["calls30"]=json_encode($calls30);
        $data["calls30_query"]=$sql30;
       // echo $sql30."<br>";
        echo json_encode($data);
        
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
