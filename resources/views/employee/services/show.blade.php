@extends('layouts.auth')

@section('title')
    @include('layouts.inc.title',['title'=>"Employee - Services"])
@endsection

@section('customHeader')

    {{--<link href="{{ asset('public/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('public/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection


@section('content')

    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"> SERVICES

                <a class="btn btn-primary" href="{{route('employee.services.index')}}">
                    <i class="fas fa-arrow-left fa-lg"></i> Back
                </a>

            </h1>
        </div>



        {{--<table class="col-md-12">--}}
        {{--<thead>--}}
        {{--<tr>--}}
        {{--<th class="border p-1">CLIENT STEPS</th>--}}
        {{--<th class="border p-1">AGENCY ACTION</th>--}}
        {{--<th class="border p-1">FEES TO BE PAID</th>--}}
        {{--<th class="border p-1">PROCESSING TIME</th>--}}
        {{--<th class="border p-1">PERSON RESPONSIBLE</th>--}}
        {{--</tr>--}}
        {{--</thead>--}}
        {{--<tbody>--}}
        {{--@foreach($service->steps as $step)--}}
        {{--<tr>--}}
        {{--<td class="border p-1">{{$step->client_step}}. {{$step->step_desc}}</td>--}}
        {{--<td class="border p-1">--}}
        {{--@foreach($step->agencyactions as $agencyaction)--}}
        {{--<table>--}}
        {{--<tr>--}}
        {{--<td>{{$agencyaction->description}}</td>--}}
        {{--</tr>--}}
        {{--</table>--}}
        {{--@endforeach--}}
        {{--</td>--}}
        {{--<td class="border p-1">--}}
        {{--@foreach($step->agencyactions as $agencyaction)--}}
        {{--<table>--}}
        {{--<tr>--}}
        {{--<td>{{$agencyaction->amount}}</td>--}}
        {{--</tr>--}}
        {{--</table>--}}
        {{--@endforeach--}}
        {{--</td>--}}
        {{--<td class="border p-1">pt</td>--}}
        {{--<td class="border p-1">rp</td>--}}
        {{--</tr>--}}

        {{--@endforeach--}}
        {{--</tbody>--}}
        {{--</table>--}}




        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="title">
                    <h1>{{$service->desc_name}}

                        @if($service->fileattachment != NULL)
                            <a class="btn btn-secondary" target="_blank" href="{{asset('public/storage/fileattachments/'.$service->fileattachment)}}">
                                <i class="fas fa-box-open fa-lg"></i> Attachment
                            </a>
                        @endif


                    </h1>
                    <p>{{$service->description}}</p>
                </div>
                <br>

                <div class="row">
                    <div style="border: solid 1px black;background-color: lightgray " class="col-sm-6"><h4 style="font-weight: bold">OFFICE OR
                            DIVISION:</h4></div>
                    <div style="border: solid 1px black" class="col-sm-6"><h4>{{$service->office->name}}</h4></div>
                </div>
                <div class="row">
                    <div style="border: solid 1px black;background-color: lightgray" class="col-sm-6"><h4 style="font-weight: bold">
                            CLASSIFICATION:</h4></div>
                    <div style="border: solid 1px black" class="col-sm-6"><h4>{{$service->classification->name}}</h4>
                    </div>
                </div>
                <div class="row">
                    <div style="border: solid 1px black;background-color: lightgray" class="col-sm-6"><h4 style="font-weight: bold">TYPE OF
                            TRANSACTION:</h4></div>


                    <div style="border: solid 1px black" class="col-sm-6">

                        @foreach($service->transactiontypes as $transactiontype)
                            <div class="row">
                                <div class="col">
                                    <h4>
                                        {{$transactiontype->code}} - {{$transactiontype->name}}
                                    </h4>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="row">
                    <div style="border: solid 1px black; background-color: lightgray" class="col-sm-6"><h4 style="font-weight: bold">WHO MAY
                            AVAIL:</h4></div>
                    <div style="border: solid 1px black" class="col-sm-6"><h4>{{$service->availability}}</h4></div>
                </div>
                <div class="row" style="background-color: lightgray">
                    <div style="border: solid 1px black" class="col-sm-6"><h4 style="font-weight: bold">CHECKLIST OF
                            REQUIREMENTS:</h4></div>
                    <div style="border: solid 1px black" class="col-sm-6"><h4 style="font-weight: bold">WHERE TO
                            SECURE</h4></div>
                </div>

                @foreach($service->requirements as $requirement)
                    <div class="row">
                        <div style="border: solid 1px black" class="col-sm-6">
                            <h4>{{$requirement->requirement_desc}}</h4></div>
                        <div style="border: solid 1px black" class="col-sm-6"><h4>{{$requirement->wheretosecure}}</h4>
                        </div>
                    </div>

                @endforeach

                <div class="row" style="background-color: lightgray">
                    <div style="border: solid 1px black" class="col-sm-3"><h4 style="font-weight: bold">CLIENT
                            STEPS</h4></div>
                    <div style="border: solid 1px black" class="col-sm-3"><h4 style="font-weight: bold">AGENCY
                            ACTION</h4></div>
                    <div style="border: solid 1px black" class="col"><h4 style="font-weight: bold">FEES TO BE
                            PAID</h4></div>
                    <div style="border: solid 1px black" class="col"><h4 style="font-weight: bold">PROCESSING
                            TIME</h4></div>
                    <div style="border: solid 1px black" class="col"><h4 style="font-weight: bold">PERSON
                            RESPONSIBLE</h4></div>
                </div>

                @foreach($service->steps as $step)
                    <div class="row">
                        <div style="border: solid 1px black" class="col-sm-3"><h4
                                    style="font-weight: bold">{{$step->client_step}}. {{$step->step_desc}}</h4>
                        </div>
                        <div style="border: solid 1px black" class="col-sm-9">

                            @foreach($step->agencyactions as $agencyaction)
                                <div class="row">
                                    <div style="border: 1px solid black" class="col-sm-4">
                                        <h4 style="font-weight: 300">{{$agencyaction->description}}</h4>
                                    </div>
                                    <div style="border: 1px solid black" class="col-sm">
                                        <h4 style="font-weight: 300">{{$agencyaction->amount}}</h4>
                                    </div>
                                    <div style="border: 1px solid black" class="col-sm">
                                        <h4 style="font-weight: 300">{{$agencyaction->processing_time}}</h4>
                                    </div>
                                    <div style="border: 1px solid black" class="col-sm">
                                        <h4 style="font-weight: 300">{{$agencyaction->person_responsible}}</h4>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <div class="row">
                    <div style="border: solid 1px black;text-align: right" class="col-sm-6"><h4 style="font-weight: bold">TOTAL</h4></div>
                    <div style="border: solid 1px black" class="col-sm-2"><h4 style="font-weight: bold"></h4></div>
                    <div style="border: solid 1px black" class="col-sm-4"><h4 style="font-weight: bold"></h4></div>
                    {{--<div style="border: solid 1px black" class="col-sm-2"><h4 style="font-weight: bold">P {{$service->totalfees()}}</h4></div>--}}
                    {{--<div style="border: solid 1px black" class="col-sm-4"><h4 style="font-weight: bold">{{$service->totalminutes()}} minute(s)</h4></div>--}}

                </div>


            </div>
        </div>
    </div>




@endsection

@section('customScripts')


    @include('layouts.js.datatables')

    {{--<script>--}}
    {{--$(document).ready( function () {--}}
    {{--$('#myTable').DataTable();--}}
    {{--} );--}}
    {{--</script>--}}


    <script>
        $(document).ready(function () {

            $('#sortedTable').DataTable({
                "paging": false,
                "columnDefs": [{
                    "targets": [0, 1, 2, 3],
                    "orderable": true
                }]

            });

        });
    </script>

@endsection