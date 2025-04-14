@extends('template.welcome')
@section('title', 'Sign In')

@section('content')
<div class="content" id="formMasuk">
    <div class="container">
        <div class="img">
            <img src="{{ asset ('template/images/logo.png')}}">
        </div>
        <div class="login-content">
            <form action="{{ route('loginPost') }}" method="POST">
            @csrf
                <h2 class="title">Sign In</h2>
                <div class="input-div one {{ old('email') ? 'focus' : '' }}">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="text" class="input form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" id="email" value="{{ old('email') }}" name="email" autocomplete="off">
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
                        <input type="password" class="input form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" id="password" value="{{ old('password') }}" name="password" autocomplete="off">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                </div>
                <!-- <a href="halaman/forgetpass.html">Forgot Password?</a> -->
                <input type="submit" class="btn" value="Submit">
                <div class="div-regis">
                    <p>Don't have an account? <a href="/signUp">Sign Up</a> now</p>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    var input = document.querySelector('#email, #password');
    // menambahkan event listener untuk event click
    input.addEventListener('click', function() {
    // menghapus class "focus" pada elemen input
    input.classList.remove('focus');
});
</script>
@endsection