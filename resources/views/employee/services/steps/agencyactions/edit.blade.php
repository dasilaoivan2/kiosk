@extends('layouts.auth')

@section('title')
    @include('layouts.inc.title',['title'=>"Services - Agency Action - Edit"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>EDIT STEP</h3></div>

                    <h3>STEP NO.: {{$step->client_step}}</h3>
                    <h4>STEP DESCRIPTION: {{$step->step_desc}}</h4>
                    <h5>OFFICE: {{$service->office->code}}</h5>
                    <h6><b>{{$service->desc_name}}</b></h6>


                    <div class="card-body">
                        {!!Form::model($agencyaction, ['route' => ['employee.services.steps.agencyactions.updateagencyaction', $agencyaction->id], 'files' => true])!!}

                        <div class="form-group">
                            {!! Form::label('description', 'Description') !!}
                            {!! Form::text('description',$agencyaction->description,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('amount', 'Amount') !!}
                            {!! Form::text('amount',$agencyaction->amount,['class'=>'form-control','placeholder'=>'Type here...','autofocus','step'=>'any']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('processing_time', 'Processing Time (In Minute)') !!}
                            {!! Form::text('processing_time',$agencyaction->processing_time,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('person_responsible', 'Person Responsible') !!}
                            {!! Form::text('person_responsible',$agencyaction->person_responsible,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>

                        {{Form::hidden('_method','PUT')}}

                        {!! Form::hidden('step_id', $step_id) !!}



                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection