<?php

namespace App\Http\Controllers;

use App\Transactiontype;
use Illuminate\Http\Request;

class AdminTransactiontypesController extends Controller
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
        $transactiontypes = Transactiontype::all();
        return view('admin.transactiontypes.index', compact('transactiontypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('admin.transactiontypes.create');
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
        ]);

        $transactiontype = new Transactiontype;

        $transactiontype->name = $request->input('name');
        $transactiontype->code = $request->input('code');
        $transactiontype->save();

        return redirect(route('admin.transactiontypes.index'))->with('success','Transaction type Recorded!');
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
        $transactiontype = Transactiontype::find($id);
        return view('admin.transactiontypes.edit', compact('transactiontype'));
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
        ]);

        $transactiontype = Transactiontype::find($id);

        $transactiontype->name = $request->input('name');
        $transactiontype->code = $request->input('code');
        $transactiontype->save();

        return redirect(route('admin.transactiontypes.index'))->with('success','Classification Updated!');
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
