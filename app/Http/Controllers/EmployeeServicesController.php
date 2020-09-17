<?php

namespace App\Http\Controllers;

use App\Userservice;
use Illuminate\Http\Request;
use Auth;
use App\Service;
use App\Location;

class EmployeeServicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $userservices = Userservice::where('user_id','=',$id)->get();

        return view('employee.services.index')->with('userservices',$userservices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;

        $services = Service::pluck('description','id');

        return view ('employee.services.create')->with(['user_id'=>$user_id, 'services'=>$services]);
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
            'service_id'=>'required',



        ]);

        date_default_timezone_set('Asia/Manila');

        $userservice = new Userservice;

        $userservice->service_id = $request->input('service_id');
        $userservice->user_id = $request->input('user_id');


        $userservice->save();

        return redirect(route('employee.services.index'))->with('success','Service Recorded!');
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

        $services = Service::pluck('description','id');

        return view ('employee.services.edit')->with(['userservice'=>$userservice,'services'=>$services]);
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
            'service_id'=>'required',



        ]);

        date_default_timezone_set('Asia/Manila');

        $userservice = Userservice::find($id);

        $userservice->service_id = $request->input('service_id');




        $userservice->save();

        return redirect(route('employee.services.index'))->with('success','Service Recorded!');
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
