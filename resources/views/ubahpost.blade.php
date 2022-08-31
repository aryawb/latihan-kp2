@extends('layout.head')	
@section('content')
<main class="main">
	<div class="container-fluid main-box px-4 py-2">
		<div class="row align-items-center">
			<a href="/post/view/{{$data->id}}">
				<i class="uil uil-arrow-left back-edit"></i>
			</a>
			<h4 class="title-page">Edit Postingan</h4>
		</div>
		<div class="row">
			<div class="col-xl-12">
				<div class="card">
					<div class="card-body">
						@foreach($postubah as $ubah)
						<form method="post" action="{{route('updatepost', $ubah->id)}}" enctype="multipart/form-data">
							@csrf
							<input type="hidden" name="id" value="{{$ubah->id}}">
							<div class="row">
								<div class="col-xl-12">
									<div class="form-group">
										<label for="">Upload Foto</label>
										<div class="input-group mb-3">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name="data_file" id="inputGroupFile02" value="{{$ubah->data_file}}"/>
												<label class="custom-file-label" for="inputGroupFile02">Pilih Gambar</label>
											</div>
										</div>
									</div>
								</div>
								<div class="col-xl-12">
									<div class="form-group">
										<label for="" class="box-limit-edit">Deskripsi <span id="detaillimit">Teks terlalu panjang!</span>
											<span id='showdetail'>Tambahkan setidaknya 80 karakter</span></label>
											<textarea name="caption" class="form-control" id="my-text" cols="10" rows="5" placeholder="Tambahkan setidaknya 80 karakter">{{$ubah->caption}}</textarea>
											<div class="d-flex align-items-center justify-content-between mt-3">	
												<input type="submit" class="btn btn-edit" id="btnedit" value="Update Data">
												<p id="result"></p>
											</div>
										</div>
										
									</div>
								</div>
							</form>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</main>
		<script src="{{asset('assets/jquery-3.6.0.min.js')}}"></script>
		<script>
			$('#inputGroupFile02').on('change',function(){
                //get the file name
                var file_sampul = $(this).val();
                //replace the "Choose a file" label
                $(this).next('.custom-file-label').html(file_sampul);
            })
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
</script>
@endsection