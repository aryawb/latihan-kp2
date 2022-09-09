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
		@if($data->file_sampul)
		<img src="{{ Storage::url('images/' .$data->file_sampul)}}" alt="" class="img-fluid">
		@else
		<img src="{{asset('img/default-sampul.png')}}" alt="" class="img-fluid">
		<!-- <img src="{{ Storage::url('images/' .'default-sampul.png')}}" alt="" class="img-fluid"> -->
		@endif
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
						<i class="uil uil-qrcode-scan" ></i>
					</a>
				</div>
				@else
				<div class="users" style="padding-bottom: 33px;">
					<a class="text-white d-none" style="font-size: 22px;" class="d-flex justify-content-center align-items-center" data-toggle="modal" data-target="#karyawan">
						<i class="uil uil-qrcode-scan" ></i>
					</a>
				</div>
				@endif
				<!-- <div class="notifications bg-icon"></div> -->
				@if(Auth::user())
				<!-- <div class="users dropdown-navbar">
					<i class="uil uil-ellipsis-v"></i>
					<div class="dropdown-isi">
						
						<a href="/pegawai/ubah/{{$data->id}}" class="d-flex align-items-center mobile-edit" style="color: #3F4658;"><i class="uil uil-users-alt"></i>&nbsp;Edit Profile</a>
						
						<a href="{{route('actionlogout')}}" class="d-flex align-items-center" style="color: #3F4658;"><i class="uil uil-sign-out-alt"></i>&nbsp;Logout</a>
					</div>
				</div> -->
				<div class="dropdown">
					<a type="button" class="dropdown-toggle text-white" data-toggle="dropdown" style="font-size: 22px;">
						<i class="uil uil-ellipsis-v"></i>
					</a>
					<div class="dropdown-menu">
						<a href="/pegawai/ubah/{{$data->id}}" class="d-flex align-items-center mobile-edit" style="color: #3F4658;"><i class="uil uil-edit text-success"></i>&nbsp;Edit Profile</a>
						<div class="dropdown-divider my-1"></div>
						<a href="{{route('actionlogout')}}" class="d-flex align-items-center" style="color: #3F4658;"><i class="uil uil-sign-out-alt text-danger"></i>&nbsp;Logout</a>
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
											@if($data->file_profile)
											<img src="{{ Storage::url('images/' .$data->file_profile)}}" alt="" class="img-fluid">
											@else
											<img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid">
											@endif
											@if(Auth::user())
											<div class="dropdown d-none">
												<div class="d-flex justify-content-center align-items-center">
													<a type="button" class=" dropdown-toggle btn btn-img-profile d-flex justify-content-center align-items-center" data-toggle="dropdown"><i class="uil uil-camera"></i>
													</a>
													<div class="dropdown-menu">
														<a href="/pegawai/ubah/{{$data->id}}" class="d-flex align-items-center mobile-edit" style="color: #3F4658;"><i class="uil uil-edit text-success"></i>&nbsp;Edit foto profil</a>
														@if($data->file_profile)
														<div class="dropdown-divider d-block my-1"></div>
														@else
														<div class="dropdown-divider d-none my-1"></div>
														@endif
														<form action="{{route('deleteprofile', $data->id)}}" method="post">
															@csrf
															@method('DELETE')
															@if($data->file_profile)
															<button type="submit" class="d-flex align-items-center bg-transparent border-0" style="color: #3F4658;"><i class="uil uil-trash-alt text-danger"></i></i>&nbsp;Hapus foto profil</button>
															@else
															<button type="submit" class="d-none align-items-center bg-transparent border-0" style="color: #3F4658;"><i class="uil uil-trash-alt text-danger"></i></i>&nbsp;Hapus foto profil</button>
															@endif
														</form>
													</div>
												</div>
											</div>
											@else
											<div class="dropdown d-none">
												<div class="d-flex justify-content-center align-items-center">
													<a type="button" class=" dropdown-toggle btn btn-img-profile d-flex justify-content-center align-items-center" data-toggle="dropdown"><i class="uil uil-camera"></i>
													</a>
													<div class="dropdown-menu">
														<a href="/pegawai/ubah/{{$data->id}}" class="d-flex align-items-center mobile-edit" style="color: #3F4658;"><i class="uil uil-edit text-success"></i>&nbsp;Edit foto profil</a>
														@if($data->file_profile)
														<div class="dropdown-divider d-block my-1"></div>
														@else
														<div class="dropdown-divider d-none my-1"></div>
														@endif
														<form action="{{route('deleteprofile', $data->id)}}" method="post">
															@csrf
															@method('DELETE')
															@if($data->file_profile)
															<button type="submit" class="d-flex align-items-center bg-transparent border-0" style="color: #3F4658;"><i class="uil uil-trash-alt text-danger"></i></i>&nbsp;Hapus foto profil</button>
															@else
															<button type="submit" class="d-none align-items-center bg-transparent border-0" style="color: #3F4658;"><i class="uil uil-trash-alt text-danger"></i></i>&nbsp;Hapus foto profil</button>
															@endif
														</form>
													</div>
												</div>
											</div>
											@endif
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
		<div class="action-profile">
			<a href="/pegawai/ubah/{{$data->id}}" class="btn btn-profile bg-light"><i class="uil uil-edit text-success"></i>&nbsp;Edit Profile</a>
			@if($data->file_sampul)
			<div class="dropdown res-sampul d-none">
				<div class="d-flex justify-content-center align-items-center">
					<a type="button" class=" dropdown-toggle btn btn-sampul d-flex justify-content-center align-items-center" data-toggle="dropdown"><i class="uil uil-camera"></i>&nbsp;Edit foto sampul
					</a>
					<div class="dropdown-menu">
						<a href="/pegawai/ubah/{{$data->id}}" class="d-flex align-items-center mobile-edit m-0" style="color: #3F4658;"><i class="uil uil-edit text-success"></i>&nbsp;Edit foto sampul</a>
						<div class="dropdown-divider d-block my-1"></div>
						<form action="{{route('deletesampul', $data->id)}}" method="post">
							@csrf
							@method('DELETE')
							<button type="submit" class="d-flex align-items-center bg-transparent border-0" style="color: #3F4658;"><i class="uil uil-trash-alt text-danger"></i></i>&nbsp;Hapus foto sampul</button>
						</form>
					</div>
				</div>
			</div>
			<!-- mobile ada sampul -->
			<div class="dropdown res-sampul-mobile d-none">
				<div class="d-flex justify-content-center align-items-center">
					<a type="button" class=" dropdown-toggle btn btn-sampul bg-white d-flex justify-content-center align-items-center" data-toggle="dropdown" style="width: 34px; height: 34px; color: #1488CC; border-radius: 50%;"><i class="uil uil-camera"></i>
					</a>
					<div class="dropdown-menu">
						<a href="/pegawai/ubah/{{$data->id}}" class="d-flex align-items-center mobile-edit m-0" style="color: #3F4658;"><i class="uil uil-edit text-success"></i>&nbsp;Edit foto sampul</a>
						<div class="dropdown-divider my-1"></div>
						<form action="{{route('deletesampul', $data->id)}}" method="post">
							@csrf
							@method('DELETE')
							<button type="submit" class="align-items-center bg-transparent border-0" style="color: #3F4658;"><i class="uil uil-trash-alt text-danger"></i></i>&nbsp;Hapus foto sampul</button>
						</form>
					</div>
				</div>
			</div>
			@else
			<div class="dropdown res-sampul d-none">
				<div class="d-flex justify-content-center align-items-center">
					<a type="button" class=" dropdown-toggle btn btn-sampul d-flex justify-content-center align-items-center" data-toggle="dropdown"><i class="uil uil-camera"></i>&nbsp;Edit foto sampul
					</a>
					<div class="dropdown-menu">
						<a href="/pegawai/ubah/{{$data->id}}" class="d-flex align-items-center mobile-edit m-0" style="color: #3F4658;"><i class="uil uil-edit text-success"></i>&nbsp;Edit foto sampul</a>
						<div class="dropdown-divider d-block my-1"></div>
						<form action="{{route('deletesampul', $data->id)}}" method="post">
							@csrf
							@method('DELETE')
							<button type="submit" class="d-flex align-items-center bg-transparent border-0" style="color: #3F4658;"><i class="uil uil-trash-alt text-danger"></i></i>&nbsp;Hapus foto sampul</button>
						</form>
					</div>
				</div>
			</div>
			<!-- mobile ada sampul -->
			<div class="dropdown res-sampul-mobile d-none">
				<div class="d-flex justify-content-center align-items-center">
					<a type="button" class=" dropdown-toggle btn btn-sampul bg-white d-flex justify-content-center align-items-center" data-toggle="dropdown" style="width: 36px; height: 36px; color: #1488CC; border-radius: 50%;"><i class="uil uil-camera"></i>
					</a>
					<div class="dropdown-menu">
						<a href="/pegawai/ubah/{{$data->id}}" class="d-flex align-items-center mobile-edit m-0" style="color: #3F4658;"><i class="uil uil-edit text-success"></i>&nbsp;Edit foto sampul</a>
						<div class="dropdown-divider my-1"></div>
						<form action="{{route('deletesampul', $data->id)}}" method="post">
							@csrf
							@method('DELETE')
							<button type="submit" class="align-items-center bg-transparent border-0" style="color: #3F4658;"><i class="uil uil-trash-alt text-danger"></i></i>&nbsp;Hapus foto sampul</button>
						</form>
					</div>
				</div>
			</div>
			@endif
		</div>
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
						<button class="btn btn-post" data-toggle="modal" data-target="#exampleModal"><i class="uil uil-plus-circle"></i> Upload Foto</button>
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
									<i class="uil uil-plus-circle" ></i>
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
										<i class="uil uil-plus-circle" "></i>
									</a>
								</li>
								@endif
							</ul>
						</div>
						<div class="tab-content">
							<div id="home" class="tab-pane active">
								<div class="body-post flex-wrap" >
									@foreach($imageData as $dataimage)
									<div class="post-foto">
										<a href="/post/view/{{$dataimage->created_by}}#{{$dataimage->id}}" id="buynwa">
											<img src="{{ Storage::url('images/' .$dataimage->data_file)}}" loading="lazy" alt="" class="img-fluid">
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
					<a href="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(290)->generate(Request::url())) !!}" download="qrcode" class="btn btn-primary mt-3">Download</a>
				</div>
			</div>
			<!-- <div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div> -->
		</div>
	</div>
