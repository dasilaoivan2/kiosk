@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Responsible Employee - Add"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header">
                        <h3>ADD ADDITIONAL SERVICES</h3>

                        <h4>Name : {{$user->name}}</h4>

                    </div>



                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.users.storeaddservice']) !!}


                        <div class="form-group">
                            {!! Form::label('service_id', 'Assign Services') !!}
                            {!! Form::select('service_id',$services,null,['class'=>'form-control','placeholder'=>'Select Services...','required']) !!}
                        </div>



                        {{ Form::hidden('user_id', $user->id) }}

                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection