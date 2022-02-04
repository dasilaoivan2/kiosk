@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Services - Steps"])
@endsection

@section('customHeader')

    {{--<link href="{{ asset('public/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('public/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection


@section('content')

    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"> STEPS
                <a class="btn btn-primary" href="{{route('admin.services.steps.add',['id'=>$service->id])}}">
                    <i class="fas fa-plus-circle fa-lg"></i> Add
                </a>

                <a class="btn btn-dark" href="{{route('admin.services.index')}}">
                    <i class="fas fa-arrow-alt-circle-left fa-lg"></i> Back
                </a>
            </h1>


        </div>

        <h3>{{$service->desc_name}}</h3>

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="sortedTable" class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Step No.</th>
                            <th width="300px">Description</th>
                            <th style="background-color: aquamarine " class="text-center" colspan="2">AGENCY ACTION</th>
                            <th width="150px" class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($steps as $step)
                            <tr>
                                <td>{{$step->id}}</td>
                                <td>{{$step->client_step}}</td>
                                <td>{{$step->step_desc}}</td>

                                {{--AGENCY ACTION--}}

                                <td class="text-center" style="background-color: antiquewhite">
                                    <a class="btn btn-secondary btn-sm rounded-circle"
                                       href="{{route('admin.services.steps.agencyactions.add',['id'=>$step->id])}}"><i
                                                class="fas fa-plus-circle"></i>
                                    </a>
                                    <small>Add</small>
                                </td>
                                <td style="background-color: antiquewhite">
                                    <a class="btn btn-success btn-sm rounded-circle"
                                       href="{{route('admin.services.steps.agencyactions.index',['id'=>$step->id])}}"><i
                                                class="fas fa-search"></i>
                                    </a>
                                    <small>View </small><span class="badge badge-dark">{{$step->agencyactions->count()}}</span>
                                </td>

                                <td class="text-center">
                                    <a class="btn btn-success btn-sm"
                                       href="{{route('admin.services.steps.edit',['id'=>$step->id])}}"><i
                                                class="fas fa-edit"></i> Edit</a>

                                    <a class="btn btn-danger btn-sm"
                                       href="{{route('admin.services.steps.deletestep',['id'=>$step->id])}}"><i
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