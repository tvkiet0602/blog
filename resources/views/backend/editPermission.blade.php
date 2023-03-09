@extends('backend.layouts.master')
@section('title')
    Permission - Edit
@endsection
@section('main')
    <main id="main" class="main">
        <form method="POST">
            <label class="col-sm-2 col-form-label">Phân quyền cho vai trò: </label>
            @foreach($permission as $items)
                <div class="row mb-5">
                    <div class="col-sm-5">
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="flexSwitchCheckDefault" name="permission_id" >

                                    @php
                                    $ischecked = false;
                                        foreach ($role->permissions as $key) {
                                            if($key->name == $items->name){
                                                $ischecked = true;
                                                break;
                                            }
                                        }
                                    @endphp

                                    <input class="form-check-input"
                                           type="checkbox" id="flexSwitchCheckDefault"
                                           name="permission_id[]"
                                           value="{{$items->id}}"
                                           @php
                                               if ($ischecked) {
                                                    echo 'checked';
                                               } @endphp
                                    >


                            <label class="form-check-label" for="flexSwitchCheckDefault">{{$items->name}}</label>
                        </div>
                    </div>
                </div>
            @endforeach
            <button type="submit" class="btn btn-primary">Lưu thay đổi</button>
            <a href="{{route('permission-manager')}}" class="btn btn-secondary">Hủy</a>
            @csrf
        </form>
    </main>

@endsection
