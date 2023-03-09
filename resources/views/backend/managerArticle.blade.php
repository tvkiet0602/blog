@extends('backend.layouts.master')
@section('title')
    Article
@endsection
<style>
    .paginate {
        text-align: right;
    }
</style>
@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Quản lý bài viết</h1>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Bảng thông tin bài viết</h5>

                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Bài viết gần nhất</th>
                                    <th scope="col">Người tạo</th>
                                    <th scope="col">Thời gian tạo</th>
                                    <th scope="col">Bình luận</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($article as $key => $items)
                                    <tr>
                                        <th>{{$key ++}}</th>
                                        <td>{{$items->title}}</td>
                                        <td>{{$items->users->fullname}}</td>
                                        <td>{{$items->created_at}}</td>
                                        <td>{{$count}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="false">
                                                    Cập nhật
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item"
                                                       href="{{route('detail', ['id' => $items->id])}}">Xem chi tiết</a>
                                                    @can('edit-article')
                                                        <a class="dropdown-item" href="{{route('edit-article', ['id' => $items->id])}}">Chỉnh sửa</a>
                                                    @endcan
                                                    <a onclick="return confirm('Bạn có chắc chắn muốn xóa bài viết {{$items->title}}?')"
                                                       class="dropdown-item"
                                                       href="{{route('delete-article', ['id' => $items->id])}}">Xóa</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            <div class="paginate">
                                {{$article->links()}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
            integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
@endsection
