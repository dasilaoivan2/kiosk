@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Services - Edit"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>EDIT SERVICES</h3></div>


                    <div class="card-body">
                        {!!Form::model($service, ['route' => ['admin.services.update', $service->id], 'files' => true])!!}

                        <div class="form-group">
                            {!! Form::label('desc', 'Description') !!}
                            {!! Form::text('desc',$service->description,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('desc_bisaya', 'Bisayan Language') !!}
                            {!! Form::text('desc_bisaya',$service->desc_vernacular,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('location_id', 'Location') !!}
                            {!! Form::select('location_id',$locations,$service->location_id,['class'=>'form-control','placeholder'=>'Select Location...']) !!}
                        </div>

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('user_id', 'User') !!}--}}
                            {{--{!! Form::select('user_id',$users,$service->user_id,['class'=>'form-control','placeholder'=>'Select User...','required']) !!}--}}
                        {{--</div>--}}

                        <div class="form-group">
                            {!! Form::label('office_id', 'Office') !!}
                            {!! Form::select('office_id',$offices,$service->office_id,['class'=>'form-control','placeholder'=>'Select Office...','required']) !!}
                        </div>

                        <div class="form-group">
                            @if($service->icon!="")

                                <img width="200px" src="{{asset('public/storage/icons/'.($service->icon))}}">

                            @else
                                <img width="200px" src="{{asset('public/storage/icons/no_image.png')}}">

                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('icon', 'Service Icon') !!}
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