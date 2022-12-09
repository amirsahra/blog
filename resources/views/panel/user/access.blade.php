@extends('layouts.panel')

@section('title')
    {{__('messages.panel.profile_page.title')}}
@endsection

@section('content')
    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Assign access level for <code>{{$data['user']->full_name}}</code></h5><br>
        <div class="row">
            <div class="col-sm">

                @include('partials.panel.message')

                <form method="post" action="{{route('panel.users.access.update',$data['user']->id)}}">
                    @csrf
                    <h6 class="mb-20 mt-30">Roles</h6>
                    <div class="form-row">
                        @foreach($data['roles'] as $role)
                        <div class="col-md-3 mt-15">
                            <div class="custom-control custom-checkbox checkbox-teal">
                                <input type="checkbox" class="custom-control-input" name="{{$role->id}}"
                                       @if(!is_null($data['user']->user->hasRole($role->name)?? null))
                                    @if($data['user']->user->hasRole($role->name)) checked @endif
                                    @endif>
                                <label class="custom-control-label" for="customCheck5">{{$role->name}}</label>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <h6 class="mb-20 mt-30">Roles</h6>
                    <div class="form-row">
                        @foreach($data['permissions'] as $permission)
                            <div class="col-md-3 mt-15">
                                <div class="custom-control custom-checkbox checkbox-teal">
                                    <input type="checkbox" class="custom-control-input" name="{{$permission->id}}">
                                    <label class="custom-control-label" for="customCheck5">{{$permission->name}}</label>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <hr class="hr-primary hr-3 mt-10">


                    <br><br>
                    <div class="form-row">
                        <div class="col-md-6 form-group">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
@endsection
