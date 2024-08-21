@extends('layouts.backend')
@section('adminContent')
@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['delete']['title']])

<form action="{{ route('review.destroy', $review->id) }}" method="post" class="box">
    @csrf
    @method('DELETE')
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                    <div class="panel-description">
                        <p>Bạn đang muốn xóa bình luận phim của: <span
                                class="text-danger">{{ $review->user->name }}</span></p>
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
                                <div class="form-row mb20">
                                    <label for="" class="control-label text-left">Phim <span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" name="movie_id"
                                        value="{{ old('movie_id', $review->movie->name ?? '') }}" class="form-control"
                                        placeholder="" autocomplete="off" readonly>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row mb20">
                                    <label for="" class="control-label text-left">Điểm số <span
                                            class="text-danger">(*)</span></label>
                                    <input type="number" name="rating"
                                        value="{{ old('rating', $review->rating ?? '') }}" class="form-control"
                                        placeholder="" autocomplete="off" readonly>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-row mb20">
                                    <label for="" class="control-label text-left">Nội dung bình luận <span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" name="comment"
                                        value="{{ old('comment', $review->comment ?? '') }}" class="form-control"
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