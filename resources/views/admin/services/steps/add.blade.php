@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Services - Steps - Add"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>ADD STEPS</h3></div>

                    <h5>OFFICE: {{$service->office->code}}</h5>
                    <h6><b>{{$service->desc_name}}</b></h6>


                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.services.steps.storestep']) !!}

                        <div class="form-group">
                            {!! Form::label('client_step', 'Step No.') !!}
                            {!! Form::number('client_step',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('step_desc', 'Step Description') !!}
                            {!! Form::text('step_desc',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('processing_time', 'Processing Time (In Minute)') !!}--}}
                            {{--{!! Form::number('processing_time',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('person_responsible', 'Person Responsible') !!}--}}
                            {{--{!! Form::text('person_responsible',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}--}}
                        {{--</div>--}}


                        {!! Form::hidden('service_id', $service->id) !!}

                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection