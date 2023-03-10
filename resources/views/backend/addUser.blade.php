@extends('backend.layouts.master')
@section('title')
    Dashboard
@endsection
@section('main')
    <main id="main">
        <section id="contact" class="contact">
            <div class="container">
                <div class="text-center"><h2>THÊM NGƯỜI DÙNG MỚI</h2>
                </div>

                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <form method="post" role="form" class="php-email-form" enctype="multipart/form-data">
                            <div class="form-group mt-3">
                                <input type="hidden" class="form-control" name="id">
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="fullname" id="fullname"
                                       placeholder="Your Name" required>
                            </div>
                            <div class="form-group mt-3">
                                <input type="text" class="form-control" name="username" id="username"
                                       placeholder="Username"
                                       required></div>
                            <div class="form-group mt-3"><input type="password" class="form-control" name="password"
                                                                id="password" placeholder="Password" required>
                            </div>
                            <div class="form-group mt-3">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email"
                                       required>
                            </div>
                            <div class="form-group mt-3">
                                <select class="form-control" name="has_role" required>
                                    <option>--Phần quyền cho người dùng--</option>
                                    @foreach($roles as $role)
                                        <option value="{{$role->name}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <input type="hidden" class="form-control" name="role">
                            </div>
                            <div class="text-center">
                                <button type="submit">Lưu</button>
                            </div>
                            @csrf
                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Contact Us Section -->
    </main>
@endsection
