@extends('backend.layouts.master')
@section('title')
    Dashboard
@endsection
@section('main')
    <main id="main">
    <!-- ======= About Section ======= -->
    <section id="about" class="about">
        <div class="container">
            <div class="row justify-content-end">
                <div class="col-lg-11">
                    <div class="row justify-content-end">
                        <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                            <div class="count-box py-5">
                                <i class="bi bi-emoji-smile"></i>
                                <span data-purecounter-start="0" data-purecounter-end="65" class="purecounter">0</span>
                                <p>Người dùng</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                            <div class="count-box py-5">
                                <i class="bi bi-journal-richtext"></i>
                                <span data-purecounter-start="0" data-purecounter-end="85" class="purecounter">0</span>
                                <p>Bài viết</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                            <div class="count-box pb-5 pt-0 pt-lg-5">
                                <i class="bi bi-hand-index"></i>
                                <span data-purecounter-start="0" data-purecounter-end="27" class="purecounter">0</span>
                                <p>Quyền & Vai trò</p>
                            </div>
                        </div>

                        <div class="col-lg-3 col-md-5 col-6 d-md-flex align-items-md-stretch">
                            <div class="count-box pb-5 pt-0 pt-lg-5">
                                <i class="bi bi-pencil-square"></i>
                                <span data-purecounter-start="0" data-purecounter-end="22" class="purecounter">0</span>
                                <p>Lượt bình luận</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->
    </main>
@endsection
