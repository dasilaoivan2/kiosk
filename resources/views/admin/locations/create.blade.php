@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Locations - Add"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>ADD LOCATION</h3></div>


                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.locations.store', 'files' => true]) !!}

                        <div class="form-group">
                            {!! Form::label('desc', 'Description') !!}
                            {!! Form::text('desc',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('gif', 'GIF') !!}
                            {!! Form::file('gif',['class'=>'form-control ' . ( $errors->has('gif') ? ' is-invalid' : '' ),'accept'=>'image/*','capture'=>'camera']) !!}
                        </div>



                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection