@extends('layouts.panel')

@section('title')
    {{__('messages.panel.region_page.title')}}
@endsection

@section('content')

    @include('partials.panel.message')

    <!-- province -->
    <section class="hk-sec-wrapper">
            <h5 class="hk-sec-title">{{__('values.create_new_province')}}</h5>
            <p class="mb-25">You can create new province</p>
            <div class="">
                <form method="post" action="{{route('panel.region.province.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="title">{{__('values.name')}}</label>
                            <input class="form-control" name="name" placeholder="" value="{{old('name')}}" type="text">
                            @if($errors->has('name'))<span class="error">{{ $errors->first('name') }}</span>@endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="slug">{{__('values.slug')}}</label>
                            <input class="form-control" name="slug" placeholder="" value="{{old('slug')}}" type="text">
                            @if($errors->has('slug'))<span
                                class="error">{{ $errors->first('slug') }}</span>@endif
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">{{__('values.create')}}</button>
                </form>

            </div>
        </section>
@endsection
