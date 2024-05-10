@extends('layout')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <ol class="breadcrumb jus justify-content-between">
            <li class="breadcrumb-item active"><a href="#">Album</a></li>
            <li class=""><a href="/album/trash">Trash</a></li>
        </ol>
    </div>
    
    <div class="row">
        @foreach ($albums as $album)
        <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6">
            <div class="folder-container text-center">
                <a href="{{ route('photos.album', ['album_id' => $album->id]) }}">
                    <i class="fa fa-folder folder-icon"></i>
                </a>
                <div class="d-flex justify-content-between align-items-baseline ">
                    <p class="folder-name">{{$album->name_album}}</p>
                    <li class="nav-item dropdown notification_dropdown header-profile">
                        <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" height="12" width="3" viewBox="0 0 128 512">
                                <path d="M64 360a56 56 0 1 0 0 112 56 56 0 1 0 0-112zm0-160a56 56 0 1 0 0 112 56 56 0 1 0 0-112zM120 96A56 56 0 1 0 8 96a56 56 0 1 0 112 0z"/>
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end">
                            <button type="button" class="btn dropdown-item" onclick="confirmDeleteAlbum('{{ $album->id }}', '{{ $album->name_album }}')">Hapus</button>
                        </div>
                    </li>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

<script>
    function confirmDeleteAlbum(albumId, albumName) {
        if (confirm(`Apakah Anda yakin ingin menghapus album '${albumName}'?`)) {
            window.location.href = "/album/delete/" + albumId;
        }
    }

</script>  
@endsection
