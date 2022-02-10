@extends('layouts.auth')

@section('title')
    @include('layouts.inc.title',['title'=>"Employee - Services - Edit"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>EDIT SERVICES</h3></div>


                    <div class="card-body">
                        {!!Form::model($service, ['route' => ['employee.services.update', $service->id], 'files' => true])!!}

                        <div class="form-group">
                            {!! Form::label('client_desc', 'Service Name (for Clients view)') !!}
                            {!! Form::text('client_desc',$service->client_desc,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('desc_bisaya', 'Bisayan Language (for Clients view)') !!}
                            {!! Form::text('desc_bisaya',$service->desc_vernacular,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('desc_name', 'Service Name',['class' => 'font-weight-bold']) !!}
                            {!! Form::text('desc_name',$service->desc_name,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('desc', 'Description of Service',['class' => 'font-weight-bold']) !!}
                            {!! Form::text('desc',$service->description,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('location_id', 'Location') !!}
                            {!! Form::select('location_id',$locations,$service->location_id,['class'=>'form-control','placeholder'=>'Select Location...']) !!}
                        </div>

                        {{--<div class="form-group">--}}
                        {{--{!! Form::label('user_id', 'User') !!}--}}
                        {{--{!! Form::select('user_id',$users,$service->user_id,['class'=>'form-control','placeholder'=>'Select User...','required']) !!}--}}
                        {{--</div>--}}


                        <div class="form-group">
                            {!! Form::label('classification_id', 'Classification',['class' => 'font-weight-bold']) !!}
                            {!! Form::select('classification_id',$classifications,$service->classification_id,['class'=>'form-control','placeholder'=>'Select Office...','required']) !!}
                        </div>

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('transactiontype_id', 'Type of Transaction') !!}--}}
                            {{--{!! Form::select('transactiontype_id',$transactiontypes,$service->transaction_id,['class'=>'form-control','placeholder'=>'Select Office...','required']) !!}--}}
                        {{--</div>--}}

                        <div class="form-group">
                            {!! Form::label('availability', 'Who may Avail',['class' => 'font-weight-bold']) !!}
                            {!! Form::text('availability',$service->availability,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        {{--<div class="form-group">--}}
                            {{--@if($service->fileattachment!="")--}}

                                {{--<img width="200px" src="{{asset('public/storage/fileattachments/'.($service->fileattachment))}}">--}}

                            {{--@else--}}
                                {{--<img width="200px" src="{{asset('public/storage/fileattachments/no_image.png')}}">--}}

                            {{--@endif--}}
                        {{--</div>--}}

                        {{--<div class="form-group">--}}
                            {{--{!! Form::label('fileattachment', 'File Attachment') !!}--}}
                            {{--{!! Form::file('fileattachment',['class'=>'form-control ' . ( $errors->has('fileattachment') ? ' is-invalid' : '' ),'accept'=>'image/*','capture'=>'camera']) !!}--}}
                        {{--</div>--}}

                        <div class="form-group">
                            @if($service->icon!="")

                                <img width="200px" src="{{asset('public/storage/icons/'.($service->icon))}}">

                            @else
                                <img width="200px" src="{{asset('public/storage/icons/no_image.png')}}">

                            @endif
                        </div>

                        <div class="form-group">
                            {!! Form::label('icon', 'Service Icon',['class' => 'font-weight-bold']) !!}
                            {!! Form::file('icon',['class'=>'form-control ' . ( $errors->has('icon') ? ' is-invalid' : '' ),'accept'=>'image/*','capture'=>'camera']) !!}
                        </div>


                        {!! Form::hidden('office_id', $office_id) !!}

                        {{Form::hidden('_method','PUT')}}

                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection