@extends('layouts.auth')

@section('title')
    {{__('values.authentication_code')}}
@endsection

@section('content')
    <div class="hk-pg-wrapper hk-auth-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 pa-0">
                    <div class="auth-form-wrap pt-xl-0 pt-70">
                        <div class="auth-form w-xl-30 w-sm-50 w-100">
                            <a class="auth-brand text-center d-block mb-20" href="{{route('home')}}">
                                <img class="brand-img" src="{{asset('panel/dist/img/logo-light.png')}}" alt="brand" />
                            </a>

                            @include('partials.panel.message')

                            <form method="post" action="{{route('auth.code.resend')}}">
                                @csrf
                                <h1 class="display-5 mb-10 text-center">Email not sent !</h1>
                                <p class="mb-30 text-center">Enter your email to receive a new Authentication code</p>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" name="email" type="email">
                                    @if($errors->has('email'))<span class="error">{{ $errors->first('email') }}</span>@endif
                                </div>
                                <button class="btn btn-primary btn-block mb-20" type="submit">Resend</button>
                                <p class="text-right"><a href="{{route('auth.code.check.form')}}">Check Code</a></p>
                                <p class="text-right"><a href="{{route('home')}}">Back to Site</a></p>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
