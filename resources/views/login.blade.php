<!DOCTYPE html>
<html>
<head>
	<base href="../">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">
	<title>
		Aplikasi Latihan2
	</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!-- PWA  -->
	<meta name="theme-color" content="#6777ef"/>
	<link rel="apple-touch-icon" href="{{ asset('logo.PNG') }}">
	<link rel="manifest" href="{{ asset('/manifest.json') }}">
	<link href="{{asset('assets/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@0,400;0,500;1,500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
	<link href="{{asset('assets/css.css')}}" rel="stylesheet" type="text/css">
	<script src="{{asset('assets/jquery-3.6.0.min.js')}}"></script>
	<script src="{{asset('assets/bootstrap.bundle.min.js')}}"></script>
</head>
<body onload="document.body.style.opacity='1'">
	<section class="body-login">
		<div class="display-image-login">
			<h3 class="text-white mb-0 mt-2">Selamat Datang di Aplikasi Profile Karyawan</h3>
			<img src="{{asset('img/login-page.png')}}" alt="" class="img-fluid">
		</div>
		<div class="display-box-login">
			<div class="box-logo-login">
				<div class="logo-login">
					<img src="{{asset('img/logo-br.png')}}" class="logo" alt="">
					<img src="{{asset('img/logo-br-hp.png')}}" class="logo-hp" alt="">
				</div>
			</div>
			<div class="box">
				<h2>Login</h2>
				@if(session('error'))
				<div class="alert alert-danger">
					<b>Opps!</b> {{session('error')}}
				</div>
				@endif
				<form action="/login" method="post">
					@csrf
					<div class="inputbox">
						<input type="text" name="email" id="email" required="">
						<label for="email">Username</label>
					</div>
					<div class="inputbox">
						<input type="password" name="password" id="password" required="">
						<label for="password">Password</label>
					</div>
					<input type="submit" name="" value="LOGIN">
				</form>
			</div>
		</div>
	</section>
	
	<script src="{{ asset('/sw.js') }}"></script>
	<script>
		if (!navigator.serviceWorker.controller) {
			navigator.serviceWorker.register("/sw.js").then(function (reg) {
				console.log("Service worker has been registered for scope: " + reg.scope);
			});
		}
	</script>
</body>
</html>