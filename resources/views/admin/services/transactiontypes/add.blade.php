@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Services - Transaction Type - Add"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>ADD TRANSACTION TYPES</h3></div>

                    <h5>OFFICE: {{$service->office->code}}</h5>
                    <h6><b>{{$service->desc_name}}</b></h6>


                    <div class="card-body">
                        {!! Form::open(['route' => 'admin.services.transactiontypes.storetrans']) !!}

                        <div class="form-group">
                            {!! Form::label('transactiontype_id', 'Transaction Type') !!}
                            {!! Form::select('transactiontype_id',$transactiontypes,null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>


                        {!! Form::hidden('service_id', $service->id) !!}

                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection