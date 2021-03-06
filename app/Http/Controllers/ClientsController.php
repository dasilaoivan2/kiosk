<?php

namespace App\Http\Controllers;

use App\Barangay;
use App\Client;
use App\Clientservice;
use App\Service;
use App\Office;
use App\Userservice;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $offices = Office::get()->all();
        $services = Service::get()->sortBy('description');
        return view ('client.index')->with(['services'=>$services, 'offices'=>$offices]);
    }

    public function second()
    {
        $offices = Office::get()->all();
        return view ('client.second')->with(['offices'=>$offices]);
    }

   public function office()
   {
       $offices = Office::get()->all();
       return view ('client.byoffice')->with(['offices'=>$offices]);
   }


    public function showByOffice($id)
    {
        $office = Office::find($id);

        $services = Service::where('office_id','=', $office->id)->get();
        return view ('client.showbyoffice')->with(['services'=>$services, 'office'=>$office]);

    }

    public function printPriority($id,$service_id){

        $client = Client::find($id);
        $service = Service::find($service_id);


        return view('client.printpriority',compact('client','service'));
    }



    public function create($id)
    {
        $barangays = Barangay::get()->all();
//        $barangays = Barangay::pluck('name','id');
        $service = Service::find($id);
        return view('client.create')->with(['service'=>$service, 'barangays'=>$barangays]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
//        $request->validate([
//        'name'=>'required',
//        'contact_no'=>'required',
//        'barangay_id'=>'required',
//
//    ]);
//
//
//        $service = Service::find($id);
//        $count = Clientservice::where('service_id', '=', $service->id)->count();
//
//        $priority_no = $count + 1;
//
//        $client = new Client;
//
//        $client->name = $request->input('name');
//        $client->contact_no = $request->input('contact_no');
//        $client->barangay_id = $request->input('barangay_id');
//        $client->priority_no = $priority_no;
//        $client->status =  0;
//        $client->save();
//
//        $clientservice = new Clientservice;
//        $clientservice->client_id = $client->id;
//        $clientservice->service_id = $request->input('service_id');
//        $clientservice->save();
//
////        return redirect(route('client.index'));
//        return view('client.printpriority',compact('client','service'));

    }

// OLD CODE
//    public function storeClient(){
//
//        $name = $_POST['name'];
//        $contact_no = $_POST['contact_no'];
//        $barangay_id = $_POST['barangay_id'];
//        $service_id = $_POST['service_id'];
//
//        $now = date('Y-m-d');
//
//        $service = Service::find($service_id);
//
//
//        $count = Clientservice::where('service_id', '=', $service->id)->whereDate('created_at',$now)->count();
//
//
//
//        $service_count = Clientservice::get()->count();
//
//        $count_sl= $service_count + 1;
//
//
//
//        $priority_no = $count + 1;
//
//        $sl_no = $service->id."-".$count_sl;
//
//
//        $client = new Client;
//
//        $client->sl_no = $sl_no;
//        $client->name = $name;
//        $client->contact_no = $contact_no;
//        $client->barangay_id = $barangay_id;
//        $client->priority_no = $priority_no;
//        $client->status =  0;
//        $client->save();
//
//
//
//        $clientservice = new Clientservice;
//        $clientservice->client_id = $client->id;
//        $clientservice->service_id = $service_id;
//        $clientservice->save();
//
//        return response()->json(['success'=>'Data saved!','client_id'=>$client->id]);
//
//    }

    public function storeClient(){

        $name = $_POST['name'];
        $contact_no = $_POST['contact_no'];
        $barangay_id = $_POST['barangay_id'];
        $service_id = $_POST['service_id'];

        $now = date('Y-m-d');

        $service = Service::find($service_id);
        $office_id = $service->office_id;

        $count = Clientservice::where('office_id', '=', $office_id)->whereDate('created_at',$now)->count();



        $service_count = Clientservice::get()->count();

        $count_sl= $service_count + 1;



        $priority_no = $count + 1;

        $sl_no = $service->id."-".$count_sl;


        $client = new Client;

        $client->sl_no = $sl_no;
        $client->name = $name;
        $client->contact_no = $contact_no;
        $client->barangay_id = $barangay_id;
        $client->priority_no = $priority_no;
        $client->status =  0;
        $client->save();



        $clientservice = new Clientservice;
        $clientservice->client_id = $client->id;
        $clientservice->service_id = $service_id;
        $clientservice->office_id = $office_id;
        $clientservice->save();

        return response()->json(['success'=>'Data saved!','client_id'=>$client->id]);

    }





    public function updateclient(){


            $id = $_POST['id'];

            $client = Client::find($id);

            $client->status = 1;

            $client->save();

            return response()->json(['success'=>'Client updated!']);


    }

    public function updateserving(){


        $id = $_POST['id'];

        $client = Client::find($id);

        $client->nowserving = 1;

        $client->save();

        return response()->json(['success'=>'Client updated!']);


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
