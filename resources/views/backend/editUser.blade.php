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
                        <label  class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" value="{{$info->username}}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Họ và tên</label>
                        <input type="text" name="fullname" class="form-control" value="{{$info->fullname}}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="{{$info->email}}">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Ảnh đại diện hiện tại</label><br>
                        <img src="{{asset('/assets/img/'.$info->avatar)}}" >
                            <input type="file" name="avatar" class="form-control" value="{{asset('/assets/img/'.$info->avatar)}}">
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Lưu</button>
                        <button href="{{route('user-manager')}}" class="btn btn-secondary">Hủy</button>
                    </div>
                    @csrf
                </form><!-- Vertical Form -->

            </div>
        </div>
    </main>
@endsection
