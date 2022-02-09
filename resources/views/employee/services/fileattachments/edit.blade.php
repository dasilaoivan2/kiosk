@extends('layouts.auth')

@section('title')
    @include('layouts.inc.title',['title'=>"Services - File Attachement - Edit"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>EDIT FILE</h3></div>

                    <h5>OFFICE: {{$fileattachment->service->office->code}}</h5>
                    <h6><b>{{$fileattachment->service->desc_name}}</b></h6>


                    <div class="card-body">
                        {!!Form::model($fileattachment, ['route' => ['employee.services.files.updatefiles', $fileattachment->id], 'files' => true])!!}

                        <div class="form-group">
                            @if($fileattachment->filename!="")

                                <img width="200px" src="{{asset('public/storage/fileattachments/'.($fileattachment->filename))}}">

                            @else
                                <img width="200px" src="{{asset('public/storage/fileattachments/no_image.png')}}">

                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('fileattachment', 'File Attachment', ['class' => 'font-weight-bold']) !!}
                            {!! Form::file('fileattachment',['class'=>'form-control ' . ( $errors->has('fileattachment') ? ' is-invalid' : '' ),'accept'=>'image/*','capture'=>'camera']) !!}
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