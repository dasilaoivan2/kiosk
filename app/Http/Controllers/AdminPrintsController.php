<?php

namespace App\Http\Controllers;

use App\Client;
use App\Clientservice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use DB;

class AdminPrintsController extends Controller
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


    //DAILY
    public function dailyindex()
    {
        $clients = Client::get()->all();
        return view('admin.prints.daily.index')->with(['clients' => $clients]);
    }

    public function dailysearch(Request $request)
    {

        $dateform = $request->input('date');

        $date = \Carbon\Carbon::parse($dateform)->format('Y-m-d');


        $clients = Client::whereDate('created_at', '=', $date)->get();

//        $clients = DB::table('clients')
//            ->whereRaw('date(created_at)',$datefrom)
//            ->get();

        return view('admin.prints.daily.search')->with(['clients' => $clients, 'date' => $date]);
    }

    public function dailyprint(Request $request)
    {

        $dateform = $request->input('date');

        $date = \Carbon\Carbon::parse($dateform)->format('Y-m-d');
        $datefrom = \Carbon\Carbon::parse($dateform)->format('F d, Y');


        $clients = Client::whereDate('created_at', '=', $date)
            ->orderBy('barangay_id', 'ASC')
            ->orderBy('name', 'ASC')
            ->get();

//        $clients = DB::table('clients')
//            ->whereRaw('date(created_at)',$datefrom)
//            ->get();

        return view('admin.prints.daily.print')->with(['clients' => $clients, 'date' => $date, 'datefrom' => $datefrom]);
    }

//END DAILY

//MONTHLY

    public function monthlyindex()
    {
        $clients = Client::get()->all();
        return view('admin.prints.monthly.index')->with(['clients' => $clients]);
    }

    public function monthlysearch(Request $request)
    {

        $dateform = $request->input('month');

        $month = \Carbon\Carbon::parse($dateform)->format('m');
        $monthfrom = \Carbon\Carbon::parse($dateform)->format('F Y');


        $clients = Client::whereMonth('created_at', '=', $month)->get();

//        $clients = DB::table('clients')
//            ->whereRaw('date(created_at)',$datefrom)
//            ->get();

        return view('admin.prints.monthly.search')->with(['clients' => $clients, 'dateform' => $dateform, 'monthfrom' => $monthfrom]);
    }

    public function monthlyprint(Request $request)
    {

        $dateform = $request->input('dateform');

        $month = \Carbon\Carbon::parse($dateform)->format('m');
        $monthfrom = \Carbon\Carbon::parse($dateform)->format('F Y');


        $clients = Client::whereMonth('created_at', '=', $month)
            ->orderBy('barangay_id', 'ASC')
            ->orderBy('name', 'ASC')
            ->get();

//        $clients = DB::table('clients')
//            ->whereRaw('date(created_at)',$datefrom)
//            ->get();

        return view('admin.prints.monthly.print')->with(['clients' => $clients, 'month' => $month, 'monthfrom' => $monthfrom]);
    }

    //END MONTHLY

    //RANGE

    public function rangeindex()
    {
        $clients = Client::get()->all();
        return view('admin.prints.range.index')->with(['clients' => $clients]);
    }

    public function rangesearch(Request $request)
    {

        $dfrom = $request->input('datefrom');
        $dto = $request->input('dateto');

        $datefrom = \Carbon\Carbon::parse($dfrom)->format('Y-m-d');
        $dateto = \Carbon\Carbon::parse($dto)->format('Y-m-d');


        $clients = Client::whereDate('created_at', '>=', $datefrom)
            ->whereDate('created_at', '<=', $dateto)
            ->get();;

//        $clients = DB::table('clients')
//            ->whereRaw('date(created_at)',$datefrom)
//            ->get();

        return view('admin.prints.range.search')->with(['clients' => $clients, 'datefrom' => $datefrom, 'dateto'=>$dateto, 'dfrom'=>$dfrom, 'dto'=>$dto]);
    }

    public function rangeprint(Request $request)
    {

        $dfrom = $request->input('datefrom');
        $dto = $request->input('dateto');

        $datefrom = \Carbon\Carbon::parse($dfrom)->format('Y-m-d');
        $dateto = \Carbon\Carbon::parse($dto)->format('Y-m-d');

        $fordatefrom = \Carbon\Carbon::parse($dfrom)->format('M d, Y');
        $fordateto = \Carbon\Carbon::parse($dto)->format('M d, Y');


        $clients = Client::whereDate('created_at', '>=', $datefrom)
            ->whereDate('created_at', '<=', $dateto)
            ->orderBy('barangay_id', 'ASC')
            ->orderBy('name', 'ASC')
            ->get();

//        $clients = DB::table('clients')
//            ->whereRaw('date(created_at)',$datefrom)
//            ->get();

        return view('admin.prints.range.print')->with(['clients' => $clients, 'datefrom'=>$datefrom, 'dateto'=>$dateto, 'fordatefrom'=>$fordatefrom, 'fordateto'=>$fordateto]);
    }

    //END RANGE


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
