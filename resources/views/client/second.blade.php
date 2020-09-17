@extends('layouts.client')

@section('title')
    @include('layouts.inc.title',['title'=>"Client"])
@endsection

@section('content')
    <div class="container-xl">
        {{ date("l, F d, Y")}}
        <div class="row justify-content-center">
            <div class="text-center">
                <h4 style="font-weight: bolder">NGC 2ND FLOOR</h4>

                <h5><a class="btn btn-primary btn-sm" href="{{route('client.index')}}"><i class="fas fa-arrow-circle-down"></i> Ground Floor</a></h5>

                <p>Tap office to view Services</p>
            </div>


            <img src="{{asset('public/storage/NGC-secondfloor.jpg')}}" alt="SecondFloor" usemap="#second" width="auto"
                 height="auto" border="solid">

            <map name="second">
                {{--{{route('client.showbyoffice',['id'=>1])}}--}}
                <area shape="rect" coords="1040,203,1140,330" alt="MO" href="#">
                <area shape="rect" coords="828,30,1043,147" alt="GSD" href="#">
                <area shape="poly" coords="47,430,223,430,223,525,140,570,47,570" alt="GSD" href="#">

            </map>


            {{--@foreach($services as $service)--}}
            {{--<a style="width: 430px; height: 90px; text-wrap: normal; border: solid 1px #b21f2d; font-weight: bolder" class="btn btn-info btn-lg" role="button" href="{{route('client.create',['id'=>$service->id])}}">{{$service->description}}</a>--}}
            {{--@endforeach--}}


        </div>
    </div>
@endsection
