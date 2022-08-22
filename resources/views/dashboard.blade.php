@extends('layout.head')	
@section('content')
@if(Auth::user())
<nav class="navbar bg-light">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" href="#">
				<div class="menu-app">
					<i class="uil uil-plus"></i>
				</div>
			</a>
			<span>POST</span>
		</li>
	</ul>
</nav>
@else
<nav class="navbar bg-light d-none">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" href="#">
				<div class="menu-app">
					<i class="uil uil-plus"></i>
				</div>
			</a>
			<span>POST</span>
		</li>
	</ul>
</nav>
@endif
<main class="main">

	<div class="post-sampul">

		<img src="{{ Storage::url('images/' .$data->file_sampul)}}" alt="" class="img-fluid">

		<div class="sampul-overlay">
			<h4 class="title-page d-none">My Profile</h4>
			<div class="navbar-users">
				<div class="menu-toggle">
					<div class="hamburger">
						<span></span>
					</div>
				</div>
				@if(Auth::user())
				<div class="users">
					<a class="text-white" style="font-size: 22px;" class="d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#karyawan">
						<i class="uil uil-qrcode-scan" data-toggle="tooltip" data-placement="right" title="Scan qrcode!"></i>
					</a>
				</div>
				@else
				<div class="users" style="padding-bottom: 33px;">
					<a class="text-white d-none" style="font-size: 22px;" class="d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#karyawan">
						<i class="uil uil-qrcode-scan" data-toggle="tooltip" data-placement="right" title="Scan qrcode!"></i>
					</a>
				</div>
				@endif
				<!-- <div class="notifications bg-icon"></div> -->
				@if(Auth::user())
				<div class="users dropdown-navbar">
					<i class="uil uil-ellipsis-v"></i>
					<div class="dropdown-isi">
						
						<a href="/pegawai/ubah/{{$data->id}}" class="d-flex align-items-center mobile-edit" style="color: #3F4658;"><i class="uil uil-users-alt"></i>&nbsp;Edit Profile</a>
						
						<a href="{{route('actionlogout')}}" class="d-flex align-items-center" style="color: #3F4658;"><i class="uil uil-sign-out-alt"></i>&nbsp;Logout</a>
					</div>
				</div>
				@else
				<div class="users dropdown-navbar d-none">
					<i class="uil uil-ellipsis-v"></i>
					<div class="dropdown-isi">
						
						<a href="/pegawai/ubah/{{$data->id}}" class="d-flex align-items-center" style="color: #3F4658;"><i class="uil uil-users-alt"></i>&nbsp;Edit Profile</a>
						
						<a href="{{route('actionlogout')}}" class="d-flex align-items-center" style="color: #3F4658;"><i class="uil uil-sign-out-alt"></i>&nbsp;Logout</a>
					</div>
				</div>
				@endif
			</div>
			<div class="container-fluid">
				<div class="row">
					<div class="col-xl-12 col-md-12">
						<div class="card border-0 bg-transparent">
							<div class="card-body">
								<div class="box-profile">
									<div class="box-detail">
										<div class="box-img">
											
											<img src="{{ Storage::url('images/' .$data->file_profile)}}" alt="" class="img-fluid">
											<!-- <div class="d-flex justify-content-center align-items-center"> -->
												<!-- <a class="btn btn-img-profile d-flex justify-content-center align-items-center"><i class="uil uil-camera" data-toggle="modal" data-target="#karyawan"></i></a> -->
												<!-- </div> -->
											</div>
											<div class="box-users">
										<!-- @foreach($data as $p)
										<div class="post-foto-web">	
											<h5 class="name-users">{{$data->nama}}</h5>
											<a class="btn btn-profile d-none" href="/pegawai/ubah/{{$data->id}}">Edit Profile</a>
										</div>
										<p class="nik-users text-center">{{$data->nik}}</p> 
										<div class="box-bio">
											<p>{{$data->bio}}</p>
										</div>
										@endforeach -->
										
										<div class="post-foto-web">	
											<h5 class="name-users text-center">{{$data->nama}}</h5>
											<!-- <a class="btn" class="d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#karyawan">
												<i class="uil uil-file-search-alt" data-toggle="tooltip" data-placement="right" title="Lihat Detail Karyawan"></i>
											</a> -->

											<!-- <a class="btn btn-profile d-none" href="{{asset('img/profile.jpg')}}">Edit Profile</a> -->
										</div>
										<!-- <p class="nik-users text-center">{{$data->nik}}</p>  -->
										<div class="box-jabatan">
											<p>{{$data->jabatan}}</p>
										</div>
										<div class="box-bio">
											<p>{{$data->bio}}

											</p>
										</div>
										
									</div>
								</div>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="action-profile">
			@if(Auth::user())
			<a href="/pegawai/ubah/{{$data->id}}" class="btn btn-profile bg-light"><i class="uil uil-edit"></i>&nbsp;Edit Profile</a>
			@else
			<a href="/pegawai/ubah/{{$data->id}}" class="d-none btn btn-profile bg-light"><i class="uil uil-edit"></i>&nbsp;Edit Profile</a>
			@endif
			<a class="btn btn-sampul"><i class="uil uil-camera"></i>&nbsp;Edit Foto Sampul</a>
		</div> -->
		@if(Auth::user())
		<a href="/pegawai/ubah/{{$data->id}}" class="btn btn-profile bg-light action-profile"><i class="uil uil-edit"></i>&nbsp;Edit Profile</a>
		@else
		<a href="/pegawai/ubah/{{$data->id}}" class="d-none btn btn-profile bg-light action-profile"><i class="uil uil-edit"></i>&nbsp;Edit Profile</a>
		@endif
	</div>
