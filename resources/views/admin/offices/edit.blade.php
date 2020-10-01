@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Offices - Edit"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>EDIT OFFICE</h3></div>


                    <div class="card-body">
                        {!!Form::model($office, ['route' => ['admin.offices.update', $office->id], 'files' => true])!!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name',$office->name,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('code', 'Code') !!}
                            {!! Form::text('code',$office->code,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('window', 'Window') !!}
                            {!! Form::number('window',$office->window,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contact_no', 'Contact No.') !!}
                            {!! Form::tel('contact_no',$office->contact_no,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>

                        <div class="form-group">
                            @if($office->icon!="")

                                <img width="200px" src="{{asset('public/storage/icons/'.($office->icon))}}">

                            @else
                                <img width="200px" src="{{asset('public/storage/icons/no_image.png')}}">

                            @endif
                        </div>


                        <div class="form-group">
                            {!! Form::label('icon', 'Office Icon') !!}
                            {!! Form::file('icon',['class'=>'form-control ' . ( $errors->has('icon') ? ' is-invalid' : '' ),'accept'=>'image/*','capture'=>'camera']) !!}
                        </div>





                        {{Form::hidden('_method','PUT')}}

                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection