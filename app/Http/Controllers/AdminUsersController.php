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
        $users = User::get()->all();
        return view('admin.users.index')->with(['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

//        $services = Service::select(DB::raw("concat(services.description,' - ',offices.code) as name"),'services.id as id')->join('offices','offices.id','services.office_id')->get();

//        $services = $services->pluck('name','id');
        $offices = Office::pluck('name','id');

        return view ('admin.users.create')->with(['offices'=>$offices]);
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
//            'service_id'=>'required',
            'office_id'=>'required',

        ]);

        date_default_timezone_set('Asia/Manila');

        $user = new User;

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request['password']);
        $user->office_id = $request->input('office_id');
        $user->save();

//        $userservice = New Userservice;
//        $userservice->user_id = $user->id;
//        $userservice->service_id = $request->input('service_id');
//        $userservice->save();

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
//        $userservice = Userservice::find($id);

//        $services = Service::select(DB::raw("concat(services.description,' - ',offices.code) as name"),'services.id as id')->join('offices','offices.id','services.office_id')->get();

//        $services = $services->pluck('name','id');
        $user = User::find($id);
        $offices = Office::pluck('name','id');

//        $services = Service::pluck('description','id');

        return view ('admin.users.edit')->with(['user'=>$user, 'offices'=>$offices]);
//        return view ('admin.users.edit')->with(['userservice'=>$userservice, 'services'=>$services, 'offices'=>$offices]);
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
            'office_id'=>'required',


        ]);

        date_default_timezone_set('Asia/Manila');

//        $userservice = Userservice::find($id);
//
//        $user_id = $userservice->user_id;


//        $user = User::find($user_id);
        $user = User::find($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->office_id = $request->input('office_id');
        $user->save();

//        $userservice->service_id = $request->input('service_id');
//        $userservice->save();

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


    public function addservice($id)
    {
        $user = User::find($id);

        $office_id = $user->office_id;

//        $services = Service::select(DB::raw("concat(services.description,' - ',offices.code) as name"),'services.id as id')->join('offices','offices.id','services.office_id')->get();

//        $userservice = Userservice::where('user_id','=',$user->id)->first();
//        $office_id = $userservice->service->office->id;


        $services = Service::where('office_id',$office_id)->pluck('description','id');
//        $services = Service::where('office_id',$office_id)->pluck('name','id');

//        $services = Service::pluck('description','id');

        return view ('admin.users.addservice')->with(['user'=>$user, 'services'=>$services]);
    }

    public function storeaddservice(Request $request)
    {
        $request->validate([
            'service_id'=>'required',

        ]);

        $user_id = $request->input('user_id');

        $userservice = new Userservice;

        $userservice->user_id = $request->input('user_id');
        $userservice->service_id = $request->input('service_id');
        $userservice->save();




        return redirect(route('admin.users.services.index', ['id'=>$user_id]))->with('alert','User Service Recorded!');
    }
     public function userserviceindex($id)
     {
         $user = User::find($id);

         $userservices = Userservice::where('user_id', $user->id)->get();

         return view('admin.users.services.index', compact('userservices', 'user'));
     }

     public function userserviceedit($id)
     {
         $userservice = Userservice::find($id);

         $office_id = $userservice->service->office_id;

         $services = Service::where('office_id', $office_id)->pluck('description','id');

         return view('admin.users.services.edit', compact('userservice', 'services'));
     }

    public function userserviceupdate(Request $request, $id)
    {
        $request->validate([
            'service_id'=>'required',

        ]);

        $user_id = $request->input('user_id');

        $userservice = Userservice::find($id);

        $userservice->user_id = $request->input('user_id');
        $userservice->service_id = $request->input('service_id');
        $userservice->save();




        return redirect(route('admin.users.services.index', ['id'=>$user_id]))->with('alert','User Service Recorded!');
    }

    public function deleteuserservices($id)
    {
        $userservice = Userservice::find($id);

        $user_id = $userservice->user->id;

        $userservice->delete();

        return redirect(route('admin.users.services.index', ['id'=>$user_id]))->with('alert','User Service Deleted!');
    }
}
