@extends('backend.layouts.master')
@section('title')
    Dashboard
@endsection
@section('main')
    <main id="main">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Chỉnh sửa thông tin người dùng: {{$info->fullname}}</h5>

                <!-- Vertical Form -->
                <form method="POST" class="row g-3" enctype="multipart/form-data">
                    <div class="col-12">
                        <label for="inputNanme4" class="form-label">Username</label>
                        <input type="text" class="form-control" id="inputNanme4" value="{{$info->username}}">
                    </div>
                    <div class="col-12">
                        <label for="inputEmail4" class="form-label">Họ và tên</label>
                        <input type="text" class="form-control" id="inputEmail4" value="{{$info->fullname}}">
                    </div>
                    <div class="col-12">
                        <label for="inputPassword4" class="form-label">Email</label>
                        <input type="email" class="form-control" id="inputPassword4" value="{{$info->email}}">
                    </div>
                    <div class="col-12">
                        <label for="inputAddress" class="form-label">Ảnh đại diện</label>
                        <input type="file" class="form-control" id="inputAddress" placeholder="Chọn ảnh đại diện" value="{{$info->avatar}}">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <button type="cacel" class="btn btn-secondary">Hủy</button>
                    </div>
                    @csrf
                </form><!-- Vertical Form -->

            </div>
        </div>
    </main>
@endsection
