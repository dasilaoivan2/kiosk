@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Offices - Add"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>ADD OFFICE</h3></div>


                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.offices.store', 'files' => true]) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('code', 'Code') !!}
                            {!! Form::text('code',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('window', 'Window') !!}
                            {!! Form::number('window',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('contact_no', 'Contact No.') !!}
                            {!! Form::text('contact_no',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('icon', 'Office Icon') !!}
                            {!! Form::file('icon',['class'=>'form-control ' . ( $errors->has('icon') ? ' is-invalid' : '' ),'accept'=>'image/*','capture'=>'camera']) !!}
                        </div>



                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection