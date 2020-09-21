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
                            <th>Assigned Services</th>
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
                                <td>
                                    {{$userservice->service->description}}
                                    <a class="btn btn-primary btn-sm rounded-pill" href="{{route('admin.users.addservice',['id'=>$userservice->user_id])}}"><i class="fas fa-plus-circle"></i></a>


                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{route('admin.users.edit',['id'=>$userservice->id])}}"><i class="fas fa-edit"></i> EDIT</a>
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