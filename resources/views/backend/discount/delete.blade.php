@extends('layouts.backend')
@section('adminContent')
    @include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['delete']['title']])

    <form action="{{ route('discount.destroy', $discount->id) }}" method="post" class="box">
        @csrf
        @method('DELETE')
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-5">
                    <div class="panel-head">
                        <div class="panel-title">Thông tin chung</div>
                        <div class="panel-description">
                            <p>Bạn đang muốn xóa mã giảm giá có mã là: {{ $discount->code }}</p>
                            <p>Lưu ý: Không thể khôi phục thành viên sau khi xóa. Hãy chắc chắn bạn muốn thực hiện chức năng
                                này</p>
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
                                        <input type="text" name="code"
                                            value="{{ old('code', $discount->code ?? '') }}" class="form-control"
                                            placeholder="" autocomplete="off" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-row">
                                        <label for="" class="control-label text-left">Số tiền giảm <span
                                                class="text-danger">(*)</span></label>
                                        <input type="text" name="amount" value="{{ old('amount', $discount->amount ?? '') }}"
                                            class="form-control" placeholder="" autocomplete="off" readonly>
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
