@extends('layouts.client')

@section('title')
    @include('layouts.inc.title',['title'=>"Client"])
@endsection

@section('content')
    <div class="container-fluid">
        {{ date("l, F d, Y")}}
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center"><h3 style="font-weight: bold">{{$service->description}}</h3>
                    <h5 style="font-weight: bolder">Window {{$service->office->window}}</h5>

                    {{--<div class="row">--}}
                        {{--<div class="col-sm-4">--}}
                            <div class="container-fluid p-3 my-3 bg-dark text-white">
                                <h5 style="font-weight: bolder">Please fill up form</h5>
                                <p>Click Submit to get your Service Slip & Priority No.</p>
                                {{--<p>Click Submit to get your Priority No.</p>--}}


                                {{--{!! Form::open(['route' => ['client.store',$service->id],'method' => 'post']) !!}--}}

                                {{--<div class="form-group">--}}

                                    {{--{!! Form::text('name',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}--}}
                                    {{--{!! Form::label('name', 'Client Name') !!}--}}
                                {{--</div>--}}

                                         {{--<div class="form-group">--}}
                                    {{--{!! Form::text('contact_no',null,['class'=>'form-control','placeholder'=>'Type here...','autofocus','required']) !!}--}}
                                    {{--{!! Form::label('contact_no', 'Contact No.') !!}--}}
                                {{--</div>--}}

                                {{--<div class="form-group">--}}
                                    {{--{!! Form::select('barangay_id',$barangays,null,['class'=>'form-control','placeholder'=>'Select Barangay...','required']) !!}--}}
                                    {{--{!! Form::label('barangay_id', 'Barangay') !!}--}}
                                {{--</div>--}}

                                {{--{{Form::hidden('service_id',$service->id)}}--}}

                                {{--{!! Form::submit('Submit',['class'=>'btn btn-primary', 'id'=>'prints']) !!}--}}

                                {{--{!! Form::close() !!}--}}


                                {{--<form role="form" action="{{ route('client.store',$service->id) }}" method="POST">--}}

                                    {{--{{csrf_field()}}--}}

                                    <div class="form-group">
                                        <label for="name">Client Name</label>
                                        <input class="form-control" type="text" id="name" name="name" placeholder="Tap here....." required>
                                    </div>

                                    <div class="form-group">
                                        <label for="contact_no">Contact No.</label>
                                        <input class="form-control" type="text" id="contact_no" name="contact_no" placeholder="Tap here....." required>
                                    </div>

                                    <div class="form-group">
                                        <label for="barangay_id">Barangay</label>
                                        <select class="form-control" id="barangay_id" name="barangay_id" required>
                                            <option value=""> ---Select Barangay--- </option>
                                        @foreach($barangays as $brgy)
                                            <option value="{{$brgy->id}}">{{$brgy->name}}</option>

                                            @endforeach
                                        </select>
                                    </div>

                                    <input type="hidden" id="service_id" name="service_id" value="{{$service->id}}">

                                    <button type="submit" id="print" class="btn btn-primary"> Submit</button>

                                {{--</form>--}}


                            {{--</div>--}}

                        {{--</div>--}}


                        {{--<div class="col-sm-8">--}}
                            {{--<div class="container-fluid p-3 my-3 bg-dark text-white">--}}
                                {{--<h5 style="font-weight: bolder">Location</h5>--}}
                                {{--<small>Tap image to enlarge</small>--}}

                                {{--@if($service->location->gif!=NULL)--}}
                                    {{--<a target="_blank" href="{{asset('public/storage/images/'.$service->location->gif)}}"><img width="700px" src="{{asset('public/storage/images/'.$service->location->gif)}}"></a>--}}
                                {{--@else--}}
                                    {{--NO IMAGE UPLOADED.--}}
                                {{--@endif--}}



                            {{--</div>--}}

                        {{--</div>--}}
                    </div>

                </div>


            </div>
        </div>
    </div>
@endsection

@section('customScripts')

    <script src="{{ asset('public/js/jquery.js') }}"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>

    <script>
        $(document).ready(function () {

            $("#print").click(function(){
                if($('#name').val()!="" && $('#contact_no').val()!="" && $('#barangay_id').val()!="") {
                    $.ajaxSetup(
                        {

                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                        });

                    $.ajax({
                        url: '{{route('client.storeclient')}}',
                        type: 'POST',
                        data: {
                            name: $('#name').val(),
                            contact_no: $('#contact_no').val(),
                            barangay_id: $('#barangay_id').val(),
                            service_id: $('#service_id').val()
                        },
                        success: function (result) {

                            var client_id = result['client_id'];

                            var url = '{{url('/client/print/')}}' + '/' + (client_id) + '/' + '{{$service->id}}';
                            var printWindow = window.open(url, '_blank');
                            printWindow.onload = function () {
                                var isIE = /(MSIE|Trident\/|Edge\/)/i.test(navigator.userAgent);
                                if (isIE) {

                                    printWindow.print();
                                    printWindow.close();
//                                setTimeout(function () { printWindow.close(); }, 100);

                                } else {

                                    setTimeout(function () {
                                        printWindow.print();
                                        var ival = setInterval(function () {
                                            printWindow.close();
                                            clearInterval(ival);
                                            window.location.replace('{{route('client.index')}}');
                                            {{--location.reload('{{route('client.index')}}');--}}
                                        }, 200);
                                    }, 500);
                                }
                            }


                        }
                    });
//                location.reload();

                }
                else{
                    alert('Please fill up Blank field');
                }
            });



        });



    </script>


    @endsection
