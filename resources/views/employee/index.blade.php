@extends('layouts.auth')

@section('title')
    @include('layouts.inc.title',['title'=>"Employee - Home"])
@endsection

@section('content')
    <div class="container">
        {{ date("l, F d, Y")}}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center">
                    <h4>Welcome: {{Auth::user()->name}}</h4>

                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <div class="container-fluid p-3 my-3 bg-dark text-white">
                            <h4>Services</h4>


                            <?php $temp = 0;?>
                            @foreach($user->userservices as $userservice)

                                <?php $temp++;?>

                                <p>{{$temp}}. {{$userservice->service->description}}.</p>


                            @endforeach

                        </div>
                    </div>
                    <div class="col-sm-9">
                        <div class="container-fluid p-3 my-3 bg-dark text-white">
                            <h4>Clients</h4>
                            <div class="table-responsive">
                                <table id="sortedTable" class="table table-striped table-sm text-white">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Contact No.</th>
                                        <th>Barangay</th>
                                        <th>Services Acquired</th>
                                        <th>Priority No.</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php $temp = 0;?>

                                    @foreach($user->userservices as $userservice)


                                        @foreach($userservice->clients as $clientservice)

                                            <?php $temp++;?>
                                            <tr>
                                                <td>{{$temp}}</td>
                                                <td>{{$clientservice->client->name}}</td>
                                                <td>{{$clientservice->client->contact_no}}</td>
                                                <td>{{$clientservice->client->barangay->name}}</td>
                                                <td>{{$userservice->service->description}}</td>
                                                <td>{{$clientservice->client->priority_no}}</td>
                                                <td>

                                                    <button value="{{$clientservice->client->id}}" id="btn{{$clientservice->client->id}}" class="btnupdateclient btn @if($clientservice->client->status==false) btn-danger @else btn-primary @endif">@if($clientservice->client->status==true) OK @else PENDING @endif</button>

                                                    <button value="{{$clientservice->client->id}}" id="btnserving{{$clientservice->client->id}}" class="btnupdateserving btn @if($clientservice->client->nowserving==false) btn-danger @else btn-success @endif">@if($clientservice->client->nowserving==true) Served @else Now Serving @endif</button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    @endforeach

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

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
                    "targets": [0, 1, 2, 3, 4, 5],
                    "orderable": true
                }]

            });

        });
    </script>

    <script>



        $( ".btnupdateclient" ).click(function() {

            var text = "#btn"+$(this).attr('value');
            console.log(text);

            console.log($(this).attr('value'));

            $.ajaxSetup(
                {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.post('{{route('client.updateclient')}}', {id:$(this).attr('value')},function (data) {


                $(text).text('OK').removeClass('btn-danger').addClass('btn-primary');

            }).fail(function () {

                alert("Failed to create comment.");

            });


        });

        $( ".btnupdateserving" ).click(function() {

            var text = "#btnserving"+$(this).attr('value');
            console.log(text);

            console.log($(this).attr('value'));

            $.ajaxSetup(
                {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.post('{{route('client.updateserving')}}', {id:$(this).attr('value')},function (data) {


                $(text).text('Served').removeClass('btn-danger').addClass('btn-success');

            }).fail(function () {

                alert("Failed to create comment.");

            });


        });

    </script>

@endsection
