

@extends('admin.layouts.dashboard2')

@section('content')

<div class="container">

    <div class="row">
        <div class="header">
            <h2>{{$post->title}}</h2>
        </div>
    </div>

    <div class="row pull-right mt-3">
            <a href="{{ url()->previous() }}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Go Back...</a>
    </div>


</div>

@endsection
