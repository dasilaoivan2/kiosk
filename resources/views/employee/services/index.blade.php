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

                <a class="btn btn-info btn-sm" href="{{route('employee.services.create')}}">
                    Add Services
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
                            <th>Services</th>
                            <th>Office</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $temp = 0;?>
                        @foreach($userservices as $userservice)
                            <tr>
                                <?php $temp++;?>

                                <td>{{$temp}}</td>
                                <td>{{$userservice->service->description}}</td>
                                <td>{{$userservice->service->office->code}}</td>

                                <td>
                                    <a class="btn btn-success btn-sm" href="{{route('employee.services.edit',['id'=>$userservice->id])}}"><span
                                                data-feather="edit"></span> EDIT</a>
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
                    "targets": [0, 1, 2, 3],
                    "orderable": true
                }]

            });

        });
    </script>

@endsection