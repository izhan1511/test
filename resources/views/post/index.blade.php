@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right" style="margin: 5px">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Create New Post</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Image</th>
            <th>Name</th>
            <th>Details</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($post as $singlePost)
        <tr>
            <td>{{ ++$i }}</td>
            <td><img src="/featured_image/{{ $singlePost->featured_image }}" width="100px"></td>
            <td>{{ $singlePost->title }}</td>
            <td>{{ $singlePost->body }}</td>
            <td>
                <form action="{{ route('posts.destroy',$singlePost->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('posts.show',$singlePost->id) }}">Show</a>

                    <a class="btn btn-primary" href="{{ route('posts.edit',$singlePost->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $post->links() !!}

@endsection
