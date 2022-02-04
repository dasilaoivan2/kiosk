@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Services - Transaction Type - Edit"])
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card text-center">
                    <div class="card-header"><h3>EDIT TRANSACTION TYPES</h3></div>

                    <h5>OFFICE: {{$servicetranstype->service->office->code}}</h5>
                    <h6><b>{{$servicetranstype->service->desc_name}}</b></h6>


                    <div class="card-body">
                        {!!Form::model($servicetranstype, ['route' => ['admin.services.transactiontypes.updatetrans', $servicetranstype->id], 'files' => true])!!}


                        <div class="form-group">
                            {!! Form::label('transactiontype_id', 'Transaction Type') !!}
                            {!! Form::select('transactiontype_id',$transactiontypes, $servicetranstype->transactiontype->id,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
                        </div>

                        {{Form::hidden('_method','PUT')}}

                        {!! Form::hidden('service_id', $servicetranstype->service_id) !!}



                        {!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}

                        {!! Form::close() !!}


                    </div>

                </div>
            </div>
        </div>


@endsection