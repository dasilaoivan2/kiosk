@extends('layouts.auth')

@section('title')
    @include('layouts.inc.title',['title'=>"Employee - Services"])
@endsection

@section('customHeader')

    {{--<link href="{{ asset('public/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('public/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection


@section('content')

    <div class="container-fluid">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"> SERVICES

                <a class="btn btn-primary" href="{{route('employee.services.create')}}">
                    <i class="fas fa-plus-circle fa-lg"></i> Add
                </a>

            </h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="sortedTable" class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Office</th>
                            <th width="400px">Services</th>
                            <th class="text-center" colspan="2">TRANSACTION TYPE</th>
                            <th style="background-color: antiquewhite" class="text-center" colspan="2">REQUIREMENTS</th>
                            <th style="background-color: aquamarine " class="text-center" colspan="2">STEPS</th>
                            <th width="120px" style="background-color: lightblue" class="text-center">FILE</th>
                            <th class="text-center" colspan="2">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $temp = 0;?>
                        @foreach($userservices as $userservice)
                            <tr>
                                <?php $temp++;?>

                                <td>{{$temp}}</td>
                                <td>{{$userservice->service->office->code}}</td>
                                <td>{{$userservice->service->desc_name}}</td>
                                <td>
                                    @foreach($userservice->service->transactiontypes as $transactiontype)
                                        <div class="row">
                                            <div>{{$transactiontype->name}}</div>
                                        </div>

                                    @endforeach
                                </td>
                                <td>
                                    <a href="{{route('employee.services.transactiontypes.index', $userservice->service->id)}}"
                                       class="badge badge-primary">View</a>
                                </td>

                                {{--REQUIREMENTS--}}

                                <td class="text-center" style="background-color: antiquewhite">
                                    <a class="btn btn-secondary btn-sm rounded-circle"
                                       href="{{route('employee.services.requirements.add',['id'=>$userservice->service->id])}}"><i
                                                class="fas fa-plus-circle"></i>
                                    </a>
                                    <small>Add</small>
                                </td>
                                <td style="background-color: antiquewhite">
                                    <a class="btn btn-success btn-sm rounded-circle"
                                       href="{{route('employee.services.requirements.index',['id'=>$userservice->service->id])}}"><i
                                                class="fas fa-search"></i>
                                    </a>
                                    <small>View</small>
                                    <span class="badge badge-dark">{{$userservice->service->requirements->count()}}</span>
                                </td>

                                {{--STEPS--}}

                                <td class="text-center" style="background-color: aquamarine ">
                                    <a class="btn btn-secondary btn-sm rounded-circle"
                                       href="{{route('employee.services.steps.add',['id'=>$userservice->service->id])}}"><i
                                                class="fas fa-plus-circle"></i>
                                    </a>
                                    <small>Add</small>
                                </td>
                                <td style="background-color: aquamarine ">
                                    <a class="btn btn-success btn-sm rounded-circle"
                                       href="{{route('employee.services.steps.index',['id'=>$userservice->service->id])}}"><i
                                                class="fas fa-search"></i>
                                    </a>
                                    <small>View</small>
                                    <span class="badge badge-dark">{{$userservice->service->steps->count()}}</span>
                                </td>

                                <td class="text-center" style="background-color: lightblue ">
                                    <a class="btn btn-success btn-sm rounded-circle"
                                       href="{{route('employee.services.files.index',['id'=>$userservice->service->id])}}"><i
                                                class="fas fa-folder-open"></i>
                                    </a>
                                    <small>Attachment</small>
                                    <span class="badge badge-dark">{{$userservice->service->fileattachments->count()}}</span>
                                </td>


                                <td class="text-center">
                                    <a class="btn btn-success btn-sm"
                                       href="{{route('employee.services.edit',['id'=>$userservice->id, 'service_id'=>$userservice->service_id])}}"><i
                                                class="fas fa-edit"></i> EDIT</a>
                                </td>

                                <td class="text-center">
                                    <a class="btn btn-primary btn-sm"
                                       href="{{route('employee.services.show',['service_id'=>$userservice->service->id])}}"><i
                                                class="fas fa-search-location"></i> SHOW</a>
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
                "paging": true,
                "columnDefs": [{
                    "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8],
                    "orderable": true
                }]

            });

        });
    </script>

@endsection