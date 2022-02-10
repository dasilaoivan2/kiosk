@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Responsible Employee - Services -Add"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">
                        <h3>EDIT USER SERVICES</h3>

                        <h4>Name : {{$userservice->user->name}}</h4>

                    </div>



                    <div class="card-body">
                        {!!Form::model($userservice, ['route' => ['admin.users.services.update', $userservice->id]])!!}


                        <div class="form-group">
                            {!! Form::label('service_id', 'Assign Services') !!}
                            {!! Form::select('service_id',$services,$userservice->service_id,['class'=>'form-control','placeholder'=>'Select Services...','required']) !!}
                        </div>



                        {{Form::hidden('_method','PUT')}}

                        {{ Form::hidden('user_id', $userservice->user_id) }}

                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection