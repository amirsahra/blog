@extends('layouts.auth')

@section('title')
    {{__('values.register')}}
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
                            <form action="{{url('register')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h1 class="display-4 mb-10 text-center">{{__('messages.register_page.title')}}</h1>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <input class="form-control" placeholder="{{__('values.first_name')}}"
                                               value="{{old('first_name')}}" name="first_name" type="text">
                                        @if($errors->has('first_name'))<span
                                            class="error">{{ $errors->first('first_name') }}</span>@endif
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input class="form-control" placeholder="{{__('values.last_name')}}"
                                               value="{{old('last_name')}}" name="last_name" type="text">
                                        @if($errors->has('last_name'))<span
                                            class="error">{{ $errors->first('last_name') }}</span>@endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <input class="form-control" placeholder="{{__('values.nationality_code')}}"
                                               value="{{old('nationality_code')}}" name="nationality_code" type="text">
                                        @if($errors->has('nationality_code'))<span
                                            class="error">{{ $errors->first('nationality_code') }}</span>@endif
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input class="form-control" placeholder="{{__('values.phone')}}"
                                               value="{{old('phone')}}" name="phone" type="text">
                                        @if($errors->has('phone'))<span
                                            class="error">{{ $errors->first('phone') }}</span>@endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <input class="form-control" placeholder="{{__('values.username')}}"
                                               value="{{old('username')}}" name="username" type="text">
                                        @if($errors->has('username'))<span
                                            class="error">{{ $errors->first('username') }}</span>@endif
                                    </div>
                                    <div class="col-md-6 form-group">
                                        <input class="form-control" type="text" name="birthday"
                                               value="{{old('birthday')}}">
                                        @if($errors->has('birthday'))<span
                                            class="error">{{ $errors->first('birthday') }}</span>@endif
                                    </div>
                                </div>

                                    <livewire:gender />
                                    <livewire:city-dropdown />


                                <div class="form-row">
                                    <div class="col-md-6 form-group">
                                        <input type="file" class="form-control-file" name="avatar">
                                    @if($errors->has('avatar'))<span
                                            class="error">{{ $errors->first('avatar') }}</span>@endif
                                    </div>

                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="{{__('values.email')}}" type="email"
                                           value="{{old('email')}}" name="email">
                                    @if($errors->has('email'))<span
                                        class="error">{{ $errors->first('email') }}</span>@endif
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="{{__('values.password')}}" type="password"
                                           value="{{old('password')}}" name="password">
                                    @if($errors->has('password'))<span
                                        class="error">{{ $errors->first('password') }}</span>@endif
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input class="form-control" placeholder="{{__('values.confirm_password')}}"
                                               type="password" value="{{old('confirm_password')}}"
                                               name="confirm_password">
                                        @if($errors->has('confirm_password'))<span
                                            class="error">{{ $errors->first('confirm_password') }}</span>@endif

                                    </div>
                                </div>

                                <div class="form-group mt-4 mb-4">
                                    <div class="captcha">
                                        <span>{!! captcha_img() !!}</span>
                                        <button type="button" class="btn btn-danger" class="reload" id="reload">
                                            &#x21bb;
                                        </button>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                                </div>

                                <button class="btn btn-primary btn-block"
                                        type="submit">{{__('values.register')}}</button>
                                <div class="option-sep">or</div>
                                <p class="text-center">{{__('messages.register_page.have_account')}}<a
                                        href="#">{{__('values.login')}}</a></p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script type="text/javascript">
        $('#reload').click(function () {
            $.ajax({
                type: 'GET',
                url: 'reload-captcha',
                success: function (data) {
                    $(".captcha span").html(data.captcha);
                }
            });
        });
    </script>
@endsection
