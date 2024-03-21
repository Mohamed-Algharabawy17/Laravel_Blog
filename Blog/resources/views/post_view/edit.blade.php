@extends('layouts.main')

@section('title')
    <title>Create Item</title>
@endsection

@section('content')

<div class="container">
    <h1 class="my-4">Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ $post->title }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Body</label>
            <textarea name="body" class="form-control" rows="5">{{ $post->body }}</textarea>
            @error('body')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="enabled" class="form-label">Enablement</label>
            <select id="enabled" name="enabled" class="form-select">
                <option value="1" {{ $post->enabled === '1' ? 'selected' : '' }}>Enabled</option>
                <option value="0" {{ $post->enabled === '0' ? 'selected' : '' }}>Disabled</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="published_at" class="form-label">Publish Date</label>
            <input type="date" id="published_at" name="published_at" class="form-control" value="{{ $post->published_at }}">
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

@endsection
