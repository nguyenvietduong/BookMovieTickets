@extends('layouts.backend')
@section('adminContent')
    @include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['delete']['title']])

    <form action="{{ route('showtime.destroy', $showtime->id) }}" method="post" class="box">
        @csrf
        @method('DELETE')
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-5">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin chung</div>
                        <div class="panel-description">
                            <p>Bạn đang muốn xóa lịch chiếu phim là: <span
                                    class="text-danger">{{ $showtime->start_timestamp }}</span></p>
                            <p>Lưu ý: Không thể khôi phục sau khi xóa. Hãy chắc chắn bạn muốn thực hiện chức
                                năng này</p>
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
                                        <input type="text" name="start_timestamp"
                                            value="{{ old('start_timestamp', $showtime->start_timestamp ?? '') }}" class="form-control"
                                            placeholder="" autocomplete="off" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-row mb20">
                                        <label for="" class="control-label text-left">Thời gian kết thúc <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" name="end_time"
                                            value="{{ old('end_time', $showtime->end_time ?? '') }}" class="form-control"
                                            placeholder="" autocomplete="off" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Phim <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" name="movie_id"
                                            value="{{ old('movie_id', $showtime->movie->name ?? '') }}" class="form-control"
                                            placeholder="" autocomplete="off" readonly>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Phòng chiếu <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" name="screen"
                                            value="{{ old('screen', $showtime->screen->name ?? '') }}" class="form-control"
                                            placeholder="" autocomplete="off" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-right mb15">
                <button class="btn btn-danger" type="submit" name="send" value="send">Xóa dữ liệu</button>
            </div>
        </div>
    </form>
@endsection
