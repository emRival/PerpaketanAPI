@extends('layouts.app')

@section('title')
Login Paket IDN
@endsection

@section('content')
<div class="container">
    <div class="position-absolute top-50 start-50 translate-middle" style="margin-top: 40px!important;">
        <div class="card shadow p-3 mb-5 bg-white " style="margin-bottom: 70px !important; border-radius: 20px; ">
            <div class="shadow  mb-3 bg-white" style="background-color: #de2667 !important; border-radius: 15px;">


                <a href="/" class="logo">
                    <img class="container mt-2 mb-2" src="{{url('atlantis/assets/img/grup1.svg')}}" alt="navbar brand"
                        class="navbar-brand">
                </a>
            </div>

            <div class="container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group w-70">
                        <label for="email">{{ ('E-Mail') }}</label>
                        <div>
                            <input style="outline: none;border-radius: 20px;" id="email" placeholder="email"
                                type="email"
                                class="form-control w-100 @error('email') is-invalid @enderror shadow  mb-3 bg-white"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group w-70">
                        <label for="password" class="">{{ ('Password') }}</label>
                        <div>
                            <input style="outline:none; border-radius: 20px;" id="password" placeholder="Password"
                                type="password"
                                class="form-control @error('password') is-invalid @enderror shadow  mb-3 bg-white "
                                name="password" required autocomplete="current-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="text-center mt-4">
                            <button type="submit" style="border-radius: 10px; background-color: #de2667; color:white;"
                                class="btn ">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#de2667" fill-opacity="1"
        d="M0,288L288,160L576,320L864,64L1152,64L1440,0L1440,320L1152,320L864,320L576,320L288,320L0,320Z"></path>
</svg>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#de2667" fill-opacity="1"
        d="M0,288L288,160L576,320L864,64L1152,64L1440,0L1440,0L1152,0L864,0L576,0L288,0L0,0Z"></path>
</svg>

@endsection