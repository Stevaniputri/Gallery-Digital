@extends('layout')
@section('content')
    <!-- ... -->
    <div class="container-fluid">
        <div class="row page-titles">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">
                    <a href="#">
                        {{ isset($selectedAlbum) ? 'Album: ' . $selectedAlbum->name_album : 'All Photos' }}
                    </a>
                </li>
            </ol>
        </div>

        <div class="row">
            @forelse($galeris as $foto)
            <div class="col-xl-3 col-lg-6 col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <div class="new-arrival-product">
                            <div class="new-arrivals-img-contnent">
                                <img class="img-fluid" src="{{ asset('images/'.$foto->foto_location) }}" alt="">
                            </div>
                            <div class="new-arrival-content mt-3">
                                <h4><a href="{{ route('detail', ['galeri_id' => $foto->id]) }}">{{ $foto->judul_foto }}</a></h4>
                                <!-- Tombol Like dan Hitungan -->
                                <div>
                                    <button class="btn btn-link like-icon {{ $foto->isLikedByUser(auth()->user()) ? 'liked' : '' }}" data-galeri-id="{{ $foto->id }}" onclick="toggleLike(this)">
                                        <i class="fa fa-heart"></i>
                                    </button>
                                    <span class="ms-3 like-count">{{ $foto->likes()->count() }} Likes</span>
                                </div>
                                <p class="date">{{ $foto->created_at->format("j F Y") }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12 text-center">
                <p class="no-photo-text"><i class="fa fa-info-circle me-2"></i>Tidak ada foto dalam album ini.</p>
            </div>
            @endforelse
        </div>
    </div>
    <!-- ... -->

    <style>
        .no-photo-text {
            font-size: 15px;
            color: #777;
            margin-top: 17%;
        }
    </style>
@endsection
