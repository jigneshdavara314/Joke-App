@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1 style="text-align: center;">Jokes List</h1>
    <div style="display: flow-root;">
        <a href="{{ route('jokes.create') }}" class="btn btn-success mb-3" style="float: right">Add New Joke</a>
    </div>

    @if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead class="table-primary">
            <tr>
                <th>#</th> <!-- Serial Number Column Header -->
                <th>Type</th>
                <th>Setup</th>
                <th>Punchline</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($jokes as $index => $joke)
            <tr>
                <!-- Serial Number Column -->
                <td>{{ $jokes->firstItem() + $index }}</td>
                <td>{{ $joke->type }}</td>
                <td>{{ $joke->setup }}</td>
                <td>{{ $joke->punchline }}</td>
                <td style="width: 12%;">
                    <a href="{{ route('jokes.edit', $joke->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('jokes.destroy', $joke->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to remove the record?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination Links --}}
    <!-- {{ $jokes->links() }} -->
    <div class="d-flex justify-content-center mt-3">
        {{ $jokes->links('pagination::bootstrap-4') }}
    </div>

</div>
@endsection