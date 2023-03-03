@extends('frontend.layouts.master')
@section('title')
    HomePage
@endsection
@section('main')
    <main id="main">
        <section class="single-post-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 post-content" data-aos="fade-up">

                        <!-- ======= Single Post Content ======= -->
                        <div class="single-post">
                            <div class="post-meta"><span class="date"></span>{{$detail->categories->name}}<span
                                    class="mx-1">&bullet;</span>
                                <span>{{$detail->created_at}}</span>
                                <span class="mx-1">&bullet;</span>
                                {{$detail->users->fullname}}</span>
                            </div>
                            <h1 class="mb-5">{{$detail->title}}</h1>
                            <p><span class="firstcharacter">{{substr($detail->content, 0, 1)}}</span>
                                <?php
                                echo substr_replace(substr($detail->content, 1, strpos($detail->content, "\n")), "", strpos($detail->content, "\n"), strlen($detail->content));
                                ?>
                            </p>

                            <figure class="my-4">
                                <img src="{{asset('assets/img/'.$detail->img_url)}}" alt="Ảnh bài viết"
                                     class="img-fluid">
                                <figcaption>{{$detail->describe_img}}
                                </figcaption>
                            </figure>
                            <p><?php
                               $cut = substr($detail->content, 0, strpos($detail->content, "\n"));
                               echo str_replace($cut, substr($detail->content, 0, -strlen($detail->content)), nl2br($detail->content));
                               ?></p>
                        </div><!-- End Single Post Content -->

                        <!-- ======= Comments ======= -->
                        <div class="comments">
                            <h5 class="comment-title py-4">Bình luận (2)</h5>
                            <div class="comment d-flex mb-4">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm rounded-circle">
                                        <img class="avatar-img" src="/assets/img/person-5.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="flex-grow-1 ms-2 ms-sm-3">
                                    <div class="comment-meta d-flex align-items-baseline">
                                        <h6 class="me-2">Jordan Singer</h6>
                                        <span class="text-muted">2d</span>
                                    </div>
                                    <div class="comment-body">
                                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Non minima ipsum at
                                        amet doloremque qui magni, placeat deserunt pariatur itaque laudantium impedit
                                        aliquam eligendi repellendus excepturi quibusdam nobis esse accusantium.
                                    </div>

                                    <div class="comment-replies bg-light p-3 mt-3 rounded">
                                        <h6 class="comment-replies-title mb-4 text-muted text-uppercase">2 replies</h6>

                                        <div class="reply d-flex mb-4">
                                            <div class="flex-shrink-0">
                                                <div class="avatar avatar-sm rounded-circle">
                                                    <img class="avatar-img" src="/assets/img/person-4.jpg" alt=""
                                                         class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-2 ms-sm-3">
                                                <div class="reply-meta d-flex align-items-baseline">
                                                    <h6 class="mb-0 me-2">Brandon Smith</h6>
                                                    <span class="text-muted">2d</span>
                                                </div>
                                                <div class="reply-body">
                                                    Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="reply d-flex">
                                            <div class="flex-shrink-0">
                                                <div class="avatar avatar-sm rounded-circle">
                                                    <img class="avatar-img" src="/assets/img/person-3.jpg" alt=""
                                                         class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-2 ms-sm-3">
                                                <div class="reply-meta d-flex align-items-baseline">
                                                    <h6 class="mb-0 me-2">James Parsons</h6>
                                                    <span class="text-muted">1d</span>
                                                </div>
                                                <div class="reply-body">
                                                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio
                                                    dolore sed eos sapiente, praesentium.
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="comment d-flex">
                                <div class="flex-shrink-0">
                                    <div class="avatar avatar-sm rounded-circle">
                                        <img class="avatar-img" src="/assets/img/person-2.jpg" alt="" class="img-fluid">
                                    </div>
                                </div>
                                <div class="flex-shrink-1 ms-2 ms-sm-3">
                                    <div class="comment-meta d-flex">
                                        <h6 class="me-2">Santiago Roberts</h6>
                                        <span class="text-muted">4d</span>
                                    </div>
                                    <div class="comment-body">
                                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto laborum in
                                        corrupti dolorum, quas delectus nobis porro accusantium molestias sequi.
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Comments -->

                        <!-- ======= Comments Form ======= -->
                        <div class="row justify-content-center mt-5">

                            <div class="col-lg-12">
                                <h5 class="comment-title">Để lại Bình luận</h5>
                                <div class="row">
                                    <div class="col-12 mb-3">
                                        <label for="comment-message">Nội dung</label>

                                        <textarea class="form-control" id="comment-message"
                                                  placeholder="Enter your name" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="col-12">
                                        <input type="submit" class="btn btn-primary" value="Đăng bình luận">
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Comments Form -->

                    </div>

                    <!-- ======= Sidebar ======= -->
                    <div class="col-lg-3 border-start custom-border">
                        <h2 class="">Bài viết liên quan</h2>
                        <div class="post-entry-1">
                            @foreach($idCat as $cat)
                            <a href="{{route('detail', ['id'=>$cat->id])}}"><img src="{{asset('assets/img/'.$cat->img_url)}}" alt="Ảnh bài viết"
                                                            class="img-fluid"></a>
                            <div class="post-meta"><span class="date">{{$idCategories->name}}</span> <span class="mx-1">&bullet;</span>
                                <span>{{$cat->created_at}}</span></div>
                            <h2><a href="single-post.html">{{$cat->title}}</a>
                            </h2>
                            @endforeach
                        </div>
                    </div>

                </div>

            </div>
        </section>
    </main><!-- End #main -->
@endsection
