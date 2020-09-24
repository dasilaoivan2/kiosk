
<div style="" class="row">
    <div style="border-bottom: solid 1px white; background-color: #456c8d" class="col-7 text-center">
        <h2 style="font-weight: bold; color: white">OFFICE NAME</h2>
    </div>

    <div style="border-bottom: solid 1px white; background-color: #6787a2" class="col text-center">
        <h2 style="font-weight: bold; color: white">WINDOW</h2>
    </div>

    <div style="border-bottom: solid 1px white; background-color: #456c8d" class="col text-center">
        <h2 style="font-weight: bold; color: white">PRIORITY NO.</h2>
    </div>
</div>

@php

    $now = date('Y-m-d');

@endphp


@foreach($offices as $office)

    <div class="row" id="officename{{$office->id}}">
        <div style="border-bottom: solid 1px grey" class="col-7 text-center">
            <h2 style="font-weight: bold; color: black">{{$office->code}}</h2>
        </div>
        <div style="border-bottom: solid 1px grey" class="col text-center">
            <h2 style="font-weight: bold; color: black">{{$office->window}}</h2>
        </div>
        <div style="border-bottom: solid 1px grey" class="col text-center">
            <h2 style="font-weight: bold; color: black" id="prioritynum{{$office->id}}">
                @foreach($office->clientservices as $clientservice)
                    @if($clientservice->nowserving == 1 && $clientservice->client->status == 0)
                        {{$clientservice->client->priority_no}}
                    @endif
                @endforeach
            </h2>
        </div>
    </div>
@endforeach