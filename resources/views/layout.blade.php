<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="keywords" content="">
	<meta name="author" content="">
	<meta name="robots" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:title" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:description" content="Fillow : Fillow Saas Admin  Bootstrap 5 Template">
	<meta property="og:image" content="https:/fillow.dexignlab.com/xhtml/social-image.png">
	<meta name="format-detection" content="telephone=no">
	
	<!-- PAGE TITLE HERE -->
	<title>GaleriS</title>
	
	<!-- FAVICONS ICON -->
	<link rel="shortcut icon" type="image/png" href="assets/images/favicon.png">
	<link href="assets/vendor/jquery-nice-select/css/nice-select.css" rel="stylesheet">
	<link href="assets/vendor/owl-carousel/owl.carousel.css" rel="stylesheet">
	<link rel="stylesheet" href="assets/vendor/nouislider/nouislider.min.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    
	<!-- Style css -->
	<link rel="stylesheet" href="{{ asset('assets/css/template.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/dropdown.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		function toggleLike(button) {
			var galeriId = $(button).data('galeri-id');

			// Kirim permintaan ke server menggunakan AJAX
			$.ajax({
				url: '/toggle-like/' + galeriId,
				type: 'POST',
				data: {
					_token: '{{ csrf_token() }}',
				},
				success: function(response) {
					// Ubah warna tombol like jika berhasil
					$(button).toggleClass('liked', response.liked);
					
					// Perbarui hitungan like
					$(button).next('.like-count').text(response.likeCount + ' Likes');
				},
				error: function(error) {
					console.error('Error:', error);
				}
			});
		}
	</script>
