@extends('layouts.site')

@section('title')
    {{__('messages.home_page.title')}}
@endsection

@section('content')

    <!-- Feature post -->
    @include('partials.site.feature-post',['feature'=>$data['feature']])

    <!-- Post -->
   @include('partials.site.section-post',['posts'=>$data['posts']])
@endsection
