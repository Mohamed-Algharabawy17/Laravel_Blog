@extends('layouts.main')

@section('title')
<title>Trash</title>
@endsection

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Trashed Posts</h1>
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Enabled</th>
                    <th scope="col">Publish Date</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                    @if($post->user_id == Auth::id())
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->enabled ? 'Yes' : 'No' }}</td>
                            <td>{{ $post->published_at }}</td>
                            <td>
                                <div class="d-flex">
                                    <form action="{{ route('posts.restore', $post->id) }}" method="GET">
                                        <button class="btn btn-outline-primary mr-2" type="submit">Restore</button>
                                    </form>
                                    <form action="{{ route('posts.force_delete', $post->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-outline-danger" type="submit">Force Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        @if(count($posts) == 0)
            <h1 class="text-center text-danger">No trashed posts found.</h1>
        @endif
    </div>
@endsection
