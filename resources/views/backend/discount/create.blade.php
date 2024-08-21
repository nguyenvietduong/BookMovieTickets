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
<form action="{{ route('discount.store') }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Nhập thông tin chung của mã giảm giá</p>
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
                                    <label for="" class="control-label text-left">Mã giảm giá <span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" name="code" value="{{ old('code') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Số tiền giảm <span
                                            class="text-danger">(*)</span></label>
                                    <input type="number" name="amount" value="{{ old('amount') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>

                        </div>

                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Số lượng tối đa có thể sử dụng <span
                                            class="text-danger">(*)</span></label>
                                    <input type="number" name="max_uses" value="{{ old('max_uses') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Số lượng hiện tại đã sử dụng <span
                                            class="text-danger">(*)</span></label>
                                    <input type="number" name="used_count" value="{{ old('used_count') ?? 0 }}"
                                        class="form-control" placeholder="" autocomplete="off" >
                                </div>
                            </div>

                        </div>

                        <div class="row mb15">

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ngày bắt đầu áp dụng <span
                                            class="text-danger">(*)</span></label>
                                    <input type="date" name="valid_from"
                                        value="{{ old('valid_from', isset($user->valid_from) ? date('Y-m-d', strtotime($user->valid_from)) : '') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ngày kết thúc áp dụng <span
                                            class="text-danger">(*)</span></label>
                                    <input type="date" name="valid_to"
                                        value="{{ old('valid_to', isset($user->valid_to) ? date('Y-m-d', strtotime($user->valid_to)) : '') }}"
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