<?php

namespace App\Http\Controllers;

use App\Advertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminAdsController extends Controller
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
        $ads = Advertisement::get()->all();
        return view('admin.ads.index', compact('ads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.ads.create');
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
        'adsfile'=>'required',


    ]);

        date_default_timezone_set('Asia/Manila');


        $ad = new Advertisement;


        $nameOfFile = date("Ymds")."-".$request->adsfile->getClientOriginalName();
        $request->adsfile->storeAs('public/jpgadds',$nameOfFile);

        $ad->adsfile = $nameOfFile;



        $ad->save();

        return redirect(route('admin.ads.index'))->with('success','Advertisement Recorded!');//
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
        $ad = Advertisement::find($id);

        return view ('admin.ads.edit', compact('ad'));
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
            'adsfile'=>'required',



        ]);

        date_default_timezone_set('Asia/Manila');

        $ad = Advertisement::find($id);


        if($request->hasFile('adsfile'))

        {

            $oldfilename = $ad->adsfile;
            $nameOfFile = date("Ymds")."-".$request->adsfile->getClientOriginalName();

            $request->adsfile->storeAs('public/jpgadds',$nameOfFile);

            Storage::delete('public/jpgadds/'.$oldfilename);

        }

        else {
            $nameOfFile = $ad->adsfile;

        }


        $ad->adsfile = $nameOfFile ;

        $ad->save();

        return redirect(route('admin.ads.index'))->with('success','Advertisement Updated!');
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
