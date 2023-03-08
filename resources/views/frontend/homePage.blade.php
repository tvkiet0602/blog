@extends('frontend.layouts.master')
@section('title')
    HomePage
@endsection
@section('posts-add')
    {{route('add-posts', ['id' => 1])}}
@endsection
@section('nav-cat')
    @foreach($idCat as $items)
        <li><a href="{{route('list-page', ['id' => $items->id])}}">{{$items->name }}</a></li>
    @endforeach
@endsection

@section('main')
    <main id="main">
        @section('breadcrumbs')
            {{ Breadcrumbs::render('home') }}
        @endsection
        <!-- ======= Post Grid Section ======= -->
        <section id="posts" class="posts">
            <div class="container" data-aos="fade-up">
                <div class="row g-5">
                    {{--                    Left Post--}}
                    <div class="col-lg-4">
                        <div class="post-entry-1 lg">

                            <h2>Bài viết mới nhất</h2>
                            <a href="{{route('detail', ['id' => $post->id])}}"><img
                                    src="{{asset('assets/img/'.$post->img_url)}}" alt="Ảnh bài viết mới nhất"
                                    class="img-fluid"></a>
                            <div class="post-meta"><span class="date">{{$post->categories->name}}</span> <span
                                    class="mx-1">&bullet;</span> <span>{{$post->post_date}}</span></div>
                            <h3><a href="{{route('detail', ['id' => $post->id])}}">{{$post->title}}</a></h3>
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
                                        <a href="{{route('detail', ['id' => $items->id])}}"><img
                                                src="{{asset('assets/img/'.$items->img_url)}}"
                                                alt="loi"
                                                class="img-fluid"></a>
                                        <div class="post-meta"><span class="date">{{$items->categories->name}}</span>
                                            <span
                                                class="mx-1">&bullet;</span> <span>{{$items->created_at}}</span></div>
                                        <h2><a href="{{route('detail', ['id' => $items->id])}}">{{$items->title}}</a>
                                        </h2>
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
@section('footer-cat')
    @foreach($idCat as $items)
        <li><a href="{{route('list-page', ['id' => $items->id])}}"><i class="bi bi-chevron-right"></i>{{$items->name }}
            </a></li>
    @endforeach
@endsection
{{--@section('footer-categories-id')--}}
{{--    {{$post->categories->id}}--}}
{{--@endsection--}}
{{--@section('footer-categories-name')--}}
{{--    {{$post->categories->name}}--}}
{{--@endsection--}}
