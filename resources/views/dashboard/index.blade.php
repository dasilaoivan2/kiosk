@extends('layouts.dashboard')

@section('title')
    @include('layouts.inc.title',['title'=>"Dashboard"])
@endsection

@section('customStyles')

    <style>
        .marquee {
            position: relative;
            overflow: hidden;
            --offset: 20vw;
            --move-initial: calc(-25% + var(--offset));
            --move-final: calc(-50% + var(--offset));
        }

        .marquee__inner {
            width: fit-content;
            display: flex;
            position: relative;
            transform: translate3d(var(--move-initial), 0, 0);
            animation: marquee 5s linear infinite;
            animation-play-state: running;
        }

        .marquee span {
            font-size: 10vw;
            padding: 0 2vw;
        }

        .marquee:hover .marquee__inner {
            animation-play-state: running;
        }

        @keyframes marquee {
            0% {
                transform: translate3d(var(--move-initial), 0, 0);
            }

            100% {
                transform: translate3d(var(--move-final), 0, 0);
            }
        }
    </style>

    @endsection

@section('content')
    <div class="container-fluid">

{{--        <div class="marquee">--}}
{{--            <div class="marquee__inner" aria-hidden="true">--}}
{{--                <span>NOW SERVING</span>--}}
{{--            </div>--}}
{{--        </div>--}}

        @foreach($offices as $office)
        <div class="row">
            <div class="col">
                {{$office->name}}
                <br/>
{{-- comment --}}
                @foreach($office->clientservices as $clientservice)

                    @if($clientservice->client->nowserving==0)
                        {{$clientservice->client->priority_no}} - {{$clientservice->client->name}}
                    @endif

                @endforeach

            </div>
        </div>

            @endforeach

    </div>
@endsection
