@extends('layouts.auth')

@section('title')
    @include('layouts.inc.title',['title'=>"Services - File Attachments"])
@endsection

@section('customHeader')

    {{--<link href="{{ asset('public/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('public/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection


@section('content')

    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"> FILE ATTACHMENTS
                <a class="btn btn-primary" href="{{route('employee.services.files.add',['id'=>$service->id])}}">
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
                            <th>ID</th>
                            <th>File Name</th>
                            <th>File</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody>


                        @foreach($fileattachments as $fileattachment)
                            <tr>


                                <td>{{$fileattachment->id}}</td>
                                <td>{{$fileattachment->filename}}</td>
                                <td>
                                    @if($fileattachment->filename != NULL)
                                        <a target="_blank" href="{{asset('public/storage/fileattachments/'.$fileattachment->filename)}}"><img width="75" src="{{asset('public/storage/fileattachments/'.$fileattachment->filename)}}"></a>
                                    @else
                                        NO IMAGE UPLOADED.
                                    @endif
                                </td>

                                <td class="text-center">
                                    <a class="btn btn-success btn-sm"
                                       href="{{route('employee.services.files.edit',['id'=>$fileattachment->id])}}"><i
                                                class="fas fa-edit"></i> Edit</a>

                                    <a class="btn btn-danger btn-sm"
                                       href="{{route('employee.services.files.deletefiles',['id'=>$fileattachment->id])}}"><i
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