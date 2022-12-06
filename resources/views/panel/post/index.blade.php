@extends('layouts.panel')

@section('title')
    {{__('messages.panel.post_page.title')}}
@endsection

@section('content')
    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">{{__('values.create_new_post')}}</h5>
        <p class="mb-25">{{__('messages.panel.post_page.create')}}</p>
        <div class="row">
            <div class="col-sm">
                <div class="button-list">
                    <a href="{{route('panel.post.create')}}" type="button" class="btn btn-outline-primary">{{__('values.create_new_post')}}</a>

            </div>
        </div>
    </section>

    <section class="hk-sec-wrapper">
        <h5 class="hk-sec-title">{{__('values.posts')}}</h5>
        <div class="row">
            <div class="col-sm">
                <div class="table-wrap">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered mb-0">
                            <thead>
                            <tr>
                                <th>{{__('values.title')}}</th>
                                <th>{{__('values.author')}}</th>
                                <th>{{__('values.study_time')}}</th>
                                <th>{{__('values.actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td>{{$post->title}}</td>
                                    <td>{{$post->user->full_name}}</td>
                                    <td>{{$post->study_time}} {{__('values.minutes')}}</td>

                                    <td>
                                        <a href="{{route('post.show',$post->id)}}" class="mr-25"  target="_blank" data-toggle="tooltip" data-original-title="Show"> <i class="fa fa-eye"></i>
                                        </a>

                                        <a href="#" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i
                                                class="icon-pencil"></i> </a>
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
                {{ $posts->links() }}
        </div>
    </section>
@endsection
