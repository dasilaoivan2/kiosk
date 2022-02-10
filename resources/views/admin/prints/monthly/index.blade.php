@extends('layouts.admin')

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
            <h1 class="h2"> Monthly Clients

            </h1>


            {!! Form::open(['route' => 'admin.prints.monthly.search', 'class' => 'form-inline']) !!}

            <div class="form-group">
                {!! Form::label('month', 'Select Month') !!}
                {!! Form::month('month',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}
            </div>


            <button formtarget="_blank" type="submit" class="btn btn-primary" ><i class="fas fa-search"></i></button>

            {{--{!! Form::submit('Submit',['class'=>'btn btn-primary']) !!}--}}

            {!! Form::close() !!}

        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table id="sortedTable" class="table table-striped table-sm">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Barangay</th>
                            <th>Service Acquired</th>
                            <th>Office</th>

                        </tr>
                        </thead>
                        <tbody>

                        <?php $temp = 0;?>
                        
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
                    "targets": [0, 1, 2, 3],
                    "orderable": true
                }]

            });

        });
    </script>

@endsection