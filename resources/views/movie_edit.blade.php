@extends('layouts.template')

@section('title', 'Edit Movie')

@section('content')
<div class="container mt-4">
    <h1>Edit Movie</h1>

    {{-- Tampilkan error jika ada --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="{{ old('title', $movie->title) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="synopsis">Synopsis</label>
            <textarea name="synopsis" id="synopsis" class="form-control" rows="4" required>{{ old('synopsis', $movie->synopsis) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-select" required>
                <option value="">-- Select Category --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ (old('category_id', $movie->category_id) == $category->id) ? 'selected' : '' }}>
                        {{ $category->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="year">Year</label>
            <input type="number" name="year" id="year" value="{{ old('year', $movie->year) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="actors">Actors</label>
            <input type="text" name="actors" id="actors" value="{{ old('actors', $movie->actors) }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="cover_image">Cover Image (leave blank if you don't want to change)</label>
            <input type="file" name="cover_image" id="cover_image" class="form-control">
            @if ($movie->cover_image)
                <img src="{{ asset($movie->cover_image) }}" alt="Cover" class="mt-2" width="150">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Movie</button>
        <a href="{{ route('datamovie') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
