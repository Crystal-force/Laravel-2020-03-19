<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session ;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage/location');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $fds=array("metro_name","spec_location","spec_location_child","city_name","state","zip_code","city_code");
        $query = $request->input();
        for($i=0;$i<sizeof($fds);$i++){
            if(isset($query[$fds[$i]])){
                 $r=$query[$fds[$i]];
                 $data[$fds[$i]]=($r!=null)?$r:'';
            }else{
                $data[$fds[$i]]='';
                if($fds[$i]=="zip_code") $data[$fds[$i]]='0';
           }
        }
        if(isset($query['used'])){
            $data['used']=($query['used']=="on")?'1':'0';
        }else $data['used']='0';
        DB::table('locations')->insert($data);
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
        $sql="SELECT (@row_number:=@row_number + 1) AS num ,a.* FROM  locations a,(SELECT @row_number:=0) AS t where metro_name like '%'  ";
        if(isset($query["metro_name"])) $sql.=" and metro_name like '".$query["metro_name"]."%'";
        if(isset($query["spec_location"])) $sql.=" and spec_location like '".$query["spec_location"]."%'";
        $sort = $request->input('sort');
        if(isset($sort['field'])) $sql.=" order by ".$sort['field'].' '.$sort['sort'];
         $cats = DB::select($sql);
        echo json_encode($cats);
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
        $fds=array("metro_name","spec_location","spec_location_child","city_name","state","zip_code","city_code");
        $query = $request->input();
        for($i=0;$i<sizeof($fds);$i++){
            if(isset($query[$fds[$i]])){
                 $r=$query[$fds[$i]];
                 $data[$fds[$i]]=($r!=null)?$r:'';
            }else{
                 $data[$fds[$i]]='';
                 if($fds[$i]=="zip_code") $data[$fds[$i]]='0';
            }
        }
        if(isset($query['used'])){
            $data['used']=($query['used']=="on")?'1':'0';
        }else $data['used']='0';
       DB::table('locations')
            ->where('location_id', $query['location_id'])
            ->update($data);
        echo "ok";
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        DB::table('locations')->where('location_id', $id)->delete();
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
