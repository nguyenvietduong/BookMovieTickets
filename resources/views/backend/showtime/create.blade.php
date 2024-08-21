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
<form action="{{ route('showtime.store') }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Nhập thông tin chung của lịch chiếu phim</p>
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
                                    <label for="" class="control-label text-left">Thời gian bắt đầu <span
                                            class="text-danger">(*)</span></label>
                                    <input type="datetime-local" name="start_timestamp" value="{{ old('start_timestamp') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row mb20">
                                    <label for="" class="control-label text-left">Thời gian kết thúc <span
                                            class="text-danger">(*)</span></label>
                                    <input type="datetime-local" name="end_time" value="{{ old('end_time') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-row mb20">
                                    <label for="" class="control-label text-left">Chọn phim chiếu <span
                                            class="text-danger">(*)</span></label>
                                    <select name="movie_id" class="form-control setupSelect2" id="">
                                        @foreach ($movies as $key)
                                        <option {{ $key->id == old('movie_id') ? 'selected' : "" }} value="{{ $key->id }}">
                                            {{ $key->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row mb20">
                                    <label for="" class="control-label text-left">Chọn phòng chiếu <span
                                            class="text-danger">(*)</span></label>
                                    <select name="screen_id" class="form-control setupSelect2" id="">
                                        @foreach ($screens as $key)
                                        <option {{ $key->id == old('screen_id') ? 'selected' : "" }} value="{{ $key->id }}">
                                            {{ $key->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row mb20">
                                    <label for="" class="control-label text-left">Giá tiền <span
                                            class="text-danger">(*)</span></label>
                                    <input type="number" name="price" value="{{ old('price') }}"
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