@extends('layouts.auth')

@section('title')
    @include('layouts.inc.title',['title'=>"Employee - Services - Add"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>ADD SERVICES</h3></div>


                    <div class="card-body">
                        {!! Form::open(['route' => 'employee.services.store','files' => true]) !!}

                        <div class="form-group">
                            {!! Form::label('client_desc', 'Service Name (for Clients view)') !!}
                            {!! Form::text('client_desc',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('desc_bisaya', 'Bisayan Language (for Clients view)') !!}
                            {!! Form::text('desc_bisaya',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('desc_name', 'Service Name',['class' => 'font-weight-bold']) !!}
                            {!! Form::text('desc_name',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('desc', 'Description of Service', ['class'=>'font-weight-bold']) !!}
                            {!! Form::text('desc',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('location_id', 'Location (Optional)') !!}
                            {!! Form::select('location_id',$locations,null,['class'=>'form-control','placeholder'=>'Select Location...']) !!}
                        </div>

                        {{--<div class="form-group">--}}
                        {{--{!! Form::label('user_id', 'User') !!}--}}
                        {{--{!! Form::select('user_id',$users,null,['class'=>'form-control','placeholder'=>'Select User...','required']) !!}--}}
                        {{--</div>--}}


                        <div class="form-group">
                            {!! Form::label('classification_id', 'Classification',['class' => 'font-weight-bold']) !!}
                            {!! Form::select('classification_id',$classifications,null,['class'=>'form-control','placeholder'=>'Select Office...','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('transactiontype_id', 'Type of Transaction',['class' => 'font-weight-bold']) !!}
                            {!! Form::select('transactiontype_id',$transactiontypes,null,['class'=>'form-control','placeholder'=>'Select Office...','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('availability', 'Who may Avail',['class' => 'font-weight-bold']) !!}
                            {!! Form::text('availability',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('fileattachment', 'File Attachment',['class' => 'font-weight-bold']) !!}
                            {!! Form::file('fileattachment',['class'=>'form-control ' . ( $errors->has('fileattachment') ? ' is-invalid' : '' ),'accept'=>'image/*','capture'=>'camera']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('icon', 'Service Icon',['class' => 'font-weight-bold']) !!}
                            {!! Form::file('icon',['class'=>'form-control ' . ( $errors->has('icon') ? ' is-invalid' : '' ),'accept'=>'image/*','capture'=>'camera']) !!}
                        </div>

                        {!! Form::hidden('user_id', $user_id) !!}
                        {!! Form::hidden('office_id', $office_id) !!}

                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection