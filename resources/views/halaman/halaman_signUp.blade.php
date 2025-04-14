@extends('template.welcome')
@section('title', 'Sign Up')

@section('content')
<div class="content" id="formMasuk">
    <div class="container">
        <div class="img">
            <img src="{{ asset ('template/images/logo.png')}}">
        </div>
        <div class="login-content">
            <form action="{{ route('registerPost') }}" method="POST">
            @csrf
            <form action="index.html">
                <h2 class="title">Sign Up</h2>
                <div class="input-div one {{ old('nama_user') ? 'focus' : '' }}">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Username</h5>
                        <input type="text" class="input form-control{{ $errors->has('nama_user') ? ' is-invalid' : '' }}" id="nama_user" value="{{ old('nama_user') }}" name="nama_user" autocomplete="off">
                        @if ($errors->has('nama_user'))
                            <span class="invalid-feedback">{{ $errors->first('nama_user') }}</span>
                        @endif
                    </div>
                </div>
                <div class="input-div one {{ old('email') ? 'focus' : '' }}">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="text" class="input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{ old('email') }}" name="email" autocomplete="off">
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                </div>
                <div class="input-div pass {{ old('password') ? 'focus' : '' }}">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="email" value="{{ old('password') }}" name="password" autocomplete="off">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <div class="input-div pass {{ old('confirpassword') ? 'focus' : '' }}">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Re-Password</h5>
                        <input type="password" class="input form-control{{ $errors->has('confirpassword') ? ' is-invalid' : '' }}" id="confirpassword" value="{{ old('confirpassword') }}" name="confirpassword" autocomplete="off">
                        @if ($errors->has('confirpassword'))
                            <span class="invalid-feedback">{{ $errors->first('confirpassword') }}</span>
                        @endif
                    </div>
                </div>
                <input type="submit" class="btn" value="Submit">
                <div class="div-regis">
                    <p>Already have an account? <a href="/signIn">Sign In</a> now</p>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var input = document.querySelector('#nama_user, #email, #password, #confirpassword');
    // menambahkan event listener untuk event click
    input.addEventListener('click', function() {
    // menghapus class "focus" pada elemen input
    input.classList.remove('focus');
});
</script>
@endsection