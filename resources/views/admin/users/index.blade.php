@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Responsible Employee"])
@endsection

@section('customHeader')

    {{--<link href="{{ asset('public/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('public/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection


@section('content')

    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"> RESPONSIBLE EMPLOYEE (USER)

                <a class="btn btn-primary" href="{{route('admin.users.create')}}">
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
                            <th>Name</th>
                            <th style="background-color: antiquewhite" colspan="2" class="text-center">Services</th>
                            <th>Office</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $temp = 0;?>
                        @foreach($users as $user)
                            <tr>
                                <?php $temp++;?>

                                <td>{{$temp}}</td>
                                <td>{{$user->name}}</td>
                                <td class="text-center" style="background-color: antiquewhite">
                                    <a class="btn btn-secondary btn-sm rounded-circle"
                                       href="{{route('admin.users.addservice',['id'=>$user->id])}}"><i
                                                class="fas fa-plus-circle"></i>
                                    </a>
                                    <small>Add</small>
                                    <span class="badge badge-dark">{{$user->services->count()}}</span>
                                </td>
                                <td style="background-color: antiquewhite">
                                    <a class="btn btn-success btn-sm rounded-circle"
                                       href="{{route('admin.users.services.index',['id'=>$user->id])}}"><i
                                                class="fas fa-search"></i>
                                    </a>
                                    <small>View</small>
                                    <span class="badge badge-dark">{{$user->userservices->count()}}</span>
                                </td>
                                <td>{{$user->office->code}}</td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                       href="{{route('admin.users.edit',['id'=>$user->id])}}"><i
                                                class="fas fa-edit"></i> EDIT</a>
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
                    "targets": [0, 1, 2],
                    "orderable": true
                }]

            });

        });
    </script>

@endsection