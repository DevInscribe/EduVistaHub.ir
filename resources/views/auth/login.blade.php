@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <figure class="w-100 text-center mt-5"><img class="img-fluid rounded-circle" src="{{asset('images/logo.png')}}" alt=""></figure>
                <div class="card-header text-center bg-transparent border-0">{{ __('ورود') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3 justify-content-center">
                            <label hidden for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-10 position-relative">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="ايميل">
                                <i class="icon material-icons">mail</i>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <label hidden for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-10">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="گذرواژه">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-10 offset-md-4">
                                <div class="form-check text-center">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('مرا به خاطر بسپار') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-10 offset-md-4 d-flex flex-column mx-auto ">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('ورود') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link mt-2" href="{{ route('password.request') }}">
                                        {{ __('فراموشي رمز عبور؟') }}
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-10 position-relative">
                                <p class="mt-4 text-center">يا</p>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-10 offset-md-4 mx-auto">
                                <a href="{{route('auth.google')}}" type="submit" class="btn btn-danger w-100 ">
                                  با گوگل وارد شويد
                                </a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
