@extends('layouts.dashboard')

@section('title')
    @include('layouts.inc.title',['title'=>"Dashboard"])
@endsection

@section('customStyles')

    <style>

        .redborder{
            border-bottom: dotted red 3px;
        }


    </style>
@endsection

@section('content')
    <div class="container-fluid">

        <marquee width="100%" direction="left" scrollamount="12">
            <h1 style="font-size: 50pt; font-weight: bold; font-family: 'GROBOLD'; color: yellow">N O W  &nbsp  S E R V I N G!  &nbsp&nbsp   N O W &nbsp S E R V I N G!   &nbsp&nbsp  N O W &nbsp S E R V I N G! &nbsp&nbsp N O W &nbsp S E R V I N G!&nbsp&nbsp</h1>
        </marquee>

        <div class="row">
            <div style="border-bottom: dotted white 3px" class="col-md-6 text-center">
                <h2 style="color: white; font-weight: bold">OFFICE NAME</h2>
            </div>

            <div style="border-bottom: dotted white 3px" class="col-md-3 text-center">
                <h2 style="color: white; font-weight: bold">WINDOW</h2>
            </div>

            <div style="border-bottom: dotted white 3px" class="col-md-3 text-center">
                <h2 style="color: white; font-weight: bold">PRIORITY NO.</h2>
            </div>
        </div>

        @php

            $now = date('Y-m-d');

        @endphp


        @foreach($offices as $office)

            <div class="row" id="officename{{$office->id}}">
                <div style="border-bottom: dotted white 3px" class="col-md-6 text-center">
                    <h2 style="color: white; font-weight: bold">{{$office->name}}</h2>
                </div>
                <div style="border-bottom: dotted white 3px" class="col-md-3 text-center">
                    <h2 style="color: white; font-weight: bold">{{$office->window}}</h2>
                </div>
                <div style="border-bottom: dotted white 3px" class="col-md-3 text-center">
                    <h2 style="color: white; font-weight: bold" id="prioritynum{{$office->id}}">
                        @foreach($office->clientservices as $clientservice)
                            @if($clientservice->nowserving == 1 && $clientservice->client->status == 0)
                                {{$clientservice->client->priority_no}}
                            @endif
                        @endforeach
                    </h2>
                </div>
            </div>
        @endforeach



    </div>
@endsection

@section('customScripts')
    <script>
        $(document).ready(function() {


            function playsound() {

                var audio = {};
                audio["walk"] = new Audio();
                audio["walk"].src = "{{asset('/public/storage/music_1.mp3')}}";
                audio["walk"].play();
            }

            function updateplaysound(id) {


                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    /* the route pointing to the post function */
                    url: '{{url('/dashboard/updateplaysound')}}',
                    type: 'POST',
                    /* send the csrf-token and the input to the controller */
                    data: {_token: CSRF_TOKEN, id: id},
                    dataType: 'JSON',
                    /* remind that 'data' is the response of the AjaxController */

                    success: function (data1) {
                        console.log(data1);
                    }
                });

            }

            function checkdbupdate() {


                var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                setInterval(function () {
                    $.ajax({
                        /* the route pointing to the post function */
                        url: '{{url('/dashboard/checkdbupdate')}}',
                        type: 'POST',
                        /* send the csrf-token and the input to the controller */
                        data: {_token: CSRF_TOKEN},
                        dataType: 'JSON',
                        /* remind that 'data' is the response of the AjaxController */

                        success: function (data) {

                            var officedomid = "#officename" + data['office_id'];
                            var prioritynumdom = "#prioritynum" + data['office_id'];

                            console.log(data);

                            if (data['playsound'] == 1 && data['nowserving'] == 1) {

                                $(prioritynumdom).html(data['priority_no']);
                                $(officedomid).addClass("redborder");
                                playsound();
                            }

                            // updateplaysound(data['id']);

                        }

                    });
                }, 1000); // Do this every 5 seconds
            }

            checkdbupdate();



        });
    </script>

@endsection