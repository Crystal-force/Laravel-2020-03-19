<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session ;
use Illuminate\Http\Request;

class TokenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage/token');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $fds=array("token_name","token_value");
        $query = $request->input();
        for($i=0;$i<sizeof($fds);$i++){
            if(isset($query[$fds[$i]])){
                 $r=$query[$fds[$i]];
                 $data[$fds[$i]]=($r!=null)?$r:'';
            }else $data[$fds[$i]]='';
        }
        DB::table('tokens')->insert($data);
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
        $sql="SELECT (@row_number:=@row_number + 1) AS num ,a.* FROM  tokens a,(SELECT @row_number:=0) AS t where token_name like '%'  ";
        if(isset($query["token_name"])) $sql.=" and token_name like '".$query["token_name"]."%'";
        if(isset($query["token_value"])) $sql.=" and token_value like '".$query["token_value"]."%'";
        $sort = $request->input('sort');
        if(isset($sort['field'])) $sql.=" order by ".$sort['field'].' '.$sort['sort'];
         $tokens = DB::select($sql);
        echo json_encode($tokens);
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
        $fds=array("token_name","token_value");
        $query = $request->input();
        for($i=0;$i<sizeof($fds);$i++){
            if(isset($query[$fds[$i]])){
                 $r=$query[$fds[$i]];
                 $data[$fds[$i]]=($r!=null)?$r:'';
            }else $data[$fds[$i]]='';
        }
       DB::table('tokens')
            ->where('token_id', $query['token_id'])
            ->update($data);
        echo "ok";
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        DB::table('tokens')->where('token_id', $id)->delete();
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
