<section class="bg0">
    <div class="container">
        <div class="row m-rl--1">
            <div class="col-md-6 p-rl-1 p-b-2">
                <div class="bg-img1 size-a-3 how1 pos-relative" style="background-image: url({{$feature[0]['image']}});">
                    <a href="{{ route('post.show',$feature[0]['id'])}}" class="dis-block how1-child1 trans-03"></a>

                    <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                        <a href="{{ route('post.show',$feature[0]['id'])}}"
                           class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                            {{$feature[0]['title']}}
                        </a>

                        <h3 class="how1-child2 m-t-14 m-b-10">
                            <a href="{{ route('post.show',$feature[0]['id'])}}" class="how-txt1 size-a-6 f1-l-1 cl0 hov-cl10 trans-03">
                                {{ mb_substr($feature[0]['content'],0, 50,) }} ...
                            </a>
                        </h3>

                        <span class="how1-child2">
								<span class="f1-s-4 cl11">
									{{$feature[0]->user->full_name}}
								</span>

								<span class="f1-s-3 cl11 m-rl-3">
									-
								</span>

								<span class="f1-s-3 cl11">
									{{$feature[0]->created_at }}
								</span>
							</span>
                    </div>
                </div>
            </div>

            <div class="col-md-6 p-rl-1">
                <div class="row m-rl--1">
                    <div class="col-12 p-rl-1 p-b-2">
                        <div class="bg-img1 size-a-4 how1 pos-relative"
                             style="background-image: url({{$feature[1]['image']}});">
                            <a href="{{ route('post.show',$feature[1]['id'])}}" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-24">
                                <a href="#"
                                   class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    {{$feature[1]['title']}}
                                </a>

                                <h3 class="how1-child2 m-t-14">
                                    <a href="{{ route('post.show',$feature[1]['id'])}}"
                                       class="how-txt1 size-a-7 f1-l-2 cl0 hov-cl10 trans-03">
                                        {{ mb_substr($feature[1]['content'],0, 50,) }} ...
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 p-rl-1 p-b-2">
                        <div class="bg-img1 size-a-5 how1 pos-relative"
                             style="background-image: url({{$feature[0]['image']}});">
                            <a href="{{ route('post.show',$feature[2]['id'])}}" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <a href="{{ route('post.show',$feature[2]['id'])}}"
                                   class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    {{$feature[2]['title']}}
                                </a>

                                <h3 class="how1-child2 m-t-14">
                                    <a href="blog-detail-01.html"
                                       class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                        {{ mb_substr($feature[2]['content'],0, 50,) }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 p-rl-1 p-b-2">
                        <div class="bg-img1 size-a-5 how1 pos-relative"
                             style="background-image: url(images/post-04.jpg);">
                            <a href="{{ route('post.show',$feature[3]['id'])}}" class="dis-block how1-child1 trans-03"></a>

                            <div class="flex-col-e-s s-full p-rl-25 p-tb-20">
                                <a href="{{$feature[3]['slug']}}"
                                   class="dis-block how1-child2 f1-s-2 cl0 bo-all-1 bocl0 hov-btn1 trans-03 p-rl-5 p-t-2">
                                    {{$feature[3]['title']}}
                                </a>

                                <h3 class="how1-child2 m-t-14">
                                    <a href="{{$feature[3]['slug']}}"
                                       class="how-txt1 size-h-1 f1-m-1 cl0 hov-cl10 trans-03">
                                        {{ mb_substr($feature[3]['content'],0, 50,) }}
                                    </a>
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
