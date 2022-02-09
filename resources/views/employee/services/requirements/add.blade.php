@extends('layouts.auth')

@section('title')
    @include('layouts.inc.title',['title'=>"Services - Requirements - Add"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>ADD REQUIREMENTS</h3></div>

                    <h5>OFFICE: {{$service->office->code}}</h5>
                    <h6><b>{{$service->desc_name}}</b></h6>


                    <div class="card-body">
                        {!! Form::open(['route' => 'employee.services.requirements.storerequirement']) !!}

                        <div class="form-group">
                            {!! Form::label('requirement_desc', 'Requirement Description ') !!}
                            {!! Form::text('requirement_desc',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('wheretosecure', 'Where to Secure') !!}
                            {!! Form::text('wheretosecure',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>


                        {!! Form::hidden('service_id', $service->id) !!}

                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection