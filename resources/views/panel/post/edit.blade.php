@extends('layouts.panel')

@section('title')
    {{__('messages.panel.post_page.title')}}
@endsection

@section('content')
    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">{{__('values.edit_new_post')}}</h5>
        <div class="row">
            <div class="col-sm">
                <form method="post" action="{{route('panel.post.update',$data['post']->id)}}" enctype="multipart/form-data">

                    @include('partials.panel.message')

                    @csrf
                    @method('PUT')

                    <div class="position-relative">
                        <img class="card-img-top d-block" src="{{asset($data['post']->image)}}" alt="Card image cap">
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="title">{{__('values.title')}}</label>
                            <input class="form-control" name="title" placeholder="" value="{{$data['post']->title}}" type="text">
                            @if($errors->has('title'))<span
                                class="error">{{ $errors->first('title') }}</span>@endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="slug">{{__('values.slug')}}</label>
                            <input class="form-control" name="slug" placeholder="" value="{{$data['post']->title}}" type="text">
                            @if($errors->has('slug'))<span
                                class="error">{{ $errors->first('slug') }}</span>@endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 form-group">
                            <label for="slug">{{__('values.image')}}</label>
                            <input type="file" class="form-control-file" name="image">
                            @if($errors->has('image'))<span
                                class="error">{{ $errors->first('image') }}</span>@endif
                        </div>
                        <div class="col-md-6 form-group">
                            <label for="category">{{__('values.category')}}</label>
                            <select class="form-control custom-select  mt-15" name="category_id">
                                <option disabled selected>{{__('values.selected')}}</option>
                                @foreach($data['categories'] as $category)
                                    <option value="{{$category->id}}" @if($category->id == $data['post']->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('category_id'))<span
                                class="error">{{ $errors->first('category_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="content">{{__('values.content')}}</label>
                            <textarea class="form-control mt-15" name="content" rows="5" placeholder="Textarea" >{{$data['post']->title}}</textarea>
                        </div>
                    </div>
                    <hr>
                    <button class="btn btn-primary" type="submit">{{__('values.create_post')}}</button>
                </form>
            </div>
        </div>
    </section>
@endsection
