@extends('layouts.auth')

@section('title')
    @include('layouts.inc.title',['title'=>"Employee - Served Clients"])
@endsection

@section('content')
    <div class="container-fluid">
        {{ date("l, F d, Y")}}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center">
                    <h4>Welcome: {{Auth::user()->name}}</h4>

                </div>
                        <div class="container-fluid p-3 my-3 bg-dark text-white">
                            <h4>Clients Served</h4>
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
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>


                                    <?php $temp = 0;?>

                                    @foreach($user->userservices as $userservice)


                                        @foreach($userservice->clientsServed as $clientservice)

                                            @if($clientservice->client->status==1)

                                                <?php $temp++;?>
                                                <tr>
                                                    <td>{{$temp}}</td>
                                                    <td>{{$clientservice->client->name}}</td>
                                                    <td>{{$clientservice->client->contact_no}}</td>
                                                    <td>{{$clientservice->client->barangay->name}}</td>
                                                    <td>{{$userservice->service->description}}</td>
                                                    <td>{{$clientservice->client->priority_no}}</td>
                                                    <td>{{$clientservice->client->created_at->format('M d, Y')}}</td>
                                                    <td>

                                                        <button disabled value="{{$clientservice->client->id}}"
                                                                id="btn{{$clientservice->client->id}}"
                                                                status="{{$clientservice->client->status}}"
                                                                class="btnupdateclient btn

@if($clientservice->client->status==0)
                                                                        btn-danger
@else
                                                                        btn-primary
@endif">
                                                            @if($clientservice->client->status==0)
                                                                Pending
                                                            @else
                                                                Served
                                                            @endif


                                                        </button>

                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach

                                    @endforeach

                                    </tbody>
                                </table>
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


        $(".btnupdateclient").click(function () {

            var text = "#btn" + $(this).attr('value');
            console.log(text);

            console.log($(this).attr('value'));

            $.ajaxSetup(
                {
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.post('{{route('client.updateclient')}}', {
                id: $(this).attr('value'),
                status: $(this).attr('status')
            }, function (data) {


//                $(text).text('OK').removeClass('btn-danger').addClass('btn-primary');
                window.location.reload();

            }).fail(function () {

                alert("Failed to create comment.");

            });


        });


    </script>

@endsection
