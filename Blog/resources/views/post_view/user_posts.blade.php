@extends('layouts.main')

@section('title', 'User Posts')

@section('content')
    <div class="container">
        @foreach ($userPosts as $post)
            <div class="container mt-5">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">{{ $post->title }}</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">ID: {{ $post->id }}</h5>
                        <p class="card-text">BODY: {{ $post->body }}</p>
                        <p class="card-text">Enabled: {{ $post->enabled ? 'Yes' : 'No' }}</p>
                        <p class="card-text">Published At: {{ $post->published_at }}</p>
                    </div>
                    @if($post->user_id == Auth::id())
                    <div class="card-footer d-flex">
                        <form action="{{ route('posts.edit', $post->id) }}" method="GET">
                            <button class="btn btn-primary mr-2" type="submit">Edit</button>
                        </form>
                        <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="ml-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </div>
                    @endif
                </div>
            </div>
        @endforeach
        <div class="col-4 mt-3">
            {{ $userPosts->links('pagination::bootstrap-5') }}
        </div>
    </div>

@endsection
