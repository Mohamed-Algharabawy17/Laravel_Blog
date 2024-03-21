
@extends('layouts.main')

@section('title')
    <title>Index Page</title>
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Posts</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Enablement</th>
                    <th>Publish Date</th>
                    <th>User</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{ $post->id }}</td>
                    <td><a href="{{ route('posts.show', $post) }}">{{ $post->title }}</a></td>
                    <td>{{ $post->enabled ? 'Yes' : 'No'}}</td>
                    <td>{{ $post->published_at }}</td>
                    <td>{{ $post->user->name }}</td>

                    <td>
                        @if($post->user_id == Auth::id())
                        <div class="d-flex">
                            <form action="{{ route('posts.edit', $post->id) }}" method="GET">
                                <button class="btn btn-outline-primary mr-2" type="submit">Edit</button>
                            </form>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-danger" type="submit">Delete</button>
                            </form>
                        </div>
                        @else
                            <h4 class="text-danger">Not Authorized</h4>
                        @endif
                    </td>
                </tr>
                @endforeach
                {{ $posts->links('pagination::bootstrap-5') }}
            </tbody>
        </table>
    </div>
@endsection
