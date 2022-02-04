@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Services - Steps - Edit"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>EDIT STEP</h3></div>

                    <h5>OFFICE: {{$step->service->office->code}}</h5>
                    <h6><b>{{$step->service->desc_name}}</b></h6>


                    <div class="card-body">
                        {!!Form::model($step, ['route' => ['admin.services.steps.updatestep', $step->id], 'files' => true])!!}

                        <div class="form-group">
                            {!! Form::label('client_step', 'Step No.') !!}
                            {!! Form::number('client_step',$step->client_step,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('step_desc', 'Step Description') !!}
                            {!! Form::text('step_desc',$step->step_desc,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('processing_time', 'Processing Time (In Minute)') !!}--}}
                            {{--{!! Form::number('processing_time',$step->processing_time,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('person_responsible', 'Person Responsible') !!}--}}
                            {{--{!! Form::text('person_responsible',$step->person_responsible,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}--}}
                        {{--</div>--}}

                        {{Form::hidden('_method','PUT')}}

                        {!! Form::hidden('service_id', $service_id) !!}



                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection