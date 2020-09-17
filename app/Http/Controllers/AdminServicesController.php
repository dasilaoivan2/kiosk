<?php

namespace App\Http\Controllers;

use App\Location;
use App\Service;
use App\User;
use App\Office;
use App\Userservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminServicesController extends Controller
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
        $services = Service::get()->all();
        return view('admin.services.index')->with(['services'=>$services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $users = User::pluck('name','id');
        $offices = Office::pluck('name','id');
        $locations = Location::pluck('description','id');
        return view ('admin.services.create')->with(['locations'=>$locations,'offices'=>$offices]);
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
            'desc'=>'required',
            'office_id'=>'required',
//            'user_id'=>'required',

        ]);

        date_default_timezone_set('Asia/Manila');

        $service = new Service;

        if($request->hasFile('icon')){

            $nameOfFile = date("Ymds")."-".$request->icon->getClientOriginalName();
            $request->icon->storeAs('public/icons',$nameOfFile);
        }
        else{
            $nameOfFile = NULL;
        }


        $service->description = $request->input('desc');
        $service->desc_vernacular = $request->input('desc_bisaya');
        $service->location_id = $request->input('location_id');
        $service->office_id = $request->input('office_id');
        $service->icon = $nameOfFile;

        $service->save();

//        $userservice = New Userservice;
//        $userservice->service_id = $service->id;
//        $userservice->user_id = $request->input('user_id');
//        $userservice->save();

        return redirect(route('admin.services.index'))->with('success','Service Recorded!');
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
        $service = Service::find($id);
        $offices = Office::pluck('name','id');
//        $users = User::pluck('name','id');
        $locations = Location::pluck('description','id');

        return view ('admin.services.edit')->with(['locations'=>$locations,'service'=>$service,'offices'=>$offices]);
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
            'desc'=>'required',

//            'user_id'=>'required',

        ]);

        date_default_timezone_set('Asia/Manila');

        $service = Service::find($id);

        $service->description = $request->input('desc');
        $service->desc_vernacular = $request->input('desc_bisaya');
        $service->location_id = $request->input('location_id');
//        $service->user_id = $request->input('user_id');
        $service->office_id = $request->input('office_id');

        if($request->hasFile('icon'))

        {

            $oldfilename = $service->icon;
            $nameOfFile = date("Ymds")."-".$request->icon->getClientOriginalName();

            $request->icon->storeAs('public/icons',$nameOfFile);

            Storage::delete('public/icons/'.$oldfilename);

        }
        else {
            $nameOfFile = $service->icon;

        }


        $service->icon = $nameOfFile;


        $service->save();

        return redirect(route('admin.services.index'))->with('success','Services Updated!');
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
