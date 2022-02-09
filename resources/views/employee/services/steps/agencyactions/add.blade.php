@extends('layouts.auth')

@section('title')
    @include('layouts.inc.title',['title'=>"Services - Agency Action - Add"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>ADD AGENCY ACTION</h3></div>

                    <h3>STEP NO.:  {{$step->client_step}}</h3>
                    <h4>STEP DESCRIPTION: {{$step->step_desc}}</h4>
                    <h5>OFFICE: {{$service->office->code}}</h5>
                    <h6><b>{{$service->desc_name}}</b></h6>


                    <div class="card-body">
                        {!! Form::open(['route' => 'employee.services.steps.agencyactions.storeagencyaction']) !!}

                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::text('description',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('amount', 'Amount') !!}
                            {!! Form::text('amount',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','step'=>'any']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('processing_time', 'Processing Time (In Minute)') !!}
                            {!! Form::text('processing_time',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('person_responsible', 'Person Responsible') !!}
                            {!! Form::text('person_responsible',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>



                        {!! Form::hidden('step_id', $step->id) !!}

                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection