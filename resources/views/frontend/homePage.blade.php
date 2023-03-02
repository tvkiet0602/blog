@extends('frontend.layouts.master')
@section('title')
    HomePage
@endsection
@section('main')
    <main id="main">
        <!-- ======= Post Grid Section ======= -->
        <section id="posts" class="posts">
            <div class="container" data-aos="fade-up">
                <div class="row g-5">
                    {{--                    Left Post--}}
                    <div class="col-lg-4">
                        <div class="post-entry-1 lg">
                            <h2>Bài viết mới nhất</h2>
                            <a href=""><img src="{{asset('assets/img/'.$post->img_url)}}" alt="Ảnh bài viết mới nhất"
                                                            class="img-fluid"></a>
                            <div class="post-meta"><span class="date">{{$post->categories->name}}</span> <span
                                    class="mx-1">&bullet;</span> <span>{{$post->post_date}}</span></div>
                            <h3><a href="single-post.html">{{$post->title}}</a></h3>
                            <p class="mb-4 d-block">
                                @if(strlen($post->content) > 700)
                                    {{substr($post->content, 0, 700) . "..."}}
                                @endif
                            </p>
                            <div class="d-flex align-items-center author">
                                <div class="photo"><img src="assets/img/{{$post->users->avatar}}" alt=""
                                                        class="img-fluid">
                                </div>
                                <div class="name">
                                    <h3 class="m-0 p-0">{{$post->users->fullname}}</h3>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!--End left post-->

                    <!--center post-->
                    <div class="col-lg-8">
                        <div class="row g-5">
                            @foreach($posts as $items)
                                <div class="col-lg-4 border-start custom-border">
                                    <div class="post-entry-1">
                                        <a href="single-post.html"><img src="{{asset('assets/img/'.$items->img_url)}}"
                                                                        alt="loi"
                                                                        class="img-fluid"></a>
                                        <div class="post-meta"><span class="date">{{$items->categories->name}}</span>
                                            <span
                                                class="mx-1">&bullet;</span> <span>{{$items->post_date}}</span></div>
                                        <h2><a href="single-post.html">{{$items->title}}</a></h2>
                                    </div>
                                </div>
                            @endforeach
                            {!! $posts->links() !!}
                        </div>
                    </div>

                </div> <!-- End .row -->
            </div>
        </section> <!-- End Post Grid Section -->
    </main><!-- End #main -->
@endsection
