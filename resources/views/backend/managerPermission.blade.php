@extends('backend.layouts.master')
@section('title')
    Dashboard
@endsection
@section('main')
    <main id="main" class="main">
        <div class="pagetitle">
            <h1>Quản lý người dùng</h1>
        </div>

        <!-- Permission - Quyền -->
        <section class="section">
            <div class="row">
                <div class="col-lg-5">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Hệ thống phân quyền</h5>
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th scope="col">STT</th>
                                    <th scope="col">Vai trò</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i = 0 ?>
                                @foreach($roles as  $role)
                                    <tr>
                                        <th>{{++$i}}</th>
                                        <td> {{$role->name}} </td>
                                        <td>
                                            @php
                                                if($role->name !== 'Admin'){
                                            @endphp
                                            <a class="dropdown-item"
                                               href="{{route('permission-edit', ['id'=>$role->id])}}"><i
                                                    class="bi bi-pencil-square"></i></a>
                                            @php
                                                }
                                                if($role->name == 'Admin'){
                                                    echo 'Full Access';
                                                }
                                            @endphp
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Role - Vai trò -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Vai trò người dùng trên hệ thống</h5>

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th scope="col">STT</th>
                                <th scope="col">Họ và tên</th>
                                <th scope="col">Username</th>
                                <th scope="col">Vai trò</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $i = 0 ?>
                            @foreach($info as  $items)
                                <tr>
                                    <th>{{ ++$i }}</th>
                                    <td>{{$items->fullname}}</td>
                                    <td>{{$items->username}}</td>
                                    <td>@foreach($items->roles as $role)
                                            {{$role->name}}
                                        @endforeach
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            </div>
        </section>
    </main>

@endsection
