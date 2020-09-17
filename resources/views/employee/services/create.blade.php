@extends('layouts.auth')

@section('title')
    @include('layouts.inc.title',['title'=>"Services - Add"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>ADD SERVICES</h3></div>


                    <div class="card-body">
                        {!! Form::open(['route' => 'employee.services.store']) !!}

                        <div class="form-group">
                            {!! Form::label('service_id', 'Description') !!}
                            {!! Form::select('service_id',$services,null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>



                        {{ Form::hidden('user_id',$user_id)}}

                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection