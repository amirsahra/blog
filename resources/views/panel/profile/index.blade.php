@extends('layouts.panel')

@section('title')
    {{__('messages.panel.profile_page.title')}}
@endsection

@section('content')
    <div class="col-lg-12">
        <div class="card card-profile-feed">
            <div class="card-header card-header-action">
                <div class="media align-items-center">
                    <div class="media-img-wrap d-flex mr-10">
                        <div class="avatar avatar-sm">
                            <img src="{{asset($user->avatar)}}" alt="user" class="avatar-img rounded-circle">
                        </div>
                    </div>
                    <div class="media-body">
                        <div class="text-capitalize font-weight-500 text-dark">{{$user->full_name}}</div>
                    </div>
                </div>
                <div class="d-flex align-items-center card-action-wrap">
                    <div class="inline-block dropdown">
                        <a class="dropdown-toggle no-caret" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="ion ion-ios-settings"></i></a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="#">Edit your info</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-4 border-right pr-0">
                    <div class="pa-15">
                        <span class="d-block display-6 text-dark mb-5">{{count($user->posts)}}</span>
                        <span class="d-block text-capitalize font-14">{{__('values.posts')}}</span>
                    </div>
                </div>
                <div class="col-4 border-right px-0">
                    <div class="pa-15">
                        <span class="d-block display-6 text-dark mb-5">{{count($user->comments)}}</span>
                        <span class="d-block text-capitalize font-14">{{__('values.comments')}}</span>
                    </div>
                </div>
                <div class="col-4 pl-0">
                    <div class="pa-15">
                        <span class="d-block display-6 text-dark mb-5">433</span>
                        <span class="d-block text-capitalize font-14">views</span>
                    </div>
                </div>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><span><i class="ion ion-md-calendar font-18 text-light-20 mr-10"></i><span>Went to:</span></span><span class="ml-5 text-dark">{{$user->city->name}}, {{$user->province->name}}</span></li>
                <li class="list-group-item"><span><i class="ion ion-md-briefcase font-18 text-light-20 mr-10"></i><span>Nationality code:</span></span><span class="ml-5 text-dark">{{$user->nationality_code}}</span></li>
                <li class="list-group-item"><span><i class="ion ion-md-briefcase font-18 text-light-20 mr-10"></i><span>Username:</span></span><span class="ml-5 text-dark">{{$user->username}}</span></li>
                <li class="list-group-item"><span><i class="ion ion-md-briefcase font-18 text-light-20 mr-10"></i><span>Phone:</span></span><span class="ml-5 text-dark">{{$user->phone}}</span></li>
                <li class="list-group-item"><span><i class="ion ion-md-briefcase font-18 text-light-20 mr-10"></i><span>Birthday:</span></span><span class="ml-5 text-dark">{{$user->birthday}}</span></li>
                <li class="list-group-item"><span><i class="ion ion-md-briefcase font-18 text-light-20 mr-10"></i><span>Gender:</span></span><span class="ml-5 text-dark">{{$user->gender}}</span></li>
                <li class="list-group-item"><span><i class="ion ion-md-briefcase font-18 text-light-20 mr-10"></i><span>Military:</span></span><span class="ml-5 text-dark">{{$user->military}}</span></li>
                <li class="list-group-item"><span><i class="ion ion-md-briefcase font-18 text-light-20 mr-10"></i><span>Email:</span></span><span class="ml-5 text-dark">{{$user->email}}</span></li>

            </ul>
        </div>
    </div>
@endsection
