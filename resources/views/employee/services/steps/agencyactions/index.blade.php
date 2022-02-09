@extends('layouts.auth')

@section('title')
    @include('layouts.inc.title',['title'=>"Services - Agency Action"])
@endsection

@section('customHeader')

    {{--<link href="{{ asset('public/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('public/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection


@section('content')

    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"> AGENCY ACTIONS
                <a class="btn btn-primary" href="{{route('employee.services.steps.agencyactions.add',['id'=>$step->id])}}">
                    <i class="fas fa-plus-circle fa-lg"></i> Add
                </a>

                <a class="btn btn-dark" href="{{route('employee.services.steps.index',['id'=>$service->id])}}">
                    <i class="fas fa-arrow-alt-circle-left fa-lg"></i> Back
                </a>
            </h1>


        </div>

        <h2>Service Name: {{$service->desc_name}}</h2>
        <h3>Step No.: {{$step->client_step}}</h3>
        <h4>Description: {{$step->step_desc}}</h4>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="sortedTable" class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Description</th>
                            <th>Amount</th>
                            <th>Processing Time</th>
                            <th>Person Responsible</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($agencyactions as $agencyaction)
                            <tr>


                                <td>{{$agencyaction->id}}</td>
                                <td>{{$agencyaction->description}}</td>
                                <td>{{$agencyaction->amount}}</td>
                                <td>{{$agencyaction->processing_time}}</td>
                                <td>{{$agencyaction->person_responsible}}</td>

                                <td class="text-center">
                                    <a class="btn btn-success btn-sm"
                                       href="{{route('employee.services.steps.agencyactions.edit',['id'=>$agencyaction->id])}}"><i
                                                class="fas fa-edit"></i> Edit</a>

                                    <a class="btn btn-danger btn-sm"
                                       href="{{route('employee.services.steps.agencyactions.deleteagencyaction',['id'=>$agencyaction->id])}}"><i
                                                class="fas fa-trash"></i> Delete</a>
                                </td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
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
                    "targets": [0, 1],
                    "orderable": true
                }]

            });

        });
    </script>

@endsection