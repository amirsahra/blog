<section class="bg0 p-t-70">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="p-b-20">

                    <!-- posts -->
                    <div class="tab01 p-b-20">
                        <div class="tab01-head how2 how2-cl2 bocl12 flex-s-c m-r-10 m-r-0-sr991">
                            <!-- Brand tab -->
                            <h3 class="f1-m-2 cl13 tab01-title">
                                {{__('values.latest_posts')}}

                            </h3>

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs" role="tablist"></ul>

                            <a href="category-01.html" class="tab01-link f1-s-1 cl9 hov-cl10 trans-03">
                                {{__('values.view_all')}}
                                <i class="fs-12 m-l-5 fa fa-caret-right"></i>
                            </a>
                        </div>
                        <div class="row p-t-35">
                            @foreach($posts as $post)
                                <div class="col-sm-6 col-md-4">
                                    <!-- Item latest -->
                                    <div class="m-b-45">
                                        <a href="{{ route('post.show',$post->id)}}" class="wrap-pic-w hov1 trans-03">
                                            <img src="{{asset('site/images/latest-01.jpg')}}" alt="IMG">
                                        </a>

                                        <div class="p-t-16">
                                            <h5 class="p-b-5">
                                                <a href="blog-detail-02.html" class="f1-m-3 cl2 hov-cl10 trans-03">
                                                    {{ mb_substr($post->content,0, 50,) }}
                                                </a>
                                            </h5>

                                            <span class="cl8">
								<a href="#" class="f1-s-4 cl8 hov-cl10 trans-03">
									{{__('values.by')}} {{$post->user->full_name}}
								</a>

								<span class="f1-s-3 m-rl-3">
									-
								</span>

								<span class="f1-s-3">
									{{ $post->created_at }}
								</span>
							</span>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{$posts->links()}}
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>
