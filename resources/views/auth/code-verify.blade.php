@extends('layouts.auth')

@section('title')
    {{__('values.authentication_code')}}
@endsection

@section('content')
    <div class="hk-pg-wrapper hk-auth-wrapper">
        <header class="d-flex justify-content-end align-items-center">
            <div class="btn-group btn-group-sm">
                <a href="#" class="btn btn-outline-secondary">Help</a>
                <a href="#" class="btn btn-outline-secondary">About Us</a>
            </div>
        </header>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12 pa-0">
                    <div class="auth-form-wrap pt-xl-0 pt-70">
                        <div class="auth-form w-xl-30 w-sm-50 w-100">
                            <a class="auth-brand text-center d-block mb-20" href="#">
                                <img class="brand-img" src="{{asset('panel/dist/img/logo-light.png')}}" alt="brand" />
                            </a>
                            <form>
                                <h1 class="display-5 mb-10 text-center">Authentication code</h1>
                                <p class="mb-30 text-center">You must enter the 5 -digit code sent to your email in the box below</p>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Authentication code" type="number">
                                </div>
                                <button class="btn btn-primary btn-block mb-20" type="submit">Check</button>
                                <p class="text-right"><a href="#">Back to login</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
