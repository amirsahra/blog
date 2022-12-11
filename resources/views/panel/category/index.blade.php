@extends('layouts.panel')

@section('title')
    Category
@endsection

@section('content')
    @include('partials.panel.message')
    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">Add new category</h5>
        <p class="mb-25">You can create new category</p>
        <div class="">
            <form method="post" action="{{route('panel.category.store')}}">
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

    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">{{__('values.category')}}</h5>
        <div class="row">
            <div class="col-sm">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>{{__('values.name')}}</th>
                                <th>{{__('values.slug')}}</th>
                                <th>Created at</th>
                                <th>{{__('values.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <td>{{$category->name}}</td>
                                    <td>{{$category->slug}}</td>
                                    <td>{{$category->created_at}}</td>

                                    <td>
                                        <a href="{{route('panel.category.edit',$category->id)}}" class="mr-25"
                                           data-toggle="tooltip" data-original-title="Edit"> <i
                                                class="icon-pencil"></i>
                                        </a>
                                        <form action="{{ route('panel.category.destroy', $category->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" data-toggle="tooltip" data-original-title="Delete"><i
                                                    class="icon-trash txt-danger"></i></button>
                                        </form>
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
                {{ $categories->links() }}
            </div>
    </section>
@endsection
