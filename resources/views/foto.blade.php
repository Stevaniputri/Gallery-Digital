@extends('layout')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active"><a href="#">Layout</a></li>
            <li class="breadcrumb-item"><a href="#">Blank</a></li>
        </ol>
    </div>
    
    <div class="row">
        @foreach($galeris as $foto)
        <div class="col-xl-3 col-lg-6 col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="new-arrival-product">
                        <a href="{{ route('detail', ['galeri_id' => $foto->id]) }}">
                            <div class="new-arrivals-img-contnent">
                                <img class="img-fluid" src="{{ asset('images/'.$foto->foto_location) }}" alt="">
                            </div> 
                        </a>
                        <div class="new-arrival-content mt-3">
                            <h4><a href="{{ route('detail', ['galeri_id' => $foto->id]) }}">{{ $foto->judul_foto }}</a></h4>
                            <!-- Tombol Like dan Hitungan -->
                            <div style="margin-left: -1rem;">
                                <button class="btn btn-link like-icon {{ $foto->isLikedByUser(auth()->user()) ? 'liked' : '' }}" data-galeri-id="{{ $foto->id }}" onclick="toggleLike(this)">
                                    <i class="fa fa-heart"></i>
                                </button>
                                <span class="like-count" style="margin-left: -0.675rem">{{ $foto->likes()->count() }} Likes</span>
                                <!-- Icon komentar dan jumlah komentar -->
                                <button class="btn btn-link" style="font-size: 15px;">
                                    <i class="fa fa-comment"></i>
                                </button>
                                <span class="comment-count" style="margin-left: -0.675rem">{{ $foto->comments()->count() }} Comments</span>
                            </div>
                            <p class="date">{{ $foto->created_at->format("j F Y") }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection