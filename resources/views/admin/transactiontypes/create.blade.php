@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Transaction Types - Add"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>ADD TRANSACTION TYPE</h3></div>


                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.transactiontypes.store', 'files' => true]) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('code', 'Code') !!}
                            {!! Form::text('code',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>



                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection