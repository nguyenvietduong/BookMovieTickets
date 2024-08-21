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
<form action="{{ route('screen.store') }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Nhập thông tin chung của phòng xem phim</p>
                        <p>Lưu ý: Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row mb20">
                                    <label for="" class="control-label text-left">Tên Phòng Xem Phim <span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" name="name" value="{{ old('name') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row mb20">
                                    <label for="" class="control-label text-left">Chọn Loại Phòng <span
                                            class="text-danger">(*)</span></label>
                                    <select name="screen_type" class="form-control setupSelect2" id="">
                                        @foreach (config('apps.setup.screen_type') as $key => $val)
                                        <option {{ $key == old('screen_type') }} value="{{ $key }}">
                                            {{ $val }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row mb20">
                                    <label for="" class="control-label text-left">Sức Chứa Của Phòng <span
                                            class="text-danger">(*)</span></label>
                                    <input type="number" name="seat_capacity" value="{{ old('seat_capacity') }}"
                                        class="form-control" placeholder="" autocomplete="off">
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