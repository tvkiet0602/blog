@extends('frontend.layouts.master')
@section('title')
    Create a blog
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
            {{ Breadcrumbs::render('add-posts') }}
        @endsection
        <section id="contact" class="contact mb-5">
            <div class="container" data-aos="fade-up">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="page-title">Tạo bài viết mới</h1>
                </div>
                <div class="form mt-5">
                    <!-- Floating Labels Form -->
                    <form class="row g-3" method="POST" enctype="multipart/form-data">
                        <div class="col-md-12">
                            @if ($errors->any())
                                <div class="alert alert-danger" style="text-align: center">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <h6 class="aside-tags"><i class="bi bi-emoji-dizzy"></i> {{ $error }}</h6>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingName" name="title">
                                <label for="floatingPassword">Tiêu đề bài viết</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <select name="categories_id" class="form-control">
                                <option value="">--Chọn thể loại cho bài viết--</option>
                                @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="form-floating">
                                <textarea class="form-control" placeholder="Nội dung" name="contents"
                                          style="min-height: 400px"></textarea>
                                <label for="floatingPassword">Nội dung</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="file" class="form-control" id="floatingEmail" name="img_url" >
                                <label for="floatingPassword">Ảnh bài viết</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" name="describe_img"
                                       placeholder="Mô tả hình ảnh">
                                <label for="floatingPassword" >Mô tả hình ảnh</label>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Đăng bài</button>
                        </div>
                        @csrf
                    </form>
                </div>
            </div>
        </section>
    </main><!-- End #main -->

@endsection
