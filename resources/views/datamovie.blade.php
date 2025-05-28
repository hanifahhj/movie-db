@extends('layouts.template')

@section('title', 'Data Movie')

@section('content')
    <div class="container mt-4">
        <h1 class="mb-4">Data Movie</h1>

        {{-- Tombol Tambah Data --}}
        <a href="{{ route('movies.create') }}" class="btn btn-primary mb-3">+ Tambah Movie</a>

        {{-- Tabel Movie --}}
        <div class="card shadow">
            <div class="card-body">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="table-success">
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Year</th>
                            <th>Actors</th>
                            <th>Cover</th> {{-- Kolom baru untuk gambar --}}
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($movies as $index => $movie)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $movie->title }}</td>
                                <td>{{ $movie->category->category_name ?? '-' }}</td>
                                <td>{{ $movie->year }}</td>
                                <td>{{ $movie->actors }}</td>
                                <td>
                                    @if($movie->cover_image)
                                        <img src="{{ asset($movie->cover_image) }}" alt="Cover" style="width: 80px; height: auto; border-radius: 4px;">
                                    @else
                                        <span>-</span>
                                    @endif
                                </td>
                                <td>
                                     <a href="{{ url('/movie/' . $movie->id . '/' . $movie->slug) }}" class="btn btn-info btn-sm mb-1">Detail</a>
                                    {{-- Tombol Edit --}}
                                    <a href="{{ route('movies.edit', $movie->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>

                                    {{-- Tombol Hapus --}}
                                    <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Yakin ingin menghapus data ini?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Data movie belum tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
