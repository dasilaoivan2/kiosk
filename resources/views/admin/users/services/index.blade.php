@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Responsible Employee - Service"])
@endsection

@section('customHeader')

    {{--<link href="{{ asset('public/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('public/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection


@section('content')

    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"> OFFICE SERVICES

                <a class="btn btn-primary" href="{{route('admin.users.addservice',['id'=>$user->id])}}">
                    <i class="fas fa-plus-circle fa-lg"></i> Add
                </a>

                <a class="btn btn-dark" href="{{route('admin.users.index')}}">
                    <i class="fas fa-arrow-alt-circle-left fa-lg"></i> Back
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
                            <th>User</th>
                            <th>Office</th>
                            <th>Service (Clients View)</th>
                            <th>Service</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $temp = 0;?>
                        @foreach($userservices as $userservice)
                            <tr>
                                <?php $temp++;?>

                                <td>{{$temp}}</td>
                                <td>{{$userservice->user->name}}</td>
                                <td>{{$userservice->service->office->code}}</td>
                                <td>{{$userservice->service->description}}</td>
                                <td>{{$userservice->service->desc_name}}</td>
                                <td>
                                    <a class="btn btn-success btn-sm"
                                       href="{{route('admin.users.services.edit',['id'=>$userservice->id])}}"><i
                                                class="fas fa-edit"></i> EDIT</a>

                                    <a class="btn btn-danger btn-sm"
                                       href="{{route('admin.users.services.delete',['id'=>$userservice->id])}}"><i
                                                class="fas fa-trash"></i> DELETE</a>
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