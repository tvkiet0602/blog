@extends('frontend.layouts.master')
@section('title')
    List Page
@endsection
@section('posts-add')
    {{route('add-posts', ['id' => 1])}}
@endsection
@section('logout') @endsection
@section('home')
    {{route('home')}}
@endsection
@section('main')
    <main id="main">
        <section>
            <div class="container">
                <div class="row">

                    <div class="col-md-9" data-aos="fade-up">



                            <h3 class="category-title">Danh mục: {{$categories->name}}</h3>
                        @foreach ($posts as $post)
                            <div class="d-md-flex post-entry-2 half">
                                <a href="{{$post->id}}" class="me-4 thumbnail">
                                    <img src="{{asset('assets/img/'.$post->img_url)}}"
                                         alt="Ảnh bài viết về {{$post->categories->name}}" class="img-fluid">
                                </a>
                                <div>
                                    <div class="post-meta">  <span>{{$post->created_at}}</span>
                                    </div>
                                    <h3><a href="single-post.html">{{$post->title}}</a></h3>
                                    <p>
                                        @if(strlen($post->content) > 200)
                                            <?php echo mb_substr($post->content, 0, 200, "UTF-8") . "..."; ?>
                                        @endif
                                    </p>
                                    <div class="d-flex align-items-center author">
                                        <div class="photo"><img src="{{asset('assets/img/').$post->users->avatar}}"
                                                                alt="" class="img-fluid"></div>
                                        <div class="name">
                                            <h3 class="m-0 p-0">{{$post->users->name}}</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="col-md-3">
                        <!-- ======= Sidebar ======= -->


                        <div class="aside-block">
                            <h3 class="aside-title">Danh mục bài viết</h3>
                            <ul class="aside-links list-unstyled">
                                <li><a href="#"><i class="bi bi-chevron-right"></i> Xã hội</a></li>
                                <li><a href="#"><i class="bi bi-chevron-right"></i> Thể thao</a></li>
                                <li><a href="#"><i class="bi bi-chevron-right"></i> Thực phẩm</a></li>
                                <li><a href="#"><i class="bi bi-chevron-right"></i> Chính trị</a></li>
                                <li><a href="#"><i class="bi bi-chevron-right"></i> Nghệ thuật</a></li>
                                <li><a href="#"><i class="bi bi-chevron-right"></i> Du lịch</a></li>
                            </ul>
                        </div><!-- End Categories -->

                        <div class="aside-block">
                            <h3 class="aside-title">Thể loại</h3>
                            <ul class="aside-tags list-unstyled">
                                <li><a href="#">Xã hội</a></li>
                                <li><a href="#">Thể thao</a></li>
                                <li><a href="#">Thực phẩm</a></li>
                                <li><a href="#">Chính trị</a></li>
                                <li><a href="#">Nghệ thuật</a></li>
                                <li><a href="#">Du lịch</a></li>
                            </ul>
                        </div><!-- End Tags -->

                    </div>

                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
