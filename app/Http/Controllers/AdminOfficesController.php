<?php

namespace App\Http\Controllers;

use App\Office;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminOfficesController extends Controller
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
        $offices = Office::orderBy('window', 'ASC')->get();
        return view ('admin.offices.index')->with('offices',$offices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.offices.create');
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
            'code'=>'required',


        ]);

        date_default_timezone_set('Asia/Manila');

        $office = new Office;


        if($request->hasFile('icon')){
            $nameOfFile = date("Ymds")."-".$request->icon->getClientOriginalName();
            $request->icon->storeAs('public/icons',$nameOfFile);
        }
        else{
            $nameOfFile = NULL;
        }


        $office->name = $request->input('name');
        $office->code = $request->input('code');
        $office->window = $request->input('window');
        $office->contact_no = $request->input('contact_no');
        $office->icon = $nameOfFile;



        $office->save();

        return redirect(route('admin.offices.index'))->with('success','Office Recorded!');
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
        $office = Office::find($id);

        return view ('admin.offices.edit')->with(['office'=>$office]);
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
            'code'=>'required',


        ]);

        date_default_timezone_set('Asia/Manila');

        $office = Office::find($id);

        $office->name = $request->input('name');
        $office->code = $request->input('code');
        $office->window = $request->input('window');
        $office->contact_no = $request->input('contact_no');

        if($request->hasFile('icon'))

        {

            $oldfilename = $office->icon;
            $nameOfFile = date("Ymds")."-".$request->icon->getClientOriginalName();

            $request->icon->storeAs('public/icons',$nameOfFile);

            Storage::delete('public/icons/'.$oldfilename);

        }

        else {
            $nameOfFile = $office->icon;

        }


        $office->icon = $nameOfFile ;

        $office->save();

        return redirect(route('admin.offices.index'))->with('success','Office Updated!');
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
