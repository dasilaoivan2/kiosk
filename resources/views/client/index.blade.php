@extends('layouts.client')

@section('title')
    @include('layouts.inc.title',['title'=>"Client"])
@endsection

@section('content')
    {{--<div class="container-xl">--}}
        {{--{{ date("l, F d, Y")}}--}}
        {{--<div class="row justify-content-center">--}}
            {{--<div class="text-center">--}}
                {{--<h4 style="font-weight: bolder">NGC GROUND FLOOR</h4>--}}

                {{--<h5><a class="btn btn-primary btn-sm" href="{{route('client.second')}}"><i class="fas fa-arrow-circle-up"></i> 2nd Floor</a></h5>--}}

                {{--<p>Tap office to view Services</p>--}}
            {{--</div>--}}


            {{--<img src="{{asset('public/storage/NGC-GroundFloor.jpg')}}" alt="GroundFloor" usemap="#ground" width="auto"--}}
                 {{--height="auto" border="solid">--}}

            {{--<map name="ground">--}}

                {{--<area shape="rect" coords="372,23,231,145" alt="MPDO"--}}
                      {{--href="{{route('client.showbyoffice',['id'=> 4])}}">--}}
                {{--<area shape="rect" coords="750,23,1068,145" alt="MASSO" href="{{route('client.showbyoffice',['id'=> 3])}}">--}}
                {{--<area shape="rect" coords="1088,202,1169,334" alt="LAPD" href="{{route('client.showbyoffice',['id'=> 2])}}">--}}
                {{--<area shape="rect" coords="348,435,550,532" alt="MACCO" href="#">--}}
                {{--<area shape="rect" coords="750,335,949,431" alt="MBO" href="#">--}}
                {{--<area shape="rect" coords="750,435,949,532" alt="LCR" href="{{route('client.showbyoffice',['id'=> 6])}}">--}}
                {{--<area shape="poly" coords="1069,335,1250,335,1250,631,1170,631,1069,531" alt="MTO" href="{{route('client.showbyoffice',['id'=> 1])}}">--}}
                {{--<area shape="poly" coords="49,335,230,335,228,531,130,631,49,631" alt="MEO" href="{{route('client.showbyoffice',['id'=> 5])}}">--}}

            {{--</map>--}}


            {{--@foreach($services as $service)--}}
            {{--<a style="width: 430px; height: 90px; text-wrap: normal; border: solid 1px #b21f2d; font-weight: bolder" class="btn btn-info btn-lg" role="button" href="{{route('client.create',['id'=>$service->id])}}">{{$service->description}}</a>--}}
            {{--@endforeach--}}


        {{--</div>--}}
    {{--</div>--}}




    <div class="container-fluid">
        {{ date("l, F d, Y")}}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center">
                    <img style="width: 170px;" src="{{asset('public/storage/icons/office-icon.png')}}">
                    <p>Select Office to view Services</p>




                @foreach($offices as $office)
                    <a  href="{{route('client.showbyoffice',['id'=>$office->id])}}">
                        <img width="150px" src="{{asset('public/storage/icons/'.$office->icon)}}">
                    </a>
                @endforeach
                </div>

            </div>
        </div>
    </div>






@endsection
