@extends('layout.head')	
@section('content')
<!-- data-spy="scroll" data-target="#navbarExample" data-offset="50" -->
<main class="main" >
	<div class="container-fluid">
		<div class="row justify-content-center align-items-center">
			<div class="box-post">
				<header>
					
					<a href="/dashboard/{{$data->id}}">
						<i class="uil uil-arrow-left"></i>
					</a>

					<h4>Photos</h4>
				</header>
				<div class="card">
					<div class="card-body">
						@foreach($imageData as $datapost)
						<?php 
						$temp = explode(' ',$datapost->created_at);

						?>
						<div class="post-body" id="{{$datapost->id}}">
							<div class="detail-post">
								<div class="user-post">
									<!-- <img src="{{ Storage::url('images/' .$datapost->file_profile)}}" alt="" class="img-fluid"> -->
									@if($datapost->file_profile)
									<img src="{{ Storage::url('images/' .$datapost->file_profile)}}" alt="" class="img-fluid">
									@else
									<img src="{{asset('img/default-profile.jpg')}}" alt="" class="img-fluid">
									@endif
									<span class="font-weight-bold">{{$datapost->nama}}</span>
								</div>
								<div class="dots-post">
									<div class="dropdown">
										<a type="button" class="dropdown-toggle" data-toggle="dropdown">
											<i class="uil uil-ellipsis-v"></i>
										</a>
										<div class="dropdown-menu">
											<a href="/post/ubah/{{$datapost->id}}" class="d-flex align-items-center mobile-edit" style="color: #3F4658;"><i class="uil uil-edit text-success"></i>&nbsp;Edit</a>
											<div class="dropdown-divider my-1"></div>
											<form action="{{route('delete', $datapost->id)}}" method="post">
												@csrf
												@method('DELETE')
												<button type="submit" class="d-flex align-items-center bg-transparent border-0" style="color: #3F4658;"><i class="uil uil-trash-alt text-danger"></i></i>&nbsp;Hapus</button>
											</form>
										</div>
									</div>
								</div>
							</div>
							<div class="v-img-post">
								<img src="{{ Storage::url('images/' .$datapost->data_file)}}" alt="" class="img-fluid">
							</div>
							<div class="date-post">
								<p>Work At&nbsp;<span class="label-post">BURNINGROOM TECHNOLOGY</span></p>
								<span class="date-detail">{{ $temp[0] }}&nbsp;|&nbsp;{{ $temp[1] }}</span>
							</div>
							<p>
								<span class="font-weight-bold">{{$datapost->nama}}</span>
								<!-- {{$datapost->caption}} -->
								<!-- {!!nl2br(str_replace(" ", " &nbsp;", $datapost->caption))!!} -->
								{!! nl2br(e($datapost->caption)) !!}
							</p>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</main>
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/cferdinandi/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
<script>
	$(window).on('scroll', function(){
		if($(window).scrollTop()){
			$('header').addClass('black');
		}
		else 
		{
			$('header').removeClass('black');
		}
	});
</script>
@endsection