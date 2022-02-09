@extends('layouts.auth')

@section('title')
    @include('layouts.inc.title',['title'=>"Services"])
@endsection

@section('customHeader')

    {{--<link href="{{ asset('public/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('public/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection


@section('content')

    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"> TRANSACTION TYPES
                <a class="btn btn-primary" href="{{route('employee.services.transactiontypes.add',['id'=>$service->id])}}">
                    <i class="fas fa-plus-circle fa-lg"></i> Add
                </a>

                <a class="btn btn-dark" href="{{route('employee.services.index')}}">
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
                            <th>#</th>
                            <th>Transaction Type</th>
                            <th>Code</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $temp = 0;?>
                        @foreach($servicetranstypes as $type)
                            <tr>
                                <?php $temp++;?>

                                <td>{{$temp}}</td>
                                <td>{{$type->transactiontype->name}}</td>
                                <td>{{$type->transactiontype->code}}</td>
                                <td class="text-center">
                                    <a class="btn btn-success btn-sm"
                                       href="{{route('employee.services.transactiontypes.edit',['id'=>$type->id])}}"><i
                                                class="fas fa-edit"></i> EDIT</a>

                                    <a class="btn btn-danger btn-sm"
                                       href="{{route('employee.services.transactiontypes.deletetrans',['id'=>$type->id])}}"><i
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
                "paging": true,
                "columnDefs": [{
                    "targets": [0, 1, 2, 3, 4, 5, 6, 7, 8],
                    "orderable": true
                }]

            });

        });
    </script>

@endsection