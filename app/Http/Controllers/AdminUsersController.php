<?php

namespace App\Http\Controllers;

use App\Userservice;
use App\Service;
use App\User;
use App\Office;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminUsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userservices = Userservice::get()->all();
        return view('admin.users.index')->with(['userservices'=>$userservices]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $services = Service::select(DB::raw("concat(services.description,' - ',offices.code) as name"),'services.id as id')->join('offices','offices.id','services.office_id')->get();

        $services = $services->pluck('name','id');

        return view ('admin.users.create')->with(['services'=>$services]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            'service_id'=>'required',

        ]);

        date_default_timezone_set('Asia/Manila');

        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request['password']);
        $user->save();

        $userservice = New Userservice;
        $userservice->user_id = $user->id;
        $userservice->service_id = $request->input('service_id');
        $userservice->save();

        return redirect(route('admin.users.index'))->with('alert','User Recorded!');
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
        $userservice = Userservice::find($id);

        $services = Service::select(DB::raw("concat(services.description,' - ',offices.code) as name"),'services.id as id')->join('offices','offices.id','services.office_id')->get();

        $services = $services->pluck('name','id');

//        $services = Service::pluck('description','id');

        return view ('admin.users.edit')->with(['userservice'=>$userservice, 'services'=>$services]);
    }

    public function addservice($id)
    {
        $user = User::find($id);

        $services = Service::select(DB::raw("concat(services.description,' - ',offices.code) as name"),'services.id as id')->join('offices','offices.id','services.office_id')->get();

        $services = $services->pluck('name','id');
//        $services = Service::pluck('description','id');

        return view ('admin.users.addservice')->with(['user'=>$user, 'services'=>$services]);
    }

    public function storeaddservice(Request $request)
    {
        $request->validate([
            'service_id'=>'required',

        ]);



        $userservice = new Userservice;

        $userservice->user_id = $request->input('user_id');
        $userservice->service_id = $request->input('service_id');
        $userservice->save();




        return redirect(route('admin.users.index'))->with('alert','User Recorded!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            'email'=>'required',


        ]);

        date_default_timezone_set('Asia/Manila');

        $userservice = Userservice::find($id);

        $user_id = $userservice->user_id;


        $user = User::find($user_id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        $userservice->service_id = $request->input('service_id');
        $userservice->save();

        return redirect(route('admin.users.index'))->with('success','User Updated!');
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
