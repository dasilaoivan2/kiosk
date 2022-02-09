<?php

namespace App\Http\Controllers;

use App\Barangay;
use App\Client;
use App\Clientservice;
use App\Service;
use App\Office;
use App\Userservice;
use Illuminate\Http\Request;

use Auth;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//      $offices = Office::get()->all();
        $offices = Office::orderBy('window', 'ASC')->get();
        $services = Service::get()->sortBy('description');
        return view('client.index')->with(['services' => $services, 'offices' => $offices]);
    }

    public function second()
    {
        $offices = Office::get()->all();
        return view('client.second')->with(['offices' => $offices]);
    }

    public function office()
    {
//        $offices = Office::get()->all();
        $offices = Office::orderBy('window', 'ASC')->get();
        return view('client.byoffice')->with(['offices' => $offices]);
    }


    public function showByOffice($id)
    {
        $office = Office::find($id);

        $services = Service::where('office_id', '=', $office->id)->get();
        return view('client.showbyoffice')->with(['services' => $services, 'office' => $office]);

    }

    public function printPriority($id, $service_id)
    {

        $client = Client::find($id);
        $service = Service::find($service_id);


        return view('client.printpriority', compact('client', 'service'));
    }


    public function create($id)
    {
        $barangays = Barangay::get()->all();
//        $barangays = Barangay::pluck('name','id');
        $service = Service::find($id);
        return view('client.create')->with(['service' => $service, 'barangays' => $barangays]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
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

//    public function storeClient()
//    {
//
//        $name = $_POST['name'];
//        $contact_no = $_POST['contact_no'];
//        $barangay_id = $_POST['barangay_id'];
//        $service_id = $_POST['service_id'];
//
//        $now = date('Y-m-d');
//
//        $service = Service::find($service_id);
//        $office_id = $service->office_id;
//
//        $count = Clientservice::where('office_id', '=', $office_id)->whereDate('created_at', $now)->count();
//
//
//        $service_count = Clientservice::get()->count();
//
//        $count_sl = $service_count + 1;
//
//
//        $priority_no = $count + 1;
//
//        $sl_no = $service->id . "-" . $count_sl;
//
//
//        $client = new Client;
//
//        $client->sl_no = $sl_no;
//        $client->name = $name;
//        $client->contact_no = $contact_no;
//        $client->barangay_id = $barangay_id;
//        $client->priority_no = $priority_no;
//        $client->status = 0;
//        $client->save();
//
//
//        $clientservice = new Clientservice;
//        $clientservice->client_id = $client->id;
//        $clientservice->service_id = $service_id;
//        $clientservice->office_id = $office_id;
//        $clientservice->nowserving = 0;
//        $clientservice->save();
//co
//        return response()->json(['success' => 'Data saved!', 'client_id' => $client->id]);
//
//    }

//    new code with message

    public function storeClient()
    {

        $name = $_POST['name'];
        $contact_no = $_POST['contact_no'];
        $barangay_id = $_POST['barangay_id'];
        $service_id = $_POST['service_id'];

        $now = date('Y-m-d');

        $service = Service::find($service_id);
        $office_id = $service->office_id;

        $count = Clientservice::where('office_id', '=', $office_id)->whereDate('created_at', $now)->count();


        $service_count = Clientservice::get()->count();

        $count_sl = $service_count + 1;


        $priority_no = $count + 1;

        $sl_no = $service->id . "-" . $count_sl;


        $client = new Client;

        $client->sl_no = $sl_no;
        $client->name = $name;
        $client->contact_no = $contact_no;
        $client->barangay_id = $barangay_id;
        $client->priority_no = $priority_no;
        $client->status = 0;
        $client->save();


        $clientservice = new Clientservice;
        $clientservice->client_id = $client->id;
        $clientservice->service_id = $service_id;
        $clientservice->office_id = $office_id;
        $clientservice->nowserving = 0;
        $clientservice->save();

        $office = Office::find($office_id);

//        $this->sendmessage($office->contact_no, "KIOSK", 'KIOSK: You have a client on queue.');

//        $this->sendmessage($office->contact_no,"KIOSK",'KIOSK: You have a client on queue. Client name: '.$client->name.", Contact No.: ".$contact_no.", Service: ".$service->description.", Office: ".$office->code);


  //      $message = 'KIOSK: You have a client on queue. Client name: '.$client->name.", Contact No.: ".$contact_no.", Service: ".$service->description.", Office: ".$office->code;


// desktop server
//        $this->SendMessageDiafaan("192.168.20.7", '9710', "admin", "mfadmin@123465", $office->contact_no, $message);

//        laptop server
//        $this->SendMessageDiafaan("192.168.20.101", '9710', "admin", "JunelJig@1980", $office->contact_no, $message);


        return response()->json(['success' => 'Data saved!', 'client_id' => $client->id]);

    }

    private function SendMessageDiafaan($host, $port, $userName, $password, $number, $message)
    {
        /* Create a TCP/IP socket. */
        $socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        if ($socket === false) {
            return "socket_create() failed: reason: " . socket_strerror(socket_last_error());
        }

        /* Make a connection to the Diafaan SMS Server host */
        $result = socket_connect($socket, $host, $port);
        if ($result === false) {
            return "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($socket));
        }

        /* Create the HTTP API query string */
        $query = '/http/send-message/';
        $query .= '?username='.urlencode($userName);
        $query .= '&password='.urlencode($password);
        $query .= '&to='.urlencode($number);
        $query .= '&message='.urlencode($message);

        /* Send the HTTP GET request */
        $in = "GET ".$query." HTTP/1.1\r\n";
        $in .= "Host: www.myhost.com\r\n";
        $in .= "Connection: Close\r\n\r\n";
        $out = '';
        socket_write($socket, $in, strlen($in));

        /* Get the HTTP response */
        $out = '';
        while ($buffer = socket_read($socket, 2048)) {
            $out = $out.$buffer;
        }
        socket_close($socket);

        /* Extract the last line of the HTTP response to filter out the HTTP header and get the send result*/
        $lines = explode("\n", $out);
        return end($lines);
    }

//    private function sendmessage($to, $from, $message)
//    {
//
//        $basic = new \Nexmo\Client\Credentials\Basic('15614f63', '07YNYqW8EDSD2j3u');
//        $client1 = new \Nexmo\Client($basic);
//
//        $client1->message()->send([
//            'to' => $to,
//            'from' => $from,
//            'text' => $message
//        ]);
//
//    }


    public function updateclient()
    {

        $id = $_POST['id'];
        $clientservice_id = $_POST['clientservice_id'];
//        $status = $_POST['status'];


        $client = Client::find($id);
        $client->status = 1;
        $client->save();


        $id_clientservice = Clientservice::find($clientservice_id);

        $clientservices = Clientservice::where('office_id', $id_clientservice->office_id)->get();

        foreach ($clientservices as $clientservice) {
            $clientservice->nowserving = 0;
            $clientservice->save();
        }


        return response()->json(['success' => 'Client updated!']);


    }


    public function updateservedclient()
    {

        $id = $_POST['id'];
        $clientservice_id = $_POST['clientservice_id'];
//        $status = $_POST['status'];


        $client = Client::find($id);
        $client->status = 0;
        $client->save();


        $id_clientservice = Clientservice::find($clientservice_id);

        $clientservices = Clientservice::where('office_id', $id_clientservice->office_id)->get();

        foreach ($clientservices as $clientservice) {
            $clientservice->nowserving = 0;
            $clientservice->save();
        }


        return response()->json(['success' => 'Client updated!']);


    }


    public function updateserve()
    {

        $id = $_POST['id'];
        $clientservice_id = $_POST['clientservice_id'];
//        $status = $_POST['status'];


        $id_clientservice = Clientservice::find($clientservice_id);

        $clientservices = Clientservice::where('office_id', $id_clientservice->office_id)->get();

        foreach ($clientservices as $clientservice) {

            $clientservice->nowserving = 0;
            $clientservice->save();
        }

        $id_clientservice->nowserving = 1;
        $id_clientservice->playsound = 1;
        $id_clientservice->save();

        return response()->json(['success' => 'Client updated!']);


    }

//    public function updateserving(){
//
//
//        $id = $_POST['id'];
//
//        $client = Client::find($id);
//
//        $client->nowserving = 1;
//
//        $client->save();
//
//        return response()->json(['success'=>'Client updated!']);
//
//
//    }

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
