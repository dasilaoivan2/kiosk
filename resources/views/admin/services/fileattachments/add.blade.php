@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Services - File Attachement - Add"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>ADD FILE</h3></div>

                    <h5>OFFICE: {{$service->office->code}}</h5>
                    <h6><b>{{$service->desc_name}}</b></h6>


                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.services.files.storefiles', 'files' => true]) !!}

                        <div class="form-group">
                            {!! Form::label('fileattachment', 'File Attachment', ['class' => 'font-weight-bold']) !!}
                            {!! Form::file('fileattachment',['class'=>'form-control ' . ( $errors->has('fileattachment') ? ' is-invalid' : '' ),'accept'=>'image/*','capture'=>'camera','required']) !!}
                        </div>


                        {!! Form::hidden('service_id', $service->id) !!}

                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection