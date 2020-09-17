@extends('layouts.client')

@section('title')
    @include('layouts.inc.title',['title'=>"Client- Offices"])
@endsection

@section('content')
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
