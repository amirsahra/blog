@extends('layouts.panel')

@section('title')
    {{__('messages.panel.profile_page.title')}}
@endsection

@section('content')
    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Edit <code>{{$user->full_name}}</code> pro file</h5><br>
        <div class="row">
            <div class="col-sm">

                @include('partials.panel.message')

                <div class="col-sm-6 col-md-3 mt-15">
                    <img src="{{asset($user->avatar)}}" class="img-fluid circle" alt="img">
                </div><br>

                <form method="post" action="{{route('panel.users.update',$user->id)}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{__('values.first_name')}}</span>
                                </div>
                                <input type="text" class="form-control" value="{{$user->first_name}}" name="first_name">
                            </div>
                            @if($errors->has('first_name'))<span
                                class="error">{{ $errors->first('first_name') }}</span>@endif
                        </div>
                        <div class="col-md-6 form-group">

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{__('values.last_name')}}</span>
                                </div>
                                <input type="text" class="form-control" value="{{$user->last_name}}"
                                       name="last_name">
                            </div>
                            @if($errors->has('last_name'))<span
                                class="error">{{ $errors->first('last_name') }}</span>@endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{__('values.nationality_code')}}</span>
                                </div>
                                <input type="text" class="form-control" value="{{$user->nationality_code}}"
                                       name="nationality_code">

                            </div>
                            @if($errors->has('nationality_code'))<span
                                class="error">{{ $errors->first('nationality_code') }}</span>@endif
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{__('values.username')}}</span>
                                </div>
                                <input type="text" class="form-control" value="{{$user->username}}" name="username">
                            </div>
                            @if($errors->has('username'))<span
                                class="error">{{ $errors->first('username') }}</span>@endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{__('values.phone')}}</span>
                                </div>
                                <input type="text" class="form-control" value="{{$user->phone}}" name="phone">
                            </div>
                            @if($errors->has('phone'))<span class="error">{{ $errors->first('phone') }}</span>@endif
                        </div>
                        <div class="col-md-6 form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{__('values.birthday')}}</span>
                                </div>
                                <input class="form-control" type="text" name="birthday" value="{{$user->birthday}}">
                            </div>
                            @if($errors->has('birthday'))<span
                                class="error">{{ $errors->first('birthday') }}</span>@endif
                        </div>
                    </div>
                    <livewire:gender/>
                    <livewire:city-dropdown/>

                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{__('values.email')}}</span>
                                </div>
                                <input type="text" class="form-control" value="{{$user->email}}" name="email">
                            </div>
                            @if($errors->has('email'))<span class="error">{{ $errors->first('email') }}</span>@endif

                        </div>
                        <div class="col-md-6 form-group">
                            <input type="file" class="form-control-file" name="avatar">
                            @if($errors->has('avatar'))<span class="error">{{ $errors->first('avatar') }}</span>@endif
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">{{__('values.password')}}</span>
                                </div>
                                <input type="text" class="form-control" value="{{old('password')}}" name="password">
                            </div>
                            @if($errors->has('password'))<span
                                class="error">{{ $errors->first('password') }}</span>@endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <div class="input-group">
                                <button type="submit"  class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
