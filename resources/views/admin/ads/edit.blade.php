@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Advertisement - Edit"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>EDIT OFFICE</h3></div>


                    <div class="card-body">
                        {!!Form::model($ad, ['route' => ['admin.ads.update', $ad->id], 'files' => true])!!}



                        <div class="form-group">
                            @if($ad->adsfile!="")

                                <img width="200px" src="{{asset('public/storage/jpgadds/'.($ad->adsfile))}}">

                            @else
                                <img width="200px" src="{{asset('public/storage/images/no_image.png')}}">

                            @endif
                        </div>


                        <div class="form-group">
                            {!! Form::label('adsfile', 'Advertisement Photo') !!}
                            {!! Form::file('adsfile',['class'=>'form-control ' . ( $errors->has('adsfile') ? ' is-invalid' : '' ),'accept'=>'image/*','capture'=>'camera']) !!}
                        </div>





                        {{Form::hidden('_method','PUT')}}

                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection