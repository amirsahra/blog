@extends('layouts.panel')

@section('title')
    region
@endsection

@section('content')

    @include('partials.panel.message')

    <!-- city -->
    <section class="hk-sec-wrapper ">
            <h5 class="hk-sec-title">{{__('values.add_new_city')}}</h5>
            <p class="mb-25">You can create new city</p>
            <div class="">
                <form method="post" action="{{route('panel.region.city.store')}}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <select class="form-control custom-select  mt-15" id="pro-1" name="province_id">
                                <option selected="" value="" >Select province</option>
                                @foreach($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->name}}</option>
                                @endforeach
                            </select>
                            @if($errors->has('province_id'))<span class="error">{{ $errors->first('province_id') }}</span>@endif
                        </div>
                    </div>
                    <br>
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
