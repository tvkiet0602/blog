@extends('backend.layouts.master')
@section('title')
    Article
@endsection

@section('main')
<main id="main">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Chỉnh sửa bài viết</h5>

            <!-- Floating Labels Form -->
            <form class="row g-3" method="POST">
                <div class="col-md-12">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingName" name="title" value="{{$articleEdit->title}}">
                        <label for="floatingPassword">Tiêu đề bài viết</label>
                    </div>
                </div>
                <div class="col-12">
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Nội dung" name="contents" id="floatingTextarea" style="height: 500px;" >{{$articleEdit->content}}</textarea>
                        <label for="floatingPassword">Nội dung</label>
                    </div>
                </div>
{{--                <div class="col-md-6">--}}
{{--                    <div class="form-floating">--}}
{{--                        <input type="file" class="form-control" id="floatingEmail" name="img_url">--}}
{{--                        <label for="floatingPassword">Ảnh bài viết</label>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <div class="col-md-6">
                    <div class="form-floating">
                        <input type="text" class="form-control" name="describe_img" placeholder="Mô tả hình ảnh" value="{{$articleEdit->describe_img}}">
                        <label for="floatingPassword">Mô tả hình ảnh</label>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Lưu</button>
                    <button type="cancel" class="btn btn-secondary">Hủy</button>
                </div>
                @csrf
            </form><!-- End floating Labels Form -->

        </div>
    </div>
</main><!-- End #main -->

@endsection