</div>
</div>
<div class="container-fluid main-box">
	<div class="row row-responsive">
		<div class="col-xl-12 col-md-12 col-responsive">
			<div class="card">
				<div class="card-body main-page">
					<div class="head-post">
						<div class="detail-post d-none">
							<h5 class="m-0">My Photos</h5>
							<span class="dots"></span>
							<span class="count-post">12 photos</span>
						</div>
						<button class="btn btn-post" data-toggle="modal" data-target="#exampleModal"><i class="uil uil-plus-circle" data-toggle="tooltip"  data-placement="left" title="Upload Foto!"></i> Upload Foto</button>
						<!-- <a class="btn" data-toggle="modal" data-target="#exampleModal">
							<i class="uil uil-plus-circle" data-toggle="tooltip"  data-placement="left" title="Buat Post!"></i>
						</a> -->	
						<!-- <div class="category-post">
							<div class="image-post">
								<i class="uil uil-image-v"></i>
							</div>
							<div class="video-post">
								<i class="uil uil-clapper-board"></i>
							</div>
						</div> -->
						@if(Auth::user())
						<ul class="nav nav-pills" role="tablist">
							<li class="nav-item">
								<a class="nav-link active" data-toggle="pill" href="#home">
									<i class="uil uil-image-v"></i>
								</a>
							</li>
							<li class="nav-item space-nav">
								<a class="nav-link" data-toggle="pill" href="#menu1">
									<i class="uil uil-clapper-board"></i>
								</a>
							</li>
							<li class="nav-item" data-toggle="modal" data-target="#exampleModal" style="cursor: pointer;">
								<a class="nav-link" data-toggle="pill">
									<i class="uil uil-plus-circle" data-toggle="tooltip"  data-placement="right" title="Upload Foto!"></i>
								</a>
							</li>
							@else
							<ul class="nav nav-none nav-pills" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" data-toggle="pill" href="#home">
										<i class="uil uil-image-v"></i>
									</a>
								</li>
								<li class="nav-item space-nav">
									<a class="nav-link" data-toggle="pill" href="#menu1">
										<i class="uil uil-clapper-board"></i>
									</a>
								</li>
								<li class="nav-item d-none" data-toggle="modal" data-target="#exampleModal" style="cursor: pointer;">
									<a class="nav-link" data-toggle="pill">
										<i class="uil uil-plus-circle" data-toggle="tooltip"  data-placement="right" title="Upload Foto!"></i>
									</a>
								</li>
								@endif
							</ul>
						</div>
						<div class="tab-content">
							<div id="home" class="tab-pane active">
								<div class="body-post flex-wrap" >
									@foreach($imageData as $data)
									<div class="post-foto">
										<a href="/post/view/{{$data->created_by}}#{{$data->id}}" >
											<img src="{{ Storage::url('images/' .$data->data_file)}}" alt="" class="img-fluid">
										</a>
									</div>
									<!-- id="navbarExample" -->
									@endforeach
									<!-- data-target="#{{$data->id}}" -->
						<!-- <div class="post-foto">
							<a href="/post">
								<img src="{{asset('img/profile.jpg')}}" alt="" class="img-fluid">
							</a>
						</div> -->
					</div>
				</div>
				<div id="menu1" class="tab-pane fade">
					<div class="body-post flex-wrap">
						
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>

</div>
</main>

<div class="modal modal-qr fade" id="karyawan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title text-center w-100" id="exampleModalLabel">SCAN</h5>
				<!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button> -->
			</div>
			<div class="modal-body">
				<div class="row align-items-center flex-column">					
					<!-- {!! QrCode::size(250)->generate(Request::url()); !!} -->
					<img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(290)->generate(Request::url())) !!} ">
					<a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(290)->generate(Request::url())) !!}" download="qrcode" class="btn btn-primary mt-2">Download</a>
				</div>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div> -->
		</div>
	</div>
</div>

<div class="modal modal-upload modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<form method="POST" action="/save" enctype="multipart/form-data">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Buat Postingan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					@csrf
					<div class="form-group">
						<label for="">Upload Foto</label>
						<div class="input-group mb-3">
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="filename" id="inputGroupFile02"/>
								<label class="custom-file-label" for="inputGroupFile02">Pilih Gambar</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="">
							Deskripsi
						</label>
						<!-- <input type="text" class="form-control" name="caption" placeholder="Tulis Deskripsi..."> -->
						<textarea class="form-control" name="caption" placeholder="Tulis Deskripsi"></textarea>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-primary">
						{{ __('Post') }}
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
<script>

	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();
		console.log($var);
	});
	$('#inputGroupFile02').on('change',function(){
                //get the file name
                var fileName = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(fileName);
            })
	const menu_toggle = document.querySelector('.menu-toggle');
	const sidebar = document.querySelector('.sidebar');

	menu_toggle.addEventListener('click', () => {
		menu_toggle.classList.toggle('is-active');
		sidebar.classList.toggle('is-active');
	});

</script>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="{{asset('assets/bootstrap.bundle.min.js')}}"></script>
@endsection
