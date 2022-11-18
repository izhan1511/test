@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-10 margin-tb m-2">
        <div class="pull-left">
            <h2>Add New Post</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10 m-2">
            <div class="form-group">
                <strong>Title:</strong>
                <input type="text" name="title" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 m-2">
            <div class="form-group">
                <strong>Body:</strong>
                <textarea class="form-control" style="height:150px" name="body" placeholder="Detail"></textarea>
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 m-2">
            <div class="form-group">
                <strong>Image:</strong>
                <input type="file" name="featured_image" class="form-control" placeholder="featured_image">
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
