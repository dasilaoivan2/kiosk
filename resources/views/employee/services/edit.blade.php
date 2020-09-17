@extends('layouts.auth')

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
                        {!!Form::model($userservice, ['route' => ['employee.services.update', $userservice->id]])!!}



                        <div class="form-group">
                            {!! Form::label('service_id', 'Services') !!}
                            {!! Form::select('service_id',$services,null,['class'=>'form-control','placeholder'=>'Select Location...','required']) !!}
                        </div>



                        {{Form::hidden('_method','PUT')}}

                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection