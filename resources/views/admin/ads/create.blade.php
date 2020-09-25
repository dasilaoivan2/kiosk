@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Advertisement - Add"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>ADD ADS</h3></div>


                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.ads.store', 'files' => true]) !!}


                        <div class="form-group">
                            {!! Form::label('adsfile', 'Advertisement Photo') !!}
                            {!! Form::file('adsfile',['class'=>'form-control ' . ( $errors->has('adsfile') ? ' is-invalid' : '' ),'accept'=>'image/*','capture'=>'camera']) !!}
                        </div>



                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection