@extends('admin.layouts.dashboard')

@section('content')

<h1>Create New Project</h1>

@if ($errors->any())
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/posts" enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" class="form-control" id="title" placeholder="Title..." value="{{ old('title') }}">
    </div>

    <select class="role form-control" name="role" id="role">
        <option value="">Select users...</option>
        @foreach ($users as $user)
        <option data-role-id="{{$user->id}}" value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Submit">
    </div>
</form>


@endsection
