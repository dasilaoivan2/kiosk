<?php

namespace App\Http\Controllers;

use App\Office;
use App\Clientservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    public function index(){

        $offices = Office::orderBy('window', 'ASC')->get();

$clientservice = Clientservice::latest()->first();

        $files = Storage::files('public/jpgadds');

          return view('dashboard.index',compact('offices','clientservice', 'files'));
    }



    public function checkdbupdate(){

        $clientservice = Clientservice::select('clientservices.*','clients.priority_no')->join('clients','clients.id','clientservices.client_id')->latest('updated_at')->first()->toArray();

        $clientservices = Clientservice::get()->all();

        foreach($clientservices as $clientser){
            $clientser->playsound = 0;
            $clientser->nowserving = 0;
            $clientser->save();
        }

//        $clientservice = Clientservice::select('clientservices.*','clients.priority_no')->join('clients','clients.id','clientservices.client_id')->where('updated','=',1)->first()->toArray();


        return response()->json($clientservice);

    }

    public function updateplaysound(){

//        $clientservice = Clientservice::find($_POST['id']);

        $clientservices = Clientservice::get()->all();

        foreach($clientservices as $clientservice){
            $clientservice->playsound = 0;
            $clientservice->nowserving = 0;
            $clientservice->save();
        }


        return response()->json("play sound updated");

    }

}
