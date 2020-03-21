<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session ;
use Illuminate\Http\Request;

class CardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('manage/card');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         $fds=array("f_name","l_name","c_number","c_sec","c_month","c_year","c_address","c_city","c_state","c_zip","balance","daily_limit");
        $query = $request->input();
        $r=null;
        for($i=0;$i<sizeof($fds);$i++){
            if(isset($query[$fds[$i]])){
                 $r=$query[$fds[$i]];
                 $data[$fds[$i]]=($r!=null)?$r:'';
            }else{ 
                $data[$fds[$i]]='';
                if($fds[$i]=="balance"||$fds[$i]=="daily_limit") $data[$fds[$i]]='0';
            }
        }
        
        if(isset($query['active'])){
            $data['active']=($query['active']=="on")?'1':'0';
        }else $data['active']='0';
        DB::table('cards')->insert($data);
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
        $sql="SELECT (@row_number:=@row_number + 1) AS num ,a.* FROM  cards a,(SELECT @row_number:=0) AS t where l_name like '%' ";
        if(isset($query["sfist_name"])) $sql.=" and f_name like '".$query["sfist_name"]."%'";
        if(isset($query["card_number"])) $sql.=" and c_number like '".$query["card_number"]."%'";
        $sort = $request->input('sort');
        if(isset($sort['field'])) $sql.=" order by ".$sort['field'].' '.$sort['sort'];
         $cards = DB::select($sql);
        echo json_encode($cards);
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
        $fds=array("f_name","l_name","c_number","c_sec","c_month","c_year","c_address","c_city","c_state","c_zip","balance","daily_limit");
        $query = $request->input();
        for($i=0;$i<sizeof($fds);$i++){
            if(isset($query[$fds[$i]])){
                 $r=$query[$fds[$i]];
                 $data[$fds[$i]]=($r!=null)?$r:'';
            }else{ 
                $data[$fds[$i]]='';
                if($fds[$i]=="balance"||$fds[$i]=="daily_limit") $data[$fds[$i]]='0';
            }
        }
        if(isset($query['active'])){
            $data['active']=($query['active']=="on")?'1':'0';
        }else $data['active']='0';
       DB::table('cards')
            ->where('card_id', $query['card_id'])
            ->update($data);
        echo "ok";
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        DB::table('cards')->where('card_id', $id)->delete();
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
