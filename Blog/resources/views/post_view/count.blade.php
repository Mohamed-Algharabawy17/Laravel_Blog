@extends('layouts.main')

@section('title', 'Users posts count')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Posts Count</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Count</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $userCounts[$user->id] }}</td>
                    <td><a href="{{ route('user.posts', $user) }}" class="btn btn-outline-dark">Show</a></td>
                </tr>
                @endforeach
                {{ $users->links('pagination::bootstrap-5') }}
            </tbody>
        </table>
    </div>
@endsection