</head>
<body>

		<div class="nav-header">
            <a href="index.html" class="brand-logo">
				<svg class="logo-abbr" width="55" height="55" viewbox="0 0 55 55" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path fill-rule="evenodd" clip-rule="evenodd" d="M27.5 0C12.3122 0 0 12.3122 0 27.5C0 42.6878 12.3122 55 27.5 55C42.6878 55 55 42.6878 55 27.5C55 12.3122 42.6878 0 27.5 0ZM28.0092 46H19L19.0001 34.9784L19 27.5803V24.4779C19 14.3752 24.0922 10 35.3733 10V17.5571C29.8894 17.5571 28.0092 19.4663 28.0092 24.4779V27.5803H36V34.9784H28.0092V46Z" fill="url(#paint0_linear)"></path>
					<defs>
					</defs>
				</svg>
				<div class="brand-title">
					<h2 class="">Gallery's</h2>
				</div>
            </a>
            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Nav header end
        ***********************************-->	
		<!--**********************************
            Header start
        ***********************************-->
        <div class="header border-bottom">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
							<div class="dashboard_bar">
                                Dashboard
                            </div>
                        </div>
                        <ul class="navbar-nav header-right">
							<li class="nav-item d-flex align-items-center">
								<div class="input-group search-area">
									<input type="text" class="form-control" placeholder="Search here...">
									<span class="input-group-text"><a href="javascript:void(0)"><i class="flaticon-381-search-2"></i></a></span>
								</div>
							</li>								
							<li class="nav-item dropdown notification_dropdown header-profile">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown">
									<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M512 416c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V96C0 60.7 28.7 32 64 32H192c20.1 0 39.1 9.5 51.2 25.6l19.2 25.6c6 8.1 15.5 12.8 25.6 12.8H448c35.3 0 64 28.7 64 64V416zM232 376c0 13.3 10.7 24 24 24s24-10.7 24-24V312h64c13.3 0 24-10.7 24-24s-10.7-24-24-24H280V200c0-13.3-10.7-24-24-24s-24 10.7-24 24v64H168c-13.3 0-24 10.7-24 24s10.7 24 24 24h64v64z"/></svg>
                                </a>
								<div class="dropdown-menu dropdown-menu-end">
									<button type="button" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#createAlbum">
										<svg xmlns="http://www.w3.org/2000/svg" height="12" width="12" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#FFD43B" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
										<span class="ms-2">Create Album </span>
									</button>
									<button type="button" class="btn dropdown-item" data-bs-toggle="modal" data-bs-target="#createPhoto">
										<svg xmlns="http://www.w3.org/2000/svg" height="12" width="12" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#FFD43B" d="M410.3 231l11.3-11.3-33.9-33.9-62.1-62.1L291.7 89.8l-11.3 11.3-22.6 22.6L58.6 322.9c-10.4 10.4-18 23.3-22.2 37.4L1 480.7c-2.5 8.4-.2 17.5 6.1 23.7s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L387.7 253.7 410.3 231zM160 399.4l-9.1 22.7c-4 3.1-8.5 5.4-13.3 6.9L59.4 452l23-78.1c1.4-4.9 3.8-9.4 6.9-13.3l22.7-9.1v32c0 8.8 7.2 16 16 16h32zM362.7 18.7L348.3 33.2 325.7 55.8 314.3 67.1l33.9 33.9 62.1 62.1 33.9 33.9 11.3-11.3 22.6-22.6 14.5-14.5c25-25 25-65.5 0-90.5L453.3 18.7c-25-25-65.5-25-90.5 0zm-47.4 168l-144 144c-6.2 6.2-16.4 6.2-22.6 0s-6.2-16.4 0-22.6l144-144c6.2-6.2 16.4-6.2 22.6 0s6.2 16.4 0 22.6z"/></svg>
										<span class="ms-2">Create Photo </span>
									</button>
								</div>
                            </li>	
							
							<li class="nav-item dropdown  header-profile">
								<div class="action">
								<a>
									<div class="profile" onclick="menuToggle();">
										<img src="{{ asset('assets/images/user.png') }}" width="56" alt="">
									</div>
								</a>
								<div class="menu">
									<h3>
										{{ Auth::user()->fullname}}
										<div>
											User
										</div>
									</h3>
									<ul>
										<li>
											<span class="material-icons icons-size">person</span>
											<a href="#">My Profile</a>
										</li>
										<li>
											<span class="material-icons icons-size">mode</span>
											<a href="/album">Notification</a>
										</li>
										<li>
											<span class="material-icons icons-size">insert_comment</span>
											<a href="/foto">Likes</a>
										</li>
										<li>
											<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewbox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
											<a href="/logout">Logout</a>
										</li>
									</ul>
								</div>
							</div>
							</li>
                        </ul>
                    </div>
				</nav>
			</div>
		</div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="dlabnav">
            <div class="dlabnav-scroll">
				<ul class="metismenu" id="menu">
                    <li><a class="#" href="/dashboard" aria-expanded="false">
							<i class="fas fa-home"></i>
							<span class="nav-text">Dashboard</span>
						</a>
                    </li>
                    <li><a class="#" href="/album" aria-expanded="false">
							<i class="fas fa-folder"></i>
							<span class="nav-text">Album</span>
						</a>
                    </li>
                    <li><a class="#" href="/foto" aria-expanded="false">
							<i class="fas fa-clone"></i>
							<span class="nav-text">Foto</span>
						</a>
                    </li>
                </ul>
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		

        <div class="content-body">
			{{-- Modal --}}
			<div class="modal fade" id="createAlbum">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Create Album</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal">
							</button>
						</div>
						<div class="modal-body">
							<div class="basic-form">
								<form method="POST" action="{{route('create.album')}}">
									@csrf
									<div class="mb-3 row">
										<label class="col-sm-3 col-form-label">Nama Album</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" placeholder="Nama album" name="name_album">
										</div>
									</div>
									<div class="mb-3 row">
										<label class="col-sm-3 col-form-label">Deskripsi</label>
										<div class="col-sm-9">
											<input type="text" class="form-control" placeholder="Deskripsi Album" name="desc">
										</div>
									</div>
									<div class="mb-3 row">
										<div class="col-sm-10" style="margin-left: 76%; margin-top: 1rem;">
											<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Create</button>
										</div>
									</div>
								</form>
							</div>
						</div>

					</div>
				</div>
			</div>

			{{-- Modal --}}
			<div class="modal fade" id="createPhoto">
				<div class="modal-dialog modal-dialog-centered" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title">Create Photo</h5>
							<button type="button" class="btn-close" data-bs-dismiss="modal">
							</button>
						</div>
						<div class="modal-body">
							<div class="basic-form">
								<form method="POST" action="{{ route('create.foto') }}" enctype="multipart/form-data">
									@csrf
                                        <div class="row">
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Name Photo</label>
                                                <input type="text" class="form-control" placeholder="Tambahkan judul foto" name="judul_foto">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Description</label>
                                                <input type="text" class="form-control" placeholder="Tambahkan deskripsi foto" name="desc">
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label class="form-label">Album</label>
                                                <select id="inputState" class="default-select form-control wide" name="album_id">
                                                    @foreach($albums as $item)
													<option value="{{$item->id}}">{{$item->name_album}}</option>
													@endforeach
                                                </select>
                                            </div>
                                            <div class="mb-3 col-md-6">
                                                <label>Photo</label>
                                                <div class="input-group mb-3">
													<div class="form-file">
														<input type="file"  class="form-file-input form-control" name="foto_location">
														</div>
													<span class="input-group-text">Upload</span>
												</div>
                                            </div>
                                        </div>
                                        <div class="col-sm-10" style="margin-left: 79%; margin-top: 1rem;">
											<button type="button" class="btn btn-danger light" data-bs-dismiss="modal">Close</button>
											<button type="submit" class="btn btn-primary">Create</button>
										</div>
                                    </form>
                                </div>
						</div>

					</div>
				</div>
			</div>
			@yield('content')
        </div>
	</div>

    <!-- Required vendors -->
    <script src="assets/vendor/global/global.min.js"></script>
	<script src="assets/vendor/chart.js/Chart.bundle.min.js"></script>
	<script src="assets/vendor/jquery-nice-select/js/jquery.nice-select.min.js"></script>
	
	<!-- Apex Chart -->
	<script src="assets/vendor/apexchart/apexchart.js"></script>
	
	<script src="assets/vendor/chart.js/Chart.bundle.min.js"></script>
	
	<!-- Chart piety plugin files -->
    <script src="assets/vendor/peity/jquery.peity.min.js"></script>
	<!-- Dashboard 1 -->
	<script src="assets/js/dashboard/dashboard-1.js"></script>
	
	<script src="assets/vendor/owl-carousel/owl.carousel.js"></script>
	
    <script src="assets/js/custom.min.js"></script>
	<script src="assets/js/dlabnav-init.js"></script>
	<script src="assets/js/demo.js"></script>
    <script src="assets/js/styleSwitcher.js"></script>
	<script>
		function cardsCenter()
		{
			
			/*  testimonial one function by = owl.carousel.js */
			
	
			
			jQuery('.card-slider').owlCarousel({
				loop:true,
				margin:0,
				nav:true,
				//center:true,
				slideSpeed: 3000,
				paginationSpeed: 3000,
				dots: true,
				navText: ['<i class="fas fa-arrow-left"></i>', '<i class="fas fa-arrow-right"></i>'],
				responsive:{
					0:{
						items:1
					},
					576:{
						items:1
					},	
					800:{
						items:1
					},			
					991:{
						items:1
					},
					1200:{
						items:1
					},
					1600:{
						items:1
					}
				}
			})
		}
		
		jQuery(window).on('load',function(){
			setTimeout(function(){
				cardsCenter();
			}, 1000); 
		});
		
	</script>

<script>
	function menuToggle(){
		const toggleMenu = document.querySelector('.menu');
		toggleMenu.classList.toggle('active')
	}
</script>

</body>
</html>