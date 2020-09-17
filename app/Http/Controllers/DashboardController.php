<?php

namespace App\Http\Controllers;

use App\Office;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $offices = Office::get()->all();

        return view('dashboard.index',compact('offices'));
    }
}
