@extends('layouts.site')

@section('title')
    {{__('messages.post_page.post')}}
@endsection

@section('content')
    <section class="bg0 p-b-140 p-t-10">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-8 p-b-30">
                    <div class="p-r-10 p-r-0-sr991">
                        <!-- Blog Detail -->
                        <div class="p-b-70">
                            <a href="#" class="f1-s-10 cl2 hov-cl10 trans-03 text-uppercase">
                                {{$data['post']->category->name}}
                            </a>

                            <h3 class="f1-l-3 cl2 p-b-16 p-t-33 respon2">
                                {{$data['post']->title}}
                            </h3>

                            <div class="flex-wr-s-s p-b-40">
								<span class="f1-s-3 cl8 m-r-15">
									<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
										{{__('values.by')}} {{ $data['post']->user->full_name }}
									</a>

									<span class="m-rl-3">-</span>

									<span>
                                        {{ $data['post']->created_at }}
									</span>
								</span>

                                <span class="f1-s-3 cl8 m-r-15">
									{{__('values.study_time')}} {{ $data['post']->study_time }} {{__('values.minute')}}
								</span>

                                <a href="#" class="f1-s-3 cl8 hov-cl10 trans-03 m-r-15">
                                    {{ count($data['post']->comments) }} {{__('values.comment')}}
                                </a>
                            </div>

                            <div class="wrap-pic-max-w p-b-30">
{{--
                                <img src="{{asset('site/images/blog-list-01.jpg')}}" alt="IMG">
--}}
                                <img src="{{asset($data['post']->image)}}" alt="IMG">
                            </div>

                            <p class="f1-s-11 cl6 p-b-25">
                                {{ $data['post']->content}}
                            </p>

                            <!-- category -->
                            <div class="flex-s-s p-t-12 p-b-15">
								<span class="f1-s-12 cl5 m-r-8">
								{{__('values.category')}} :
								</span>

                                <div class="flex-wr-s-s size-w-0">
                                    <a href="#" class="f1-s-12 cl8 hov-link1 m-r-15">
                                        {{ $data['post']->category->name }}
                                    </a>

                                </div>
                            </div>

                            <!-- Share -->
                            <div class="flex-s-s">
								<span class="f1-s-12 cl5 p-t-1 m-r-15">
									Share:
								</span>

                                <div class="flex-wr-s-s size-w-0">
                                    <a href="#"
                                       class="dis-block f1-s-13 cl0 bg-facebook borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fab fa-facebook-f m-r-7"></i>
                                        Facebook
                                    </a>

                                    <a href="#"
                                       class="dis-block f1-s-13 cl0 bg-twitter borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fab fa-twitter m-r-7"></i>
                                        Twitter
                                    </a>

                                    <a href="#"
                                       class="dis-block f1-s-13 cl0 bg-google borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fab fa-google-plus-g m-r-7"></i>
                                        Google+
                                    </a>

                                    <a href="#"
                                       class="dis-block f1-s-13 cl0 bg-pinterest borad-3 p-tb-4 p-rl-18 hov-btn1 m-r-3 m-b-3 trans-03">
                                        <i class="fab fa-pinterest-p m-r-7"></i>
                                        Pinterest
                                    </a>
                                </div>
                            </div>
                        </div>

                        <!-- Leave a comment -->
                        <div>
                            <h4 class="f1-l-4 cl3 p-b-12">
                                {{__('messages.post_page.comment')}}
                            </h4>

                            <form>
                                <textarea class="bo-1-rad-3 bocl13 size-a-15 f1-s-13 cl5 plh6 p-rl-18 p-tb-14 m-b-20"
                                          name="msg" placeholder="Comment..."></textarea>

                                <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text"
                                       name="name" placeholder="Name*">

                                <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text"
                                       name="email" placeholder="Email*">

                                <input class="bo-1-rad-3 bocl13 size-a-16 f1-s-13 cl5 plh6 p-rl-18 m-b-20" type="text"
                                       name="website" placeholder="Website">

                                <button class="size-a-17 bg2 borad-3 f1-s-12 cl0 hov-btn1 trans-03 p-rl-15 m-t-10">
                                    Post Comment
                                </button>
                            </form>
                        </div>
                    </div>

                    @foreach($data['post']->comments as $comment)
                        <div style="margin: 24px">

                            <div class="p-4 bg-light rounded">
                                <h4 class="fst-italic">{{ $comment->title }}</h4>
                                <span class="f1-s-3 cl8 m-r-15">
									<span>{{ $comment->user->full_name }}</span>
								</span>
                                <p class="mb-0">{{ $comment->content }}</p>
                            </div>
                        </div>
                    @endforeach

                </div>

                <!-- Sidebar -->
                <div class="col-md-10 col-lg-4 p-b-30">
                    <div class="p-l-10 p-rl-0-sr991 p-t-70">
                        <!-- Category -->
                        <div class="p-b-60">
                            <div class="how2 how2-cl4 flex-s-c">
                                <h3 class="f1-m-2 cl3 tab01-title">
                                    Category
                                </h3>
                            </div>

                            <ul class="p-t-35">
                                @foreach($data['categories'] as $cat)
                                <li class="how-bor3 p-rl-4">
                                    <a href="#" class="dis-block f1-s-10 text-uppercase cl2 hov-cl10 trans-03 p-tb-13">
                                        {{$cat->name}}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
