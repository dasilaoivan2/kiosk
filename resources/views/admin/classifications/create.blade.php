@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Classifications - Add"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>ADD CLASSIFICATION</h3></div>


                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.classifications.store', 'files' => true]) !!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>



                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection