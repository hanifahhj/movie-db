@extends('layouts.template')

@section('title', 'Hasil Pencarian')

@section('content')
    <h2 class="mb-4">Hasil pencarian: "{{ $query }}"</h2>

    @if($movies->count() > 0)
        <div class="row">
            @foreach ($movies as $movie)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset($movie->cover_image) }}" class="card-img-top" alt="{{ $movie->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $movie->title }}</h5>
                            <p class="card-text">{{ Str::limit($movie->synopsis, 100) }}</p>
                            <a href="/movie/{{ $movie->id }}/{{ $movie->slug }}" class="btn btn-success">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- ✅ Ini akan muncul jika pakai paginate() -->
        <div class="d-flex justify-content-center mt-4">
            {{ $movies->links() }}
        </div>
    @else
        <p>Tidak ditemukan hasil pencarian untuk "{{ $query }}".</p>
    @endif
@endsection
