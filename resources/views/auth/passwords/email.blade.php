@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
            <figure class="w-100 text-center mt-5"><img class="img-fluid rounded-circle" src="{{asset('images/logo.png')}}" alt=""></figure>

                <div class="card-header text-center bg-transparent border-0 fw-bold">{{ __('درخواست رمز عبور جديد') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        
                        
                        <div class="row mb-3 justify-content-center">

                            <div class="row justify-content-center">
                                <div class="col-md-10 position-relative">
                                    <p id="fp-text" class="mt-4 text-center">يک ايميل حاوي لينک انتخاب رمز عبور جديد برايتان ارسال خواهد شد.</p>
                                </div>
                            </div>

                            <label hidden for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-10 position-relative">
                                <input id="email fp-input" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="ايميل خود را وارد کنيد...">
                                <i class="icon material-icons">mail</i>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0 justify-content-center">
                            <div class="col-md-10 offset-md-4 mx-auto">
                                <button type="submit" class="btn btn-primary w-100 ">
                                    {{ __('ارسال درخواست') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
