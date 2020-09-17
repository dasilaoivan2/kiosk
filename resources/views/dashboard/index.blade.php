@extends('layouts.dashboard')

@section('title')
    @include('layouts.inc.title',['title'=>"Dashboard"])
@endsection

@section('customStyles')

    {{--<style>--}}
        {{--.marquee {--}}
            {{--position: relative;--}}
            {{--overflow: hidden;--}}
            {{----offset: 20vw;--}}
            {{----move-initial: calc(-25% + var(--offset));--}}
            {{----move-final: calc(-50% + var(--offset));--}}
        {{--}--}}

        {{--.marquee__inner {--}}
            {{--width: fit-content;--}}
            {{--display: flex;--}}
            {{--position: relative;--}}
            {{--transform: translate3d(var(--move-initial), 0, 0);--}}
            {{--animation: marquee 2s linear infinite;--}}
            {{--animation-play-state: running;--}}
        {{--}--}}

        {{--.marquee span {--}}
            {{--font-size: 10vw;--}}
            {{--padding: 0 2vw;--}}
        {{--}--}}

        {{--.marquee:hover .marquee__inner {--}}
            {{--animation-play-state: running;--}}
        {{--}--}}

        {{--@keyframes marquee {--}}
            {{--0% {--}}
                {{--transform: translate3d(var(--move-initial), 0, 0);--}}
            {{--}--}}

            {{--100% {--}}
                {{--transform: translate3d(var(--move-final), 0, 0);--}}
            {{--}--}}
        {{--}--}}
    {{--</style>--}}

    @endsection

@section('content')
    <div class="container-fluid">

        {{--<div class="marquee">--}}
            {{--<div class="marquee__inner" aria-hidden="true">--}}
                {{--<span>NOW</span>--}}
                {{--<span>SERVING</span>--}}

            {{--</div>--}}
        {{--</div>--}}
        <marquee width="100%" direction="left" scrollamount="12">
            <h1 style="font-size: 50pt; font-weight: bold; font-family: 'GROBOLD'; color: black">N O W  &nbsp  S E R V I N G!  &nbsp&nbsp   N O W &nbsp S E R V I N G!   &nbsp&nbsp  N O W &nbsp S E R V I N G! &nbsp&nbsp N O W &nbsp S E R V I N G!&nbsp&nbsp</h1>
        </marquee>

        <div class="row">
            <div class="col-md-6">
                <h2 style="color: black; font-weight: bold">OFFICE NAME</h2>
            </div>

            <div class="col-md-3 text-center">
                <h2 style="color: black; font-weight: bold">WINDOW</h2>
            </div>

            <div class="col-md-3 text-center">
                <h2 style="color: black; font-weight: bold">PRIORITY NO.</h2>
            </div>
        </div>

        @foreach($offices as $office)
        <div class="row">
            <div class="col-md-6">
                <h2 style="color: black; font-weight: bold">{{$office->name}}</h2>

            </div>
{{-- comment --}}
                @foreach($office->clientservices as $clientservice)

                    @if($clientservice->client->status == 1)

                    <div class="col-md-3 text-center">
                        <h2 style="color: black; font-weight: bold">{{$office->window}}</h2>

                    </div>

                    <div class="col-md-3 text-center">
                        <h2 style="color: black; font-weight: bold">{{$clientservice->client->priority_no}}</h2>
                    </div>



                    @endif

                @endforeach


        </div>

            @endforeach

    </div>
@endsection
