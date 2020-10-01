@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Responsible Employee - Add"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>ADD EMPLOYEE</h3></div>


                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.users.store']) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('email', 'Email') !!}
                            {!! Form::text('email',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('password', 'Password') !!}
                            {!! Form::password('password',['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>


                        <div class="form-group">
                        {!! Form::label('service_id', 'Assign Services') !!}
                        {!! Form::select('service_id',$services,null,['class'=>'form-control','placeholder'=>'Select Services...','required']) !!}
                        </div>




                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection