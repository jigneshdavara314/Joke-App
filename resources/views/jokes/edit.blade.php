@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Joke</h1>
    <form action="{{ route('jokes.update', $joke->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="type" class="form-label">Type <span class="text-danger">*</span></label>
            <input type="text" id="type" name="type" value="{{ old('type', $joke->type) }}" class="form-control @error('type') is-invalid @enderror" required>
            @error('type')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="setup" class="form-label">Setup <span class="text-danger">*</span></label>
            <input type="text" id="setup" name="setup" value="{{ old('setup', $joke->setup) }}" class="form-control @error('setup') is-invalid @enderror" required>
            @error('setup')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="punchline" class="form-label">Punchline</label>
            <input type="text" id="punchline" name="punchline" value="{{ old('punchline', $joke->punchline) }}" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Update Joke</button>
        <a href="{{ route('jokes.index') }}" class="btn btn-secondary">Back to list</a>
    </form>
</div>
@endsection