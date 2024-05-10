@extends('layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-xl-3 col-lg-6 col-md-6 col-xxl-5">
                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade show active" id="first">
                                    <img class="img-fluid" src="{{ asset('images/'.$galeri->foto_location) }}" alt="">
                                </div>
                            </div>
                        </div>
                        <!--Tab slider End-->
                        <div class="col-xl-9 col-lg-6 col-md-6 col-xxl-7 col-sm-12">
                            <div class="product-detail-content">
                                <!--Product details-->
                                <div class="new-arrival-content pr">
                                    <h2 class="font-weight: 600;">{{ $galeri->judul_foto }}</h2>
                                    <p>Date: <span class="item">{{ $galeri->created_at->format("j F, Y")}}</span> </p>
                                    <p>Album: <span class="item">Lee</span></p>
                                    <p>Description:&nbsp;&nbsp;</p>
                                    <p class="text-content">{{$galeri->desc}}</p>
                                    <!-- Comment section start -->
                                    <div class="comment-container mt-4">
                                        <h4>Comments ({{ $galeri->comments->count()}})</h4>
                                        @foreach($galeri->comments as $comment)
                                            <p><strong>{{ $comment->user->fullname }}</strong>: {{ $comment->comment }}</p>
                                        @endforeach
                                    </div>
                                    <!-- Comment section end -->

                                    <!-- Comment form start -->
                                    <form action="{{ route('comments.store') }}" method="post" class="mt-4">
                                        @csrf
                                        <input type="hidden" name="galeri_id" value="{{ $galeri->id }}">
                                        <div class="d-flex">
                                            <input type="text" name="comment" class="form-control" placeholder="Write a comment...">
                                            <button type="submit" class="btn btn-primary ms-2">Submit</button>
                                        </div>
                                    </form>
                                    <!-- Comment form end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>   
@endsection
