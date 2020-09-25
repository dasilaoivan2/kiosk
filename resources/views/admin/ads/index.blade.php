@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Advertisement"])
@endsection

@section('customHeader')

    {{--<link href="{{ asset('public/css/jquery.dataTables.min.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('public/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet">

@endsection


@section('content')

    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2"> ADVERTISEMENTS

                <a class="btn btn-primary" href="{{route('admin.ads.create')}}">
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
                            <th>Name of File</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        <?php $temp = 0;?>
                        @foreach($ads as $ad)
                            <tr>
                                <?php $temp++;?>

                                <td>{{$temp}}</td>
                                <td>{{$ad->adsfile}}</td>
                                <td>
                                    @if($ad->adsfile!=NULL)
                                        <a target="_blank" href="{{asset('public/storage/jpgadds/'.$ad->adsfile)}}"><img width="150px" src="{{asset('public/storage/jpgadds/'.$ad->adsfile)}}"></a>
                                    @else
                                        NO IMAGE UPLOADED.
                                    @endif


                                </td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="{{route('admin.ads.edit',['id'=>$ad->id])}}"><i class="fas fa-edit"></i> EDIT</a>
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
                    "targets": [0, 1, 2, 3],
                    "orderable": true
                }]

            });

        });
    </script>

@endsection