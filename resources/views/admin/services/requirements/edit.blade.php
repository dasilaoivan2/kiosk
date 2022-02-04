@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Services - Requirements - Edit"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>EDIT REQUIREMENT</h3></div>

                    <h5>OFFICE: {{$requirement->service->office->code}}</h5>
                    <h6><b>{{$requirement->service->desc_name}}</b></h6>


                    <div class="card-body">
                        {!!Form::model($requirement, ['route' => ['admin.services.requirements.updaterequirement', $requirement->id], 'files' => true])!!}

                        <div class="form-group">
                            {!! Form::label('requirement_desc', 'Requirement Description ') !!}
                            {!! Form::text('requirement_desc',$requirement->requirement_desc,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('wheretosecure', 'Where to Secure') !!}
                            {!! Form::text('wheretosecure',$requirement->wheretosecure,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>

                        {{Form::hidden('_method','PUT')}}

                        {!! Form::hidden('service_id', $service_id) !!}



                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection