@extends('layout.head')	
@section('content')
<!-- data-spy="scroll" data-target="#navbarExample" data-offset="50" -->
<main class="main" >
	<div class="container-fluid">
		<div class="row justify-content-center align-items-center">
			<div class="box-post">
				<div class="d-flex align-items-center">
					
					<a href="/dashboard/{{$user->id}}">
						<i class="uil uil-arrow-left"></i>
					</a>

					<h4>Photos</h4>
				</div>
				<div class="card">
					<div class="card-body">
						@foreach($imageData as $data)
						<?php 
						$temp = explode(' ',$data->created_at);

						?>
						<div class="post-body" id="{{$data->id}}">
							<div class="v-img-post">
								<img src="{{ Storage::url('images/' .$data->data_file)}}" alt="" class="img-fluid">
							</div>
							<div class="date-post">
								<p>Work At&nbsp;<span class="label-post">BURNINGROOM TECHNOLOGY</span></p>
								<span>{{ $temp[0] }}&nbsp;|&nbsp;{{ $temp[1] }}</span>
							</div>
							<p>
								<span class="font-weight-bold">{{$data->nama}}&nbsp;</span>
								{{$data->caption}}
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
@endsection