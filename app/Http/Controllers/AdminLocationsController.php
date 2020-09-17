<?php

namespace App\Http\Controllers;

use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminLocationsController extends Controller
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
        $locations = Location::get()->all();
        return view ('admin.locations.index')->with('locations',$locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view ('admin.locations.create');
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


        ]);

        date_default_timezone_set('Asia/Manila');


        $location = new Location;

        $location->description = $request->input('desc');

        $nameOfFile = date("Ymds")."-".$request->gif->getClientOriginalName();
        $request->gif->storeAs('public/images',$nameOfFile);

        $location->gif = $nameOfFile;


        // FOR UPDATE CODE (PHOTO)

//        if($request->hasFile('gif'))
//
//        {
//
//            $oldfilename = $location->gif;
//
//            $nameOfFile = date("Ymds")."-".$request->gif->getClientOriginalName();
//
//            $request->gif->storeAs('public/images',$nameOfFile);
//
//            Storage::delete('public/images/'.$oldfilename);
//
//        }
//
//        else {
//            $nameOfFile = $location->gif;
//
//        }

//        $location->gif = $nameOfFile;


        $location->save();

        return redirect(route('admin.locations.index'))->with('success','Location Recorded!');
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
        $location = Location::find($id);
        return view('admin.locations.edit')->with(['location' => $location]);
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


        ]);

        date_default_timezone_set('Asia/Manila');


        $location = Location::find($id);

        $location->description = $request->input('desc');

        if($request->hasFile('gif'))

                {

                    $oldfilename = $location->gif;

                    $nameOfFile = date("Ymds")."-".$request->gif->getClientOriginalName();

                    $request->gif->storeAs('public/images',$nameOfFile);

                    Storage::delete('public/images/'.$oldfilename);

                }

                else {
                    $nameOfFile = $location->gif;

                }

        $location->gif = $nameOfFile;
        $location->save();

        return redirect(route('admin.locations.index'))->with('success','Location Updated!');
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
