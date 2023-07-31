@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <figure class="w-100 text-center mt-5"><img class="img-fluid rounded-circle" src="{{asset('images/logo.png')}}" alt=""></figure>
                <div class="card-header text-center bg-transparent border-0">{{ __('ثبت نام') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3 justify-content-center">
                            <label hidden for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-10  position-relative">
                                <input id="name" type="text" class="bg-transparent p-2 form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="نام (فقط به فارسي)">
                                <i class="icon material-icons">person</i>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <label hidden for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-10  position-relative">
                                <input id="email" type="email" class="bg-transparent form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="ايميل">
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

                            <div class="col-md-10  position-relative">
                                <input id="password" type="password" class="bg-transparent  form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="گذرواژه">
                                <i class="icon material-icons pointer">visibility</i>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3 justify-content-center">
                            <label hidden for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-10  position-relative">
                                <input id="password-confirm" type="password" class="bg-transparent  form-control" name="password_confirmation" required autocomplete="new-password" placeholder="تاييد گذرواژه">
                            </div>
                        </div>


                        <div class="row mb-3 justify-content-center">
                            <div class="col-md-10 position-relative">
                                <p class="text-center"> با ثبت نام کليه <a href="#" tabindex="-1" class="outline-0 link link-primary text-decoration-none">شرايط و قوانين </a> {{ config('app.name', 'فروشگاه') }} را مي پذريم.</p>
                            </div>
                        </div>


                        <div class="row mb-0 ">
                            <div class="col-md-10 offset-md-4 mx-auto">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('ثبت نام') }}
                                </button>
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <div class="col-md-10 position-relative">
                                <p class="mt-4 text-center">يا</p>
                            </div>
                        </div>

                        <div class="row mb-0"> 
                            <div class="col-md-10 offset-md-4 mx-auto">
                                <a href="#" type="submit" class="btn btn-danger w-100 ">
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
