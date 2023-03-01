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
                            @foreach($posts as $post)
                                <h2><a href="single-post.html">Bài viết mới nhất</a></h2>
                                <a href="single-post.html"><img src="{{$post->img_url}}" alt=""
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
                                    <div class="photo"><img src="assets/img/{{$post->users->avatar}}" alt="" class="img-fluid">
                                    </div>
                                    <div class="name">
                                        <h3 class="m-0 p-0">{{$post->users->fullname}}</h3>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!--End left post-->

                    <!--center post-->
                    <div class="col-lg-8">
                        <div class="row g-5">
                            <div class="col-lg-4 border-start custom-border">
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-2.jpg" alt=""
                                                                    class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Sport</span> <span
                                            class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2><a href="single-post.html">Let’s Get Back to Work, New York</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-5.jpg" alt=""
                                                                    class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Food</span> <span
                                            class="mx-1">&bullet;</span> <span>Jul 17th '22</span></div>
                                    <h2><a href="single-post.html">How to Avoid Distraction and Stay Focused During
                                            Video Calls?</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-7.jpg" alt=""
                                                                    class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Design</span> <span
                                            class="mx-1">&bullet;</span> <span>Mar 15th '22</span></div>
                                    <h2><a href="single-post.html">Why Craigslist Tampa Is One of The Most Interesting
                                            Places On the Web?</a></h2>
                                </div>
                            </div>
                            <div class="col-lg-4 border-start custom-border">
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-3.jpg" alt=""
                                                                    class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span>
                                        <span>Jul 5th '22</span></div>
                                    <h2><a href="single-post.html">6 Easy Steps To Create Your Own Cute Merch For
                                            Instagram</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-6.jpg" alt=""
                                                                    class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Tech</span> <span
                                            class="mx-1">&bullet;</span> <span>Mar 1st '22</span></div>
                                    <h2><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should
                                            Know</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-8.jpg" alt=""
                                                                    class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Travel</span> <span
                                            class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                                </div>
                            </div>
                            <div class="col-lg-4 border-start custom-border">
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-3.jpg" alt=""
                                                                    class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Business</span> <span class="mx-1">&bullet;</span>
                                        <span>Jul 5th '22</span></div>
                                    <h2><a href="single-post.html">6 Easy Steps To Create Your Own Cute Merch For
                                            Instagram</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-6.jpg" alt=""
                                                                    class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Tech</span> <span
                                            class="mx-1">&bullet;</span> <span>Mar 1st '22</span></div>
                                    <h2><a href="single-post.html">10 Life-Changing Hacks Every Working Mom Should
                                            Know</a></h2>
                                </div>
                                <div class="post-entry-1">
                                    <a href="single-post.html"><img src="assets/img/post-landscape-8.jpg" alt=""
                                                                    class="img-fluid"></a>
                                    <div class="post-meta"><span class="date">Travel</span> <span
                                            class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                                    <h2><a href="single-post.html">5 Great Startup Tips for Female Founders</a></h2>
                                </div>
                            </div>
                        </div>
                    </div>

                </div> <!-- End .row -->
            </div>
        </section> <!-- End Post Grid Section -->
    </main><!-- End #main -->
@endsection
