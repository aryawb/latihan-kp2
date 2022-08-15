<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>
		Aplikasi Latihan2
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- 	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous"> -->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link href="{{asset('assets/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('assets/css.css')}}" rel="stylesheet" type="text/css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="{{asset('assets/bootstrap.bundle.min')}}"></script>
</head>
<body data-spy="scroll" onload="document.body.style.opacity='1'">
	<aside class="sidebar">
		<div class="sidebar-header px-auto">
			<i class="uil uil-dashboard text-white"></i>
		</div>
		<div class="sidebar-body">
			<ul class="navbar-nav">
				
				<li class="nav-item">
					<a href="/dashboard/{{$data->id}}" class="nav-link">
						<div class="sidebar-icon">
							<i class="uil uil-user"></i>
						</div>
					</a>
					<span class="tooltip">Profile</span>
				</li>
			</ul>
		</div>
	</aside>
	
	<!-- As a link -->

	@yield('content')
	
	<!-- <script type="application/javascript">
		$('input[type="file"]').change(function(e){
			var fileName = e.target.files[0].name;
			$('.custom-file-label').html(fileName);
		});
	</script> -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="{{asset('assets/bootstrap.bundle.min')}}"></script>
</body>
</html>