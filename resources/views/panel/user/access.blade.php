@extends('layouts.panel')

@section('title')
    {{__('messages.panel.profile_page.title')}}
@endsection

@section('content')
    @include('partials.panel.message')


    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Assign role for <code>{{$data['user']->full_name}}</code></h5><br>
        <div class="row">
            <div class="col-sm">
                <form method="post" action="{{route('panel.users.assign.role',$data['user']->id)}}">
                    @csrf
                    <h6 class="mb-20 mt-30">Roles</h6>
                    <hr class="hr-primary hr-3 mt-10">
                    <div class="form-row">
                        @foreach($data['roles'] as $role)
                        <div class="col-md-3 mt-15">
                            <div class="custom-control custom-checkbox checkbox-teal">
                                <input type="checkbox" class="custom-control-input" name="{{$role->name}}" id="r-{{$role->id}}"
                                       @if(!is_null($data['user']->hasRole($role->name)?? null))
                                         @if($data['user']->hasRole($role->name)) checked @endif
                                    @endif>
                                <label class="custom-control-label" for="r-{{$role->id}}" >{{$role->name}}</label>
                            </div>
                        </div>
                        @endforeach
                            <div class="col-md-3 mt-15">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="remove" id="remove">
                                    <label class="custom-control-label" for="remove">remove all role</label>
                                </div>
                            </div>
                    </div>
                    <br><br>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">Assign Role</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Assign permission for <code>{{$data['user']->full_name}}</code></h5><br>
        <div class="row">
            <div class="col-sm">
                <form method="post" action="{{route('panel.users.assign.permission',$data['user']->id)}}">
                    @csrf
                    <h6 class="mb-20 mt-30">Permission</h6>
                    <hr class="hr-primary hr-3 mt-10">
                    <div class="form-row">
                        @foreach($data['permissions'] as $permission)
                            <div class="col-md-3 mt-15">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="{{$permission->name}}" id="p-{{$permission->id}}"
                                           @if(!is_null($data['user']->hasPermissionTo($permission->name)?? null))
                                           @if($data['user']->hasPermissionTo($permission->name)) checked @endif
                                        @endif>
                                    <label class="custom-control-label" for="p-{{$permission->id}}">{{$permission->name}}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <br><br>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">Assign Permission</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
