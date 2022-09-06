@extends('layout.head')	
@section('content')
<main class="main">
	<div class="container-fluid main-box px-4 py-2">
		<div class="row align-items-center">
			<a href="/dashboard/{{$data->id}}">
				<i class="uil uil-arrow-left back-edit"></i>
			</a>
			<h4 class="title-page">Edit Profile</h4>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card" id="bedo">
					<div class="card-body edit-page">
						@foreach($pegawaiubah as $ubah)
						<form method="post" action="{{route('updatepegawai')}}" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id" value="{{$ubah->id}}">
							<div class="row">
								<div class="col-xl-6">
									<div class="form-group">
										<label for="">Nama</label>
										<input type="text" class="form-control" name="nama" value="{{$ubah->nama}}">
									</div>
								</div>
								<div class="col-xl-6">
									<div class="form-group">
										<label for="">Jabatan</label>
										<input type="text" class="form-control" name="jabatan" value="{{$ubah->jabatan}}">
									</div>
								</div>
								<div class="col-xl-6">
									<!-- <div class="form-group">
										<label for="">Foto Profle</label>
										<input type="file" class="form-control" name="file_profile" value="{{$ubah->file_profile}}">
									</div> -->
									<div class="form-group">
										<div class="d-flex justify-content-between align-items-center w-100">	
											<label for="">Foto Profil</label>
											@csrf
											@if($ubah->file_profile)
											<a href="{{ route('deleteprofile',$data->id) }}" class="align-items-center border-0 btn btn-danger text-white mb-1" style="color: #3F4658;" id="deleteprofile" data-id="{{ $data->id }}">Hapus Foto</a>
											@else
											@endif
										</div>
										<div class="input-group mb-3">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="file_profile" id="inputGroupFile01" value="{{$ubah->file_profile}}" />
												
												<label class="custom-file-label" for="inputGroupFile02">Pilih Gambar</label>
												
											</div>
											<div class="input-group-append">
												<!-- <form action="{{route('deleteprofile', $data->id)}}" method="post"> -->
													<!-- @csrf

													@if($data->file_profile)
													<button type="submit" formaction="{{route('deleteprofile', $data->id)}}" formmethod="post" class="align-items-center btn btn-danger border-0" style="color: #3F4658;"><i class="uil uil-multiply text-white"></i></button>
													@else
													<button type="submit" formaction="{{route('deleteprofile', $data->id)}}" class="d-none align-items-center btn-danger border-0" style="color: #3F4658;"><i class="uil uil-multiply text-danger"></i></i></button>
													@endif -->
													<!-- </form> -->
												</div>
											</div>
										</div>
									</div>
									<div class="col-xl-6">
									<!-- <div class="form-group">
										<label for="">Foto Sampul</label>
										<input type="file" class="form-control" name="file_sampul" value="{{$ubah->file_sampul}}">
									</div> -->
									<div class="form-group">
										<div class="d-flex justify-content-between align-items-center w-100">	
											<label for="">Foto Sampul</label>
											@csrf
											@if($ubah->file_sampul)
											<a href="{{ route('deletesampul',$data->id) }}" class="align-items-center border-0 btn btn-danger text-white mb-1" style="color: #3F4658;" id="deletesampul" data-id="{{ $data->id }}">Hapus Foto</a>
											@else
											@endif
										</div>
										<div class="input-group mb-3">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="file_sampul" id="inputGroupFile02" value="{{$ubah->file_sampul}}" />
												
												<label class="custom-file-label" for="inputGroupFile02">Pilih Gambar</label>
												
											</div>
											<div class="input-group-append">
												<!-- <form action="{{route('deletesampul', $data->id)}}" method="post"> -->
													<!-- <a href="{{ route('deletesampul',$data->id) }}" class="align-items-center border-0 btn btn-danger" style="color: #3F4658;" id="deletesampul" data-id="{{ $data->id }}"><i class="uil uil-multiply text-white"></i></a> -->
													<!-- </form> -->
													<!-- <a href="{{ route('deletesampul',$data->id) }}" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" id="deletesampul" data-id="{{ $data->id }}">
														Delete
													</a> -->
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-xl-12">
										<div class="form-group">
											<label for="" class="box-limit-edit">Bio <span id="detaillimit">Teks terlalu panjang!</span>
												<span id='showdetail'>Tambahkan setidaknya 60 karakter</span></label>
												<textarea name="bio" class="form-control" id="my-text" cols="10" rows="5" placeholder="Tambahkan setidaknya 60 karakter">{{$ubah->bio}}</textarea>
												<div class="limit-bio">	

												</div>
											</div>
										</div>
									</div>
									<div class="action-edit">
										<input type="submit" class="btn btn-edit" id="btnedit" value="Update Data">
										<p id="result"></p>
									</div>
								</form>
								@endforeach
							</div>
						</div>
					</div>
				</div>
			</div>
		</main>
		<!-- <script src="{{asset('assets/jquery-3.6.1.min.js')}}"></script> -->
		<script>
			$('#inputGroupFile01').on('change',function(){
                //get the file name
                var file_profile = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(file_profile);
            })
			$('#inputGroupFile02').on('change',function(){
                //get the file name
                var file_sampul = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(file_sampul);
            })
			var myText = document.getElementById("my-text");
			var result = document.getElementById("result");
			var limit = 80;
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
			btnedit.setAttribute("disabled", "disabled");

		}else{
			btnedit.removeAttribute("disabled", "disabled");
			detaillimit.style.cssText = "display: none;";
			showdetail.style.cssText = "display: none;";
			myText.style.borderColor = "#b2b2b2";
			myText.style.cssText = "border-color: #ced4da; box-shadow: none";
			result.style.color = "#737373";
		}
	});
			$(document).ready(function () {
				$("body").on("click","#deletesampul",function(e){
					if(!confirm("Do you really want to do this?")) {
						return false;
					}
					e.preventDefault();
					var id = $(this).data("id");
    // var id = $(this).attr('data-id');
    var token = $("meta[name='csrf-token']").attr("content");
    var url = e.target;
    $.ajax(
    {
          url: url.href, //or you can use url: "company/"+id,
          type: 'POST',
          data: {
          	_token: token,
          	id: id
          },
          success: function (response){
          	window.location.href = "/dashboard/"+id;
          }
      });
    return false;
});	
			});

			$(document).ready(function () {
				$("body").on("click","#deleteprofile",function(e){
					if(!confirm("Do you really want to do this?")) {
						return false;
					}
					e.preventDefault();
					var id = $(this).data("id");
    // var id = $(this).attr('data-id');
    var token = $("meta[name='csrf-token']").attr("content");
    var url = e.target;
    $.ajax(
    {
          url: url.href, //or you can use url: "company/"+id,
          type: 'POST',
          data: {
          	_token: token,
          	id: id
          },
          success: function (response){
          	window.location.href = "/dashboard/"+id;
          	// location.replace('dashboard')
          }
      });
    return false;
});	
			});
		</script>

		@endsection