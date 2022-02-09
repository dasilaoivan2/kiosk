<?php

namespace App\Http\Controllers;

use App\Agencyaction;
use App\Classification;
use App\Fileattachment;
use App\Location;
use App\Requirement;
use App\Service;
use App\Servicetransactiontype;
use App\Step;
use App\Transactiontype;
use App\User;
use App\Office;
use App\Userservice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminServicesController extends Controller
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
        $services = Service::get()->all();
        return view('admin.services.index')->with(['services' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $users = User::pluck('name','id');
        $offices = Office::pluck('name', 'id');
        $locations = Location::pluck('description', 'id');
        $classifications = Classification::pluck('name', 'id');
        $transactiontypes = Transactiontype::pluck('name', 'id');
        return view('admin.services.create', compact('offices', 'locations', 'classifications', 'transactiontypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'office_id' => 'required',
            'desc_name' => 'required',
            'classification_id' => 'required',
            'transactiontype_id' => 'required',
            'availability' => 'required',
//            'user_id'=>'required',

        ]);

        // icon

        date_default_timezone_set('Asia/Manila');

        $service = new Service;

        if ($request->hasFile('icon')) {

            $nameOfFile = date("Ymds") . "-" . $request->icon->getClientOriginalName();
            $request->icon->storeAs('public/icons', $nameOfFile);
        } else {
            $nameOfFile = NULL;
        }


        $service->client_desc = $request->input('client_desc');
        $service->desc_vernacular = $request->input('desc_bisaya');
        $service->desc_name = $request->input('desc_name');
        $service->description = $request->input('desc');
        $service->location_id = $request->input('location_id');
        $service->office_id = $request->input('office_id');
        $service->classification_id = $request->input('classification_id');
        $service->availability = $request->input('availability');
        $service->icon = $nameOfFile;

        $service->save();

//        $userservice = New Userservice;
//        $userservice->service_id = $service->id;
//        $userservice->user_id = $request->input('user_id');
//        $userservice->save();


        //Service Transactiontype
        $servicetrans = new Servicetransactiontype;

        $servicetrans->transactiontype_id = $request->input('transactiontype_id');
        $servicetrans->service_id = $service->id;
        $servicetrans->save();


        // file attachment
        $fileattachment = new Fileattachment;

        if ($request->hasFile('fileattachment')) {

            if ($request->hasFile('fileattachment')) {

                $attachedFile = date("Ymds") . "-" . $request->fileattachment->getClientOriginalName();
                $request->fileattachment->storeAs('public/fileattachments', $attachedFile);
            } else {
                $attachedFile = NULL;
            }
            $fileattachment->service_id = $service->id;
            $fileattachment->filename = $attachedFile;
            $fileattachment->save();
        }

        return redirect(route('admin.services.index'))->with('success', 'Service Recorded!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $service = Service::find($id);
        return view('admin.services.show', compact('service'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $service = Service::find($id);
        $offices = Office::pluck('name', 'id');
//        $users = User::pluck('name','id');
        $locations = Location::pluck('description', 'id');
        $classifications = Classification::pluck('name', 'id');
//        $transactiontypes = Transactiontype::pluck('name','id');

        return view('admin.services.edit')->with(['locations' => $locations, 'service' => $service, 'offices' => $offices, 'classifications' => $classifications]);
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
        $request->validate([
            'office_id' => 'required',
            'desc_name' => 'required',
            'classification_id' => 'required',
            'availability' => 'required',
//            'user_id'=>'required',

        ]);

        date_default_timezone_set('Asia/Manila');

        $service = Service::find($id);

        $service->client_desc = $request->input('client_desc');
        $service->desc_vernacular = $request->input('desc_bisaya');
        $service->desc_name = $request->input('desc_name');
        $service->description = $request->input('desc');
        $service->location_id = $request->input('location_id');
//        $service->user_id = $request->input('user_id');
        $service->office_id = $request->input('office_id');
        $service->classification_id = $request->input('classification_id');
//        $service->transactiontype_id = $request->input('transactiontype_id');
        $service->availability = $request->input('availability');

        if ($request->hasFile('icon')) {

            $oldfilename = $service->icon;
            $nameOfFile = date("Ymds") . "-" . $request->icon->getClientOriginalName();

            $request->icon->storeAs('public/icons', $nameOfFile);

            Storage::delete('public/icons/' . $oldfilename);

        } else {
            $nameOfFile = $service->icon;

        }


        //FILE ATTACHMENT
//        if($request->hasFile('fileattachment'))
//
//        {
//
//            $oldattachedfile = $service->filename;
//            $attachedFile = date("Ymds")."-".$request->fileattachment->getClientOriginalName();
//
//            $request->fileattachment->storeAs('public/fileattachments',$attachedFile);
//
//            Storage::delete('public/fileattachments/'.$oldattachedfile);
//
//        }
//        else {
//            $attachedFile = $service->filenamet;
//
//        }


        $service->icon = $nameOfFile;
//        $service->fileattachment = $attachedFile;


        $service->save();

        return redirect(route('admin.services.index'))->with('success', 'Service Updated!');
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


    // REQUIREMENTS


    public function requirementsindex($id)
    {
        $service = Service::find($id);
        $requirements = Requirement::where('service_id', $service->id)->get();

        return view('admin.services.requirements.index', compact('requirements', 'service'));
    }

    public function addrequirements($id)
    {
        $service = Service::find($id);
        return view('admin.services.requirements.add', compact('service'));

    }

    public function storerequirement(Request $request)
    {
        $request->validate([
            'requirement_desc' => 'required',
//            'wheretosecure'=>'required',


        ]);

        $service_id = $request->input('service_id');

        $requirement = new Requirement;

        $requirement->requirement_desc = $request->input('requirement_desc');
        $requirement->wheretosecure = $request->input('wheretosecure');
        $requirement->service_id = $request->input('service_id');
        $requirement->save();

        return redirect(route('admin.services.requirements.index', ['id' => $service_id]))->with('success', 'Requirement Recorded!');
    }

    public function editrequirements($id)
    {
        $requirement = Requirement::find($id);
        $service_id = $requirement->service_id;

        return view('admin.services.requirements.edit', compact('requirement', 'service_id'));
    }

    public function updaterequirement(Request $request, $id)
    {
        $request->validate([
            'requirement_desc' => 'required',
//            'wheretosecure'=>'required',


        ]);

        $service_id = $request->input('service_id');

        $requirement = Requirement::find($id);


        $requirement->requirement_desc = $request->input('requirement_desc');
        $requirement->wheretosecure = $request->input('wheretosecure');
        $requirement->service_id = $request->input('service_id');
        $requirement->save();

        return redirect(route('admin.services.requirements.index', ['id' => $service_id]))->with('success', 'Requirement Updated!');
    }

    public function deleterequirement($id)
    {
        $requirement = Requirement::find($id);
        $service_id = $requirement->service_id;

        $requirement->delete();

        return redirect(route('admin.services.requirements.index', ['id' => $service_id]))->with('success', 'Requirement Deleted!');
    }


    // STEPS
    public function stepsindex($id)
    {
        $service = Service::find($id);
        $steps = Step::where('service_id', $service->id)->get();

        return view('admin.services.steps.index', compact('steps', 'service'));
    }

    public function addsteps($id)
    {
        $service = Service::find($id);
        return view('admin.services.steps.add', compact('service'));

    }

    public function storestep(Request $request)
    {
        $request->validate([
            'client_step' => 'required',
            'step_desc' => 'required',


        ]);

        $service_id = $request->input('service_id');

        $step = new Step;

        $step->service_id = $request->input('service_id');
        $step->client_step = $request->input('client_step');
        $step->step_desc = $request->input('step_desc');
//        $step->processing_time = $request->input('processing_time');
//        $step->person_responsible = $request->input('person_responsible');
        $step->save();

        return redirect(route('admin.services.steps.agencyactions.add', ['id' => $step->id]))->with('success', 'Step Recorded!');
    }

    public function editsteps($id)
    {
        $step = Step::find($id);
        $service_id = $step->service_id;

        return view('admin.services.steps.edit', compact('step', 'service_id'));
    }

    public function updatestep(Request $request, $id)
    {
        $request->validate([
            'client_step' => 'required',
            'step_desc' => 'required',


        ]);

        $service_id = $request->input('service_id');

        $step = Step::find($id);


        $step->service_id = $request->input('service_id');
        $step->client_step = $request->input('client_step');
        $step->step_desc = $request->input('step_desc');
//        $step->processing_time = $request->input('processing_time');
//        $step->person_responsible = $request->input('person_responsible');
        $step->save();

        return redirect(route('admin.services.steps.index', ['id' => $service_id]))->with('success', 'Requirement Updated!');
    }

    public function deletestep($id)
    {
        $step = Step::find($id);
        $service_id = $step->service_id;
        $agencyactions = Agencyaction::where('step_id', $step->id)->get();

        foreach ($agencyactions as $agencyaction) {
            $agency = Agencyaction::find($agencyaction->id);
            $agency->delete();
        }

        $step->delete();

        return redirect(route('admin.services.steps.index', ['id' => $service_id]))->with('success', 'Requirement Deleted!');
    }


    //AGENCY ACTIONS

    public function agencyactionindex($id)
    {
        $step = Step::find($id);
        $agencyactions = Agencyaction::where('step_id', $step->id)->get();

        $service_id = $step->service_id;
        $service = Service::find($service_id);


        return view('admin.services.steps.agencyactions.index', compact('step', 'agencyactions', 'service'));
    }

    public function addagencyaction($id)
    {
        $step = Step::find($id);

        $service_id = $step->service_id;
        $service = Service::find($service_id);

        return view('admin.services.steps.agencyactions.add', compact('step', 'service'));

    }

    public function storeagencyaction(Request $request)
    {
        $request->validate([
            'description' => 'required',


        ]);

        $step_id = $request->input('step_id');
        $step = Step::find($step_id);
        $service_id = $step->service->id;

        $agencyaction = new Agencyaction;

        $agencyaction->step_id = $request->input('step_id');
        $agencyaction->description = $request->input('description');
        $agencyaction->amount = $request->input('amount');
        $agencyaction->processing_time = $request->input('processing_time');
        $agencyaction->person_responsible = $request->input('person_responsible');
        $agencyaction->save();

        return redirect(route('admin.services.steps.index', ['id' => $service_id]))->with('success', 'Agency Action Recorded!');
    }

    public function editagencyaction($id)
    {
        $agencyaction = Agencyaction::find($id);
        $step_id = $agencyaction->step_id;

        $step = Step::find($step_id);
        $service = Service::find($step->service_id);


        return view('admin.services.steps.agencyactions.edit', compact('agencyaction', 'step_id', 'step', 'service'));
    }

    public function updateagencyaction(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',


        ]);

        $step_id = $request->input('step_id');

        $agencyaction = Agencyaction::find($id);


        $agencyaction->step_id = $request->input('step_id');
        $agencyaction->description = $request->input('description');
        $agencyaction->amount = $request->input('amount');
        $agencyaction->processing_time = $request->input('processing_time');
        $agencyaction->person_responsible = $request->input('person_responsible');
        $agencyaction->save();

        return redirect(route('admin.services.steps.agencyactions.index', ['id' => $step_id]))->with('success', 'Agency Action Updated!');
    }

    public function deleteagencyaction($id)
    {
        $agencyaction = Agencyaction::find($id);
        $step_id = $agencyaction->step_id;

        $agencyaction->delete();

        return redirect(route('admin.services.steps.agencyactions.index', ['id' => $step_id]))->with('success', 'Requirement Deleted!');
    }


    //transaction type
    public function transtypeindex($id)
    {
        $service = Service::find($id);
        $servicetranstypes = Servicetransactiontype::where('service_id', $service->id)->get();

        return view('admin.services.transactiontypes.index', compact('servicetranstypes', 'service'));
    }

    public function addtrans($id)
    {
        $service = Service::find($id);
        $transactiontypes = Transactiontype::pluck('name', 'id');
        return view('admin.services.transactiontypes.add', compact('service', 'transactiontypes'));

    }

    public function storetrans(Request $request)
    {
        $request->validate([
            'transactiontype_id' => 'required',


        ]);
        $service_id = $request->input('service_id');

        $transtype = new Servicetransactiontype;

        $transtype->transactiontype_id = $request->input('transactiontype_id');
        $transtype->service_id = $request->input('service_id');
        $transtype->save();

        return redirect(route('admin.services.transactiontypes.index', ['id' => $service_id]))->with('success', 'Transaction Type Recorded!');
    }

    public function edittrans($id)
    {
        $servicetranstype = Servicetransactiontype::find($id);

        $transactiontypes = Transactiontype::pluck('name', 'id');

        return view('admin.services.transactiontypes.edit', compact('servicetranstype', 'transactiontypes'));
    }

    public function updatetrans(Request $request, $id)
    {
        $request->validate([
            'transactiontype_id' => 'required',


        ]);
        $service_id = $request->input('service_id');

        $servicetranstype = Servicetransactiontype::find($id);

        $servicetranstype->transactiontype_id = $request->input('transactiontype_id');
        $servicetranstype->service_id = $request->input('service_id');
        $servicetranstype->save();

        return redirect(route('admin.services.transactiontypes.index', ['id' => $service_id]))->with('success', 'Transaction Type Updated');
    }

    public function deletetrans($id)
    {

        $servicetranstype = Servicetransactiontype::find($id);

        $service_id = $servicetranstype->service_id;

        $servicetranstype->delete();

        return redirect(route('admin.services.transactiontypes.index', ['id' => $service_id]))->with('success', 'Transaction Type Deleted');


    }


    //FILE ATTACHMENTS

    public function filesindex($id)
    {
        $service = Service::find($id);
        $fileattachments = Fileattachment::where('service_id', $service->id)->get();

        return view('admin.services.fileattachments.index', compact('fileattachments', 'service'));
    }

    public function addfiles($id)
    {
        $service = Service::find($id);
        return view('admin.services.fileattachments.add', compact('service'));

    }

    public function storefiles(Request $request)
    {
        $request->validate([
            'fileattachment' => 'required',
//            'wheretosecure'=>'required',


        ]);

        $service_id = $request->input('service_id');

        $fileattachment = new Fileattachment;

        if ($request->hasFile('fileattachment')) {

            $attachedFile = date("Ymds") . "-" . $request->fileattachment->getClientOriginalName();
            $request->fileattachment->storeAs('public/fileattachments', $attachedFile);
        } else {
            $attachedFile = NULL;
        }

        $fileattachment->filename = $attachedFile;
        $fileattachment->service_id = $request->input('service_id');
        $fileattachment->save();

        return redirect(route('admin.services.files.index', ['id' => $service_id]))->with('success', 'Files Recorded!');
    }

    public function editfiles($id)
    {
        $fileattachment = Fileattachment::find($id);
        $service_id = $fileattachment->service_id;

        return view('admin.services.fileattachments.edit', compact('fileattachment', 'service_id'));
    }

    public function updatefiles(Request $request, $id)
    {
        $request->validate([
//            'fileattachment'=>'required',
//            'wheretosecure'=>'required',


        ]);

        $service_id = $request->input('service_id');

        $fileattachment = Fileattachment::find($id);

        //FILE ATTACHMENT
        if ($request->hasFile('fileattachment')) {

            $oldattachedfile = $fileattachment->filename;
            $attachedFile = date("Ymds") . "-" . $request->fileattachment->getClientOriginalName();

            $request->fileattachment->storeAs('public/fileattachments', $attachedFile);

            Storage::delete('public/fileattachments/' . $oldattachedfile);

        } else {
            $attachedFile = $fileattachment->filename;

        }


        $fileattachment->filename = $attachedFile;
        $fileattachment->service_id = $request->input('service_id');
        $fileattachment->save();

        return redirect(route('admin.services.files.index', ['id' => $service_id]))->with('success', 'File Updated!');
    }

    public function deletefiles($id)
    {
        $fileattachment = Fileattachment::find($id);
        $service_id = $fileattachment->service_id;

        $oldattachedfile = $fileattachment->filename;
        Storage::delete('public/fileattachments/' . $oldattachedfile);

        $fileattachment->delete();

        return redirect(route('admin.services.files.index', ['id' => $service_id]))->with('success', 'File Deleted!');
    }


}
