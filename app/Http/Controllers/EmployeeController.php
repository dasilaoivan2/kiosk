<?php

namespace App\Http\Controllers;

use App\Client;
use App\Clientservice;
use App\Location;
use App\Service;
use App\Userservice;

use App\User;
use Illuminate\Http\Request;
use Auth;

class EmployeeController extends Controller
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

        $user = User::find(Auth::user()->id);

        return view('employee.index',compact('user'));
    }


    public function servedClient()
    {

        $user = User::find(Auth::user()->id);

        return view('employee.serve',compact('user'));
    }

    public function servedClientToday()
    {

        $user = User::find(Auth::user()->id);

        return view('employee.servedtoday',compact('user'));
    }

    public function pendingClient()
    {

        $user = User::find(Auth::user()->id);

        return view('employee.pending',compact('user'));
    }


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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, $id)
    {
        //
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
