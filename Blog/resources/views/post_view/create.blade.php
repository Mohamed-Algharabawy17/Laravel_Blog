
@extends('layouts.main')

@section('title')
    <title>Create Item</title>
@endsection

@section('content')

<div class="container">
    <h1 class="my-4">Create Post</h1>
    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}">
            @error('title')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Body</label>
            <textarea id="description" name="body" class="form-control" rows="5">{{ old('description') }}</textarea>
            @error('body')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="enabled" class="form-label">Enablement</label>
            <select id="enabled" name="enabled" class="form-select">
                <option value="1" {{ old('enabled') === '1' ? 'selected' : '' }}>Enabled</option>
                <option value="0" {{ old('enabled') === '0' ? 'selected' : '' }}>Disabled</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="published_at" class="form-label">Publish Date</label>
            <input type="date" id="published_at" name="published_at" class="form-control" value="{{ old('published_at') }}">
            @error('published_at')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Create</button>
    </form>
</div>


@endsection

