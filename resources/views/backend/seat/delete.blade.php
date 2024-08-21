@extends('layouts.backend')
@section('adminContent')
@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['delete']['title']])

<form action="{{ route('seat.destroy', $seat->id) }}" method="post" class="box">
    @csrf
    @method('DELETE')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Bạn đang muốn xóa ghế có tên là: <span
                                class="text-danger">{{ $seat->seat_number }}</span></p>
                        <p>Lưu ý: Không thể khôi phục sau khi xóa. Hãy chắc chắn bạn muốn thực hiện chức
                            năng này</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-12">
                                <div class="form-row">
                                    <input type="hidden" name="screen_id" value="{{ $seat->screen_id }}">
                                    <label for="" class="control-label text-left">Tên Ghế <span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" name="seat_number"
                                        value="{{ old('seat_number', $seat->seat_number ?? '') }}" class="form-control"
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