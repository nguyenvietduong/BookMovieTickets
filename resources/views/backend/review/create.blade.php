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
<form action="{{ route('review.store') }}" method="post" class="box">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Nhập thông tin chung của bình luận phim</p>
                        <p>Lưu ý: Những trường đánh dấu <span class="text-danger">(*)</span> là bắt buộc</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">

                            <div class="col-lg-12">
                                <div class="form-row mb20">
                                    <label for="" class="control-label text-left">Chọn phim bình luận <span
                                            class="text-danger">(*)</span></label>
                                    <select name="movie_id" class="form-control setupSelect2" id="">
                                        <option value="" selected>Chọn phim bình luận</option>
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
                                    <label for="" class="control-label text-left">Chọn người bình luận <span
                                            class="text-danger">(*)</span></label>
                                    <select name="user_id" class="form-control setupSelect2" id="">
                                        <option value="" selected>Chọn người bình luận</option>
                                        @foreach ($users as $key)
                                        <option {{ $key->id == old('user_id') ? 'selected' : "" }} value="{{ $key->id }}">
                                            {{ $key->name }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row mb20">
                                    <label for="" class="control-label text-left">Điểm đánh giá <span
                                            class="text-danger">(*)</span></label>
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <input type="range" name="rating" class="form-range" min="0" max="5" step="0.5" id="customRange3" value="{{ old('rating', 2.5) }}">
                                        </div>
                                        <div class="col-lg-3">
                                            <b><span id="ratingValue">{{ old('rating', 2.5) }}</span>/5</b>
                                        </div>
                                    </div>
                                    <script>
                                        const ratingInput = document.getElementById('customRange3');
                                        const ratingValue = document.getElementById('ratingValue');

                                        // Cập nhật giá trị ban đầu
                                        ratingValue.textContent = ratingInput.value;

                                        // Lắng nghe sự kiện 'input' để cập nhật giá trị khi người dùng di chuyển slider
                                        ratingInput.addEventListener('input', function() {
                                            ratingValue.textContent = this.value;
                                        });
                                    </script>

                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-row mb20">
                                    <label for="" class="control-label text-left">Nội dung bình luận <span
                                            class="text-danger">(*)</span></label>
                                    <textarea class="form-control" name="comment" id="" rows="5">{{ old('comment') }}</textarea>
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