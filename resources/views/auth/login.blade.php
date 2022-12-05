@extends('layouts.auth')

@section('title')
    {{__('values.login')}}
@endsection

@section('content')
    <div class="hk-pg-wrapper hk-auth-wrapper">

        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 pa-0">
                    <div class="auth-form-wrap pt-xl-0 pt-70">
                        <div class="auth-form w-xl-30 w-lg-55 w-sm-75 w-100">
                            <a class="auth-brand text-center d-block mb-20" href="{{route('home')}}">
                                <img class="brand-img" src="{{asset('panel/dist/img/logo-light.png')}}" alt="brand"/>
                            </a>
                            <form method="post" action="{{route('login')}}">
                                @csrf
                                <h1 class="display-4 text-center mb-10">{{__('messages.login_page.title')}}</h1>
                                <p class="text-center mb-30">{{__('messages.login_page.content')}}</p>
                                <div class="form-group">
                                    <input class="form-control" placeholder="{{__('values.email')}}" type="email" name="email">
                                    @if($errors->has('email'))
                                        <span class="error">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="{{__('password')}}" type="password" name="password">
                                    </div>
                                    @if($errors->has('password'))
                                        <span class="error">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                                <div class="custom-control custom-checkbox mb-25">
                                    <input class="custom-control-input" id="same-address" type="checkbox" checked>
                                    <label class="custom-control-label font-14" for="same-address">{{__('messages.login_page.keep_me')}}</label>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">{{__('values.login')}}</button>
                                <p class="text-center">{{__('messages.login_page.have_account')}}<a href="#">{{__('values.register')}}</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
