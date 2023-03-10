@extends('frontend.layouts.master')
@section('title')
    Update Post
@endsection
@section('logout') @endsection
@section('home')
    {{route('home')}}
@endsection
@section('nav-cat')
    @foreach($categories as $items)
        <li><a href="{{route('list-page', ['id' => $items->id])}}">{{$items->name }}</a></li>
    @endforeach
@endsection
@section('main')
    <main id="main">
        @section('breadcrumbs')
            {{--            {{ Breadcrumbs::render('add-posts') }}--}}
        @endsection
        <section id="contact" class="contact mb-5">
            <div class="container" data-aos="fade-up">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="page-title">Chỉnh sửa bài viết</h1>
                </div>
                <div class="form mt-5">
                    <!-- Floating Labels Form -->
                    <form class="row g-3" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName" name="title"
                                       value="{{$edit->title}}">
                                <label for="floatingPassword">Tiêu đề bài viết</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Nội dung" name="contents"
                                          id="floatingTextarea" style="height: 500px;">{{$edit->content}}</textarea>
                                <label for="floatingPassword">Nội dung</label>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="describe_img" placeholder="Mô tả hình ảnh"
                                       value="{{$edit->describe_img}}">
                                <label for="floatingPassword">Mô tả hình ảnh</label>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Lưu</button>
                            <a href="{{url()->previous()}}" class="btn btn-secondary" >Hủy</a>
                        </div>
                        @csrf
                    </form><!-- End floating Labels Form -->
                </div>
            </div>
        </section>
    </main><!-- End #main -->

@endsection
