@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-10 margin-tb">
            <div class="pull-left">
                <h2> Show Post</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('posts.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10 m-2">
            <div class="form-group">
                <strong>Name:</strong>
                {{ $post->title }}
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 m-2">
            <div class="form-group">
                <strong>Details:</strong>
                {{ $post->body }}
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 m-2">
            <div class="form-group">
                <strong>Image:</strong>
                <img src="/featured_image/{{ $post->featured_image }}" width="500px">
            </div>
        </div>
    </div>
@endsection
