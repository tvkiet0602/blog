@extends('frontend.layouts.master')
@section('title')
    Create a blog
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
            {{ Breadcrumbs::render('add-posts') }}
        @endsection
        <section id="contact" class="contact mb-5">
            <div class="container" data-aos="fade-up">
                <div class="col-lg-12 text-center mb-5">
                    <h1 class="page-title">Tạo bài viết mới</h1>
                </div>

                <div class="form mt-5">

                    <form action="{{route('add-posts', ['id' => $user_id])}}" method="post" role="form"
                          class="php-email-form" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group">
                                <input type="text" name="title" class="form-control" id="title"
                                       placeholder="Tiêu đề bài viết" required>
                            </div>
                                <div class="form-group">
                                    <select name="categories_id" class="form-control">
                                        <option value="">Thể loại bài viết</option>
                                        @foreach($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach

                                    </select>
                                </div>
                            <div class="form-group">
                                <textarea class="form-control" name="contents" rows="5" placeholder="Nội dung bài viết"
                                          required></textarea>
                            </div>
                            <div class="my-3">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="file" name="img_url" class="form-control" id="img_url"
                                       placeholder="Ảnh bài viết" required>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="text" name="describe_img" class="form-control" id="describe_img"
                                       placeholder="Mô tả cho hình ảnh" required>
                            </div>
                        </div>

                        <div class="text-center">
                            <button type="submit">Đăng bài</button>
                        </div>
                        <?php echo csrf_field(); ?>
                    </form>
                </div><!-- End Contact Form -->
            </div>
        </section>
    </main><!-- End #main -->

@endsection
