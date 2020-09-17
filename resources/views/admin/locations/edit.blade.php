@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Locations - Edit"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>EDIT LOCATION</h3></div>


                    <div class="card-body">
                        {!!Form::model($location, ['route' => ['admin.locations.update', $location->id], 'files' => true])!!}

                        <div class="form-group">
                            {!! Form::label('desc', 'Description') !!}
                            {!! Form::text('desc',$location->description,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>


                        <div class="form-group">
                            @if($location->gif!="")

                                <img width="200px" src="{{asset('public/storage/images/'.($location->gif))}}">

                            @else
                                <img width="200px" src="{{asset('public/storage/images/no_image.png')}}">

                            @endif
                        </div>


                        <div class="form-group">
                            {!! Form::label('gif', 'GIF') !!}
                            {!! Form::file('gif',['class'=>'form-control ' . ( $errors->has('gif') ? ' is-invalid' : '' ),'accept'=>'image/*','capture'=>'camera']) !!}
                        </div>


                        {{Form::hidden('_method','PUT')}}

                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection