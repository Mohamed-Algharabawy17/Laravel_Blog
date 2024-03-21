@extends('layouts.main')

@section('title')
<title>Show Page</title>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="card-title text-white">{{ $post->title }}</h5>
            </div>
            <div class="card-body">
                <p class="card-text">BODY: {{ $post->body }}</p>
                <p class="card-text">Enabled: {{ $post->enabled ? 'Yes' : 'No' }}</p>
                <p class="card-text">Published At: {{ $post->published_at }}</p>
            </div>
            @if($post->user_id == Auth::id())
            <div class="card-footer d-flex">
                <form action="{{ route('posts.edit', $post->id) }}" method="GET">
                    <button class="btn btn-outline-primary mr-2" type="submit">Edit</button>
                </form>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="ml-2">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-outline-danger" type="submit">Delete</button>
                </form>
            </div>
            @endif
        </div>
    </div>
@endsection
