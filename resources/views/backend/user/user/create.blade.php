@extends('layouts.backend')
@section('adminContent')
@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('user.store') }}" method="post" class="box" enctype="multipart/form-data">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Nhập thông tin chung của người sử dụng</p>
                        <p>Lưu ý: Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Email <span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" name="email" value="{{ old('email') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Tên người dùng<span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>

                        </div>
                        <div class="row mb15">

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ảnh đại diện </label>

                                    <div class="row">
                                        <div class="col-lg-9">
                                            <input type="file" name="image" value="{{ old('image') }}"
                                                class="form-control" placeholder="" autocomplete="off" onchange="previewImage(event)">
                                        </div>
                                        <div class="col-lg-3">
                                            <img id="preview-image" src="" alt="Ảnh đại diện" width="50px">
                                        </div>
                                    </div>
                                    <script>
                                        function previewImage(event) {
                                            const input = event.target;
                                            const reader = new FileReader();
                                            reader.onload = function() {
                                                const preview = document.getElementById('preview-image');
                                                preview.src = reader.result;
                                            };
                                            if (input.files && input.files[0]) {
                                                reader.readAsDataURL(input.files[0]);
                                            }
                                        }
                                    </script>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ngày sinh </label>
                                    <input type="date" name="birthday"
                                        value="{{ old('birthday', isset($user->birthday) ? date('Y-m-d', strtotime($user->birthday)) : '') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>

                        </div>

                        <div class="row mb15">

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Mật khẩu <span
                                            class="text-danger">(*)</span></label>
                                    <input type="password" name="password" value="{{ old('password') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Xác nhận mật khẩu <span
                                            class="text-danger">(*)</span></label>
                                    <input type="password" name="re_password" value="{{ old('re_password') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin liên hệ</div>
                    <div class="panel-description">Nhập thông tin liên hệ của người sử dụng</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">

                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Số điện thoại <span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" name="phone"
                                        value="{{ old('phone') }}" class="form-control"
                                        placeholder="" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Địa chỉ </label>
                                    <input type="text" name="address"
                                        value="{{ old('address') }}" class="form-control"
                                        placeholder="" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-right mb15">
            <button class="btn btn-primary" type="submit" name="send" value="send">Lưu lại</button>
        </div>
    </div>
</form>

@endsection