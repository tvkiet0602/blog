@extends('frontend.layouts.master')
@section('title')
    HomePage
@endsection
@section('nav-cat')
    @foreach($cat as $items)
        <li><a href="{{route('list-page', ['id' => $items->id])}}">{{$items->name }}</a></li>
    @endforeach
@endsection
@section('main')
    <main id="main">
        @section('breadcrumbs')
            {{ Breadcrumbs::render('detail', $detail) }}
        @endsection
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
                                @php
                                    if(Auth::check()){
                                        if($detail->user_id == auth()->user()->id){
                                @endphp
                                <span class="mx-1">&bullet;</span>
                                <span><a style="font-size: 14px" href="{{route('edit-posts', ['id' => $detail->id])}}">Chỉnh sửa</a></span>
                                <span class="mx-1">&bullet;</span>
                                @php
                                    }
                                }
                                @endphp
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
                            <h5 class="comment-title py-4">Bình luận ({{$count}})</h5>
                            @foreach($cmt as $items)
                                @if($items->check == 1)
                                    <div class="comment d-flex mb-4">
                                        <div class="flex-shrink-0">
                                            <div class="avatar avatar-sm rounded-circle">
                                                <img class="avatar-img"
                                                     src="{{asset('assets/img/'.$items->users->avatar)}}"
                                                     alt="Avatar comment" class="img-fluid">
                                            </div>
                                        </div>

                                        <div class="flex-grow-1 ms-2 ms-sm-3">
                                            <div class="comment-meta d-flex align-items-baseline">
                                                <h6 class="me-2">{{$items->users->fullname}}</h6>
                                                <span class="text-muted">{{$items->created_at}}</span>
                                            </div>
                                            <div class="comment-body">
                                                {{$items->content}}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div><!-- End Comments -->

                        <!-- ======= Comments Form ======= -->
                        <form method="POST">
                            <div class="row justify-content-center mt-5">
                                <div class="col-lg-12">
                                    <h5 class="comment-title">Để lại Bình luận</h5>
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                        <textarea name="content_cmt" class="form-control" id="comment-message"
                                                  placeholder="Nhập nội dung bình luận" cols="30" rows="3"></textarea>
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" class="btn btn-primary" value="Đăng bình luận"
                                                   onclick="alert('Bình luận của bạn sẽ được hiển thị sau khi được phê duyệt')">
                                        </div>
                                    </div>
                                </div>
                            </div><!-- End Comments Form -->
                            <?php echo csrf_field(); ?>
                        </form>
                    </div>

                    <!-- ======= Sidebar ======= -->
                    <div class="col-lg-3 border-start custom-border">
                        <h2 class="">Bài viết liên quan</h2>
                        <div class="post-entry-1">
                            @foreach($idCat as $cat)
                                <a href="{{route('detail', ['id'=>$cat->id])}}"><img
                                        src="{{asset('assets/img/'.$cat->img_url)}}" alt="Ảnh bài viết"
                                        class="img-fluid"></a>
                                <div class="post-meta"><span class="date">{{$idCategories->name}}</span> <span
                                        class="mx-1">&bullet;</span>
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
