@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Transaction Types - Edit"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>EDIT TRANSACTION TYPE</h3></div>


                    <div class="card-body">
                        {!!Form::model($transactiontype, ['route' => ['admin.transactiontypes.update', $transactiontype->id], 'files' => true])!!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name',$transactiontype->name,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('code', 'Code') !!}
                            {!! Form::text('code',$transactiontype->code,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>


                        {{Form::hidden('_method','PUT')}}

                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection