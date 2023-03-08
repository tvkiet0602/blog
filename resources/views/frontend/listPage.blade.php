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
        @section('breadcrumbs')
            {{ Breadcrumbs::render('list-page', $categories) }}
        @endsection
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-9" data-aos="fade-up">
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
                                            <?php echo mb_substr($post->content, 0, 300, "UTF-8") ."...."; ?>
                                        @endif
                                    </p>
                                    <div class="d-flex align-items-center author">
                                        <div class="photo"><img src="{{asset('assets/img/'.$post->users->avatar)}}"
                                                                alt="Avatar"></div>
                                        <div class="name">
                                            <h3 class="m-0 p-0">{{$post->users->fullname}}</h3>
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
                                @foreach($idCat as $cat)
                                <li><a href="{{route('list-page', ['id'=>$cat->id])}}"><i class="bi bi-chevron-right"></i>{{$cat->name}}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- End Categories -->

                        <div class="aside-block">
                            <h3 class="aside-title">Thể loại</h3>
                            <ul class="aside-tags list-unstyled">
                                @foreach($idCat as $cat)
                                    <li><a href="{{route('list-page', ['id'=>$cat->id])}}">{{$cat->name}}</a></li>
                                @endforeach
                            </ul>
                        </div><!-- End Tags -->

                    </div>

                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
