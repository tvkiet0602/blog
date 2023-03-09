@extends('backend.layouts.master')
@section('title')
    Comments
@endsection
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
                                    <th scope="col">Bài viết</th>
                                    <th scope="col">Thời gian tạo</th>
                                    <th scope="col">Bình luận</th>
                                    <th scope="col" colspan="2">Duyệt</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($cmt as $key => $items)
                                    @if($items->check == 0)

                                        <tr>
                                            <th>  {{$key +1 }}</th>
                                            <td>{{$items->posts->title}}</td>
                                            <td>{{$items->created_at}}</td>
                                            <td>{{$items->content}}</td>
                                            <td>
                                                <a class="dropdown-item"
                                                   onclick="return confirm('Bạn có chắc chắn muốn TỪ CHỐI kiểm duyệt cho bình luận này?')"
                                                   href="{{route('comment-check-del', ['id' => $items->id])}}"><i
                                                        class="bi bi-x-circle-fill"></i></a>
                                            </td>
                                            <td>
                                                <a class="dropdown-item"
                                                   href="{{route('comment-check-up', ['id' => $items->id])}}"><i
                                                        class="bi bi-check-square-fill"></i></a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach

                                </tbody>
                            </table>
                            <div class="paginate">
                                {{$cmt->links()}}
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
