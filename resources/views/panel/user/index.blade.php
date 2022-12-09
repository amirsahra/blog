@extends('layouts.panel')

@section('title')
    {{__('messages.panel.post_page.title')}}
@endsection

@section('content')
    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">{{__('values.posts')}}</h5>
        <div class="row">
            <div class="col-sm">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>{{__('values.full_name')}}</th>
                                <th>{{__('values.username')}}</th>
                                <th>{{__('values.gender')}}</th>
                                <th>{{__('values.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->full_name}}</td>
                                    <td>{{$user->username}}</td>
                                    <td>{{$user->gender}}</td>

                                    <td>
                                        <a href="{{route('panel.users.show',$user->id)}}" class="mr-25"  data-toggle="tooltip" data-original-title="Show"> <i class="fa fa-eye"></i></a>
                                        <a href="{{route('panel.users.edit',$user->id)}}" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="icon-pencil"></i> </a>
                                        <a href="{{route('panel.users.access',$user->id)}}" class="mr-25" data-toggle="tooltip" data-original-title="assign role permission"> <i class="fa fa-user"></i> </a>

                                        <a href="#" data-toggle="tooltip" data-original-title="Close"> <i
                                                class="icon-trash txt-danger"></i> </a>
                                    </td>
                                </tr>

                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm" style="margin-top: 25px">
                {{ $users->links() }}
        </div>
    </section>
@endsection
