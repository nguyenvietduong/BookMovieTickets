@extends('layouts.backend')
@section('adminContent')
@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['edit']['title']])
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{ route('actor.update', $actor->id) }}" method="post" class="box" enctype="multipart/form-data">
    @csrf
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-5">
                <div class="panel-head">
                    <div class="panel-title">Thông tin chung</div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="ibox">
                    <div class="ibox-content">
                        <div class="row mb15">
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Tên diễn viên <span
                                            class="text-danger">(*)</span></label>
                                    <input type="text" name="name" value="{{ old('name', $actor->name ?? '') }}"
                                        class="form-control" placeholder="" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-row">
                                    <label for="" class="control-label text-left">Ảnh đại diện</label>
                                    <div class="row">
                                        <div class="col-lg-9">
                                            <input type="file" name="image" value="{{ old('image', $actor->image ?? '') }}"
                                                class="form-control" placeholder="" autocomplete="off" onchange="previewImage(event)">
                                        </div>
                                        <div class="col-lg-3">
                                            <img id="preview-image" src="{{ Storage::url($actor->image) }}" alt="Ảnh đại diện" width="50px">
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