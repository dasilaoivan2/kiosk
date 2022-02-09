@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Classifications - Edit"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>EDIT CLASSIFICATION</h3></div>


                    <div class="card-body">
                        {!!Form::model($classification, ['route' => ['admin.classifications.update', $classification->id], 'files' => true])!!}

                        <div class="form-group">
                            {!! Form::label('name', 'Name') !!}
                            {!! Form::text('name',$classification->name,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>


                        {{Form::hidden('_method','PUT')}}

                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection