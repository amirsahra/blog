@extends('layouts.panel')

@section('title')
    Category
@endsection

@section('content')
    @include('partials.panel.message')
    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Update category</h5>
        <div class="">
            <form method="post" action="{{route('panel.category.update',$category->id)}}">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="title">{{__('values.name')}}</label>
                        <input class="form-control" name="name" placeholder="" value="{{$category->name}}" type="text">
                        @if($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span>@endif
                    </div>
                    <div class="col-md-6 form-group">
                        <label for="slug">{{__('values.slug')}}</label>
                        <input class="form-control" name="slug" placeholder="" value="{{$category->slug}}" type="text">
                        @if($errors->has('slug'))<span
                            class="error">{{ $errors->first('slug') }}</span>@endif
                    </div>
                </div>
                <button class="btn btn-primary" type="submit">{{__('values.update')}}</button>
            </form>

        </div>
    </section>
@endsection
