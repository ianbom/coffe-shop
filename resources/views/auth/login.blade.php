<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Daily UI - Day 1 Sign In</title>

	<!-- Google Fonts -->
	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="{{ asset('css/animate.css') }}">
	<!-- Custom Stylesheet -->
	<link rel="stylesheet" href="{{ asset('css/style.css') }}">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
</head>

<body>
	<div class="container">
		<div class="top">
			<h1 id="title" class="hidden"><span id="logo">Coffee <span>BOM</span></span></h1>
		</div>
		<div class="login-box animated fadeInUp">
			<div class="box-header">
                <form method="POST" action="{{ route('login') }}">
                @csrf
				<h2>Log In</h2>
			</div>
			<label for="email">{{ __('Email Address') }}</label>
			<br/>
			<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

            <br/>
			 <label for="password">{{ __('Password') }}</label>
			<br/>
			<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
			@error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
            <br/>
            {{-- <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label class="form-check-label" for="remember">
                {{ __('Remember Me') }}
            </label> --}}
			<button type="submit">
               {{ __('Login') }}
            </button>
			<br/>
            <style>
                a.btn.btn-link:hover p.small {
        color: blue;
    }
            </style>
			@if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        <p class="small">{{ __('Forgot Your Password?') }}</p>
                                    </a>
                                    <a class="btn btn-link" href="/reg">
                                        <p class="small">Don't have account? click to Register</p>
                                @endif
        </form>
		</div>
	</div>
</body>

<script>
	$(document).ready(function () {
    	$('#logo').addClass('animated fadeInDown');
    	$("input:text:visible:first").focus();
	});
	$('#username').focus(function() {
		$('label[for="username"]').addClass('selected');
	});
	$('#username').blur(function() {
		$('label[for="username"]').removeClass('selected');
	});
	$('#password').focus(function() {
		$('label[for="password"]').addClass('selected');
	});
	$('#password').blur(function() {
		$('label[for="password"]').removeClass('selected');
	});
</script>

</html>
