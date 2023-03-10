@extends('frontend.layouts.master')
@section('title')
    List Page
@endsection
@section('nav-cat')
    @foreach($idCat as $items)
        <li><a href="{{route('list-page', ['id' => $items->id])}}">{{$items->name }}</a></li>
    @endforeach
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
                        @if($posts->count() >= 1)
                            @foreach ($posts as $post)
                                <div class="d-md-flex post-entry-2 half">
                                    <a href="{{route('detail', ['id' => $post->id])}}" class="me-4 thumbnail">
                                        <img src="{{asset('assets/img/'.$post->img_url)}}"
                                             alt="Ảnh bài viết về {{$post->categories->name}}" class="img-fluid">
                                    </a>
                                    <div>
                                        <div class="post-meta">
                                            <span>{{$post->created_at}}</span>
                                        </div>
                                        <h3>
                                            <a href="{{route('detail', ['id' => $post->id])}}">{{$post->title}}</a>
                                        </h3>
                                        <p>
                                            @if(strlen($post->content) > 200)
                                                @php echo mb_substr($post->content, 0, 300, "UTF-8") ."...."; @endphp
                                            @endif
                                        </p>
                                        <div class="d-flex align-items-center author">
                                            <div class="photo">
                                                <img src="{{asset('assets/img/'.$post->users->avatar)}}"
                                                     alt="Avatar">
                                            </div>
                                            <div class="name">
                                                <h3 class="m-0 p-0">{{$post->users->fullname}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="d-md-flex post-entry-2 half">
                                <h3>Danh mục: {{$categories->name}} chưa tồn tại bài viết !!</h3>
                            </div>
                            <h4>Tạo bài viết
                                <a href="{{route('add-posts', ['id' => auth()->user()->id])}}"
                                   style="color:#0b5ed7"> tại đây
                                </a>.
                            </h4>
                        @endif
                    </div>
                    <div class="col-md-3">
                        <!-- ======= Sidebar ======= -->
                        <div class="aside-block">
                            <h3 class="aside-title">Danh mục bài viết</h3>
                            <ul class="aside-links list-unstyled">
                                @foreach($idCat as $cat)
                                    <li>
                                        <a href="{{route('list-page', ['id'=>$cat->id])}}"><i
                                                class="bi bi-chevron-right"></i>{{$cat->name}}
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <div class="aside-block">
                            <h3 class="aside-title">Thể loại</h3>
                            <ul class="aside-tags list-unstyled">
                                @foreach($idCat as $cat)
                                    <li>
                                        <a class="aside-tags" href="{{route('list-page', ['id'=>$cat->id])}}">{{$cat->name}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main><!-- End #main -->
@endsection
