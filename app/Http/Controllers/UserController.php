<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Session ;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$a='[{"RecordID":1,"OrderID":"61715-075","Country":"China","ShipCountry":"CN","ShipCity":"Tieba","ShipName":"Collins, Dibbert and Hoeger","ShipAddress":"746 Pine View Junction","CompanyEmail":"nsailor0@livejournal.com","CompanyAgent":"Nixie Sailor","CompanyName":"Gleichner, Ziemann and Gutkowski","Currency":"CNY","Notes":"imperdiet nullam orci pede venenatis non sodales sed tincidunt eu felis fusce posuere felis sed lacus morbi","Department":"Outdoors","Website":"irs.gov","Latitude":35.0032213,"Longitude":102.913526,"ShipDate":"2/12/2018","PaymentDate":"2016-04-27 23:53:15","TimeZone":"Asia/Chongqing","TotalPayment":"$246154.65","Status":3,"Type":2,"Actions":null}]';

        return view('manage/user',['name' => 'James']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $email = $request->input('email');
        $name = $request->input('name');
        $lname = $request->input('lname');
       // $pwd = $request->input('pwd');
        $active = $request->input('active');
        $ads = $request->input('ads_allow');
        $act=0;
        $act=($active=="on")?1:0;
        $pwd=md5($request->input('new_pwd'));
        if(DB::table('users')->where([
            ['user_email', '=', $email],])->exists())
        {
            echo "exist";
        }else{
            DB::table('users')->insert(
                ['user_login' => $name,'user_pass' =>$pwd,'user_email' => $email,'user_name' => $name,'user_last_name' =>$lname,'display_name' => $name,'ads_allow' => $ads,'active' => $act]
            );           
            echo "ok";
        }
       
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
        $sql="SELECT (@row_number:=@row_number + 1) AS num ,a.* FROM  users a,(SELECT @row_number:=0) AS t where user_name like '%' ";
        if(isset($query["user_name"])) $sql.=" and user_name like '".$query["user_name"]."%'";
        if(isset($query["user_email"])) $sql.=" and user_email like '".$query["user_email"]."%'";
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id = $request->input('id');
        $data["user_email"] = $request->input('email');
        $data["user_name"] = $request->input('name');
        $data["user_last_name"] = $request->input('lname');
        $pwd = $request->input('new_pwd');
        if(isset($pwd)){
            $data["user_pass"]=md5($pwd);
        }
        $active = $request->input('active');
        $data["ads_allow"] = $request->input('ads_allow');
        $data["active"]=($active=="on")?1:0;
        DB::table('users')
            ->where('user_id', $id)
            ->update($data);
        echo "ok";
    }
    public function delete(Request $request)
    {
        $id = $request->input('id');
        DB::table('users')->where('user_id', $id)->delete();
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
