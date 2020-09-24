@extends('layouts.client')

@section('title')
    @include('layouts.inc.title',['title'=>"Client- Offices"])
@endsection

@section('content')
    <div class="container-xl">
        {{ date("l, F d, Y")}}
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="text-center">
                    <h4 style="font-weight: bolder">{{$office->name}}</h4>


                    <p></p>
                </div>

                @foreach($services as $service)
                    <a style="color: black; width: 547px; height: 90px; text-wrap: normal; border: solid 1px #b21f2d; font-weight: bolder" class="btn btn-success btn-lg" href="{{route('client.create',['id'=>$service->id])}}">{{$service->description}}

                         @if($service->desc_vernacular == NULL)

                    @else
                            <br> <small>({{$service->desc_vernacular}})</small>
                    @endif
                    </a>
                @endforeach


            </div>
        </div>
    </div>
@endsection
