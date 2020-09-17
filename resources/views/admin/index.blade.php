@extends('layouts.admin')

@section('title')
    @include('layouts.inc.title',['title'=>"Service Finder - Admin"])
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Welcome Admin: {{Auth::user()->name}}</div>

                </div>
            </div>
        </div>
    </div>
@endsection
