@extends('layout.head')	
@section('content')
<main class="main">
	<div class="container-fluid main-box px-4 py-3">
		<div class="row align-items-center">
			<a href="/dashboard/{{$data->id}}">
				<i class="uil uil-arrow-left back-edit"></i>
			</a>
			<h4 class="title-page">Edit Profile</h4>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
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
										<label for="">Foto Profil</label>
										<div class="input-group mb-3">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="file_profile" id="inputGroupFile01" value="{{$ubah->file_profile}}" />
												<label class="custom-file-label" for="inputGroupFile02">Pilih Gambar</label>
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
										<label for="">Foto Sampul</label>
										<div class="input-group mb-3">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="file_sampul" id="inputGroupFile02" value="{{$ubah->file_sampul}}" />
												<label class="custom-file-label" for="inputGroupFile02">Pilih Gambar</label>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-xl-12">
									<div class="form-group">
										<label for="">Bio</label>
										<textarea name="bio" class="form-control" id="" cols="10" rows="5">{{$ubah->bio}}</textarea>
									</div>
								</div>
							</div>
							<div class="action-edit">
								<input type="submit" class="btn btn-edit" value="Update Data">
							</div>
						</form>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
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
        </script>
        @endsection