</div>

<div class="modal modal-upload fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
								<input type="file" class="custom-file-input" name="filename" id="inputGroupFile02" />
								<label class="custom-file-label" for="inputGroupFile02">Pilih Gambar</label>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label for="" class="box-limit-edit">Deskripsi <span id="detaillimit">Teks terlalu panjang!</span>
							<span id='showdetail'>Tambahkan setidaknya 80 karakter</span></label>
							<textarea name="caption" class="form-control" id="my-text" cols="10" rows="5" placeholder="Tambahkan setidaknya 60 karakter"></textarea>
							<div class="d-flex justify-content-end mt-3">	
								<p id="result"></p>
							</div>
						</div>
					</div>
					<!-- </div> -->
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
						<button type="submit" class="btn btn-primary" id="btnpost">
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
			// console.log($var);
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
		var myText = document.getElementById("my-text");
		var result = document.getElementById("result");
		var limit = 800;
		result.textContent = 0 + "/" + limit;

		myText.addEventListener("input",function(){
			var textLength = myText.value.length;
			result.textContent = textLength + "/" + limit;

			if(textLength > limit){
				// myText.setAttribute("maxlength", "60");
				myText.style.cssText = "border-color: #ff2851; box-shadow: 0 0 0 0.06rem #ff2851;";
			// myText.style.boxShadow = "0 0 0 .2rem #ff2851";
			result.style.color = "#ff2851";
			detaillimit.style.cssText = "display: block; color: #ff2851";
			showdetail.style.cssText = "display: none;";
			btnpost.setAttribute("disabled", "disabled");
		}
		else
		{
			btnpost.removeAttribute("disabled", "disabled");
			detaillimit.style.cssText = "display: none;";
			showdetail.style.cssText = "display: none;";
			myText.style.borderColor = "#b2b2b2";
			myText.style.cssText = "border-color: #ced4da; box-shadow: none";
			result.style.color = "#737373";
		}
	});
		jQuery(document).ready(function($) {
			$("#buynwa").on("touchstart", function(event) {
				window.location.href = $(event.target).attr('href');
			});
		});
	</script>

	<script src="{{asset('assets/jquery.slim.min.js')}}"></script>
	<script src="{{asset('assets/bootstrap.bundle.min.js')}}"></script>

	@endsection
