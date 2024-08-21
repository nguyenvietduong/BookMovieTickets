@if (!isset($offTitle))
<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-left">Tên phim <span
                    class="text-danger">(*)</span></label>
            <input type="text" name="name" value="{{ old('name', $movie->name ?? '') }}" class="form-control"
                placeholder="" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
        </div>
    </div>
</div>
@endif

@if (!isset($offCanonical))
<div class="row mb30">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-left">Đường dẫn<span
                    class="text-danger">(*)</span></label>
            <input type="text" name="slug" value="{{ old('slug', $movie->slug ?? '') }}"
                class="form-control inputSlug" placeholder="" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
        </div>
    </div>
</div>
@endif

@if (!isset($offTitle))
<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-left">Tên phim gốc <span
                    class="text-danger">(*)</span></label>
            <input type="text" name="origin_name" value="{{ old('origin_name', $movie->origin_name ?? '') }}" class="form-control"
                placeholder="" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
        </div>
    </div>
</div>
@endif

<div class="row mb30">
    <div class="col-lg-12">
        <div class="form-row">
            <label for=""
                class="control-label text-left">Nội dung phim <span
                    class="text-danger">(*)</span></label>
            <textarea name="content" class="custom-area form-control" {{ isset($disabled) ? 'disabled' : '' }}
                data-height="100">{{ old('content', $movie->content ?? '') }}</textarea>
        </div>
    </div>
</div>

@if (!isset($offTitle))
<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-left">Poster_Url <span
                    class="text-danger">(*)</span></label>
            <div class="row mb-2">
                <div class="col-lg-9">
                    <input type="text" name="poster_url_text" value="{{ old('poster_url_text', $movie->poster_url ?? '') }}" class="form-control"
                        placeholder="" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
                </div>
                <div class="col-lg-3">
                    <input type="file" name="poster_url_file" id="" placeholder="poster_url">
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if (!isset($offTitle))
<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-left">Thumb_Url <span
                    class="text-danger">(*)</span></label>
            <div class="row mb-2">
                <div class="col-lg-9">
                    <input type="text" name="thumb_url_text" value="{{ old('thumb_url_text', $movie->thumb_url ?? '') }}" class="form-control"
                        placeholder="" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
                </div>
                <div class="col-lg-3">
                    <input type="file" name="thumb_url_file" id="" placeholder="thumb_url">
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if (!isset($offTitle))
<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row">
            <label for="" class="control-label text-left">Trailer_Url <span
                    class="text-danger">(*)</span></label>

            <div class="row mb-2">
                <div class="col-lg-9">
                    <input type="text" name="trailer_url_text" value="{{ old('trailer_url_text', $movie->trailer_url ?? '') }}" class="form-control"
                        placeholder="" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
                </div>
                <div class="col-lg-3">
                    <input type="file" name="trailer_url_file" id="" placeholder="Trailer_Url">
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@if (!isset($offTitle))
<div class="row mb15">
    <div class="col-lg-12">
        <div class="form-row mb-5">
            <label for="" class="control-label text-left">Album_Url <span class="text-danger">(*)</span>
                <button type="button" class="btn btn-success" id="add-image-btn">Thêm ảnh</button>
            </label>
            <div id="image-input-container">
                <div class="row mb-2">
                    <div class="col-lg-9">
                        <input type="file" name="album_url[]" value="{{ old('album_url[]') }}" class="form-control" autocomplete="off" onchange="previewImage(event)">
                    </div>
                    <div class="col-lg-3">
                        <img src="{{ old('album_url[1]') }}" alt="Album phim" class="preview-image" width="50px">
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endif
<script>
    document.getElementById('add-image-btn').addEventListener('click', function() {
        const newRow = document.createElement('div');
        newRow.classList.add('row', 'mb-5');

        newRow.innerHTML = `
            <div class="col-lg-9">
                <input type="file" name="album_url[]" class="form-control" autocomplete="off" onchange="previewImage(event)">
            </div>
            <div class="col-lg-3">
                <img src="" alt="Album phim" class="preview-image" width="50px">
            </div>
        `;

        document.getElementById('image-input-container').appendChild(newRow);
    });

    function previewImage(event) {
        const input = event.target;
        const reader = new FileReader();
        reader.onload = function() {
            const previewImage = input.closest('.row').querySelector('.preview-image');
            previewImage.src = reader.result;
        };
        if (input.files && input.files[0]) {
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>

@if (!isset($offTitle))
<div class="row mb15">
    <div class="col-lg-4">
        <div class="form-row">
            <label for="" class="control-label text-left">Bản quyền <span class="text-danger">(*)</span></label>
            <select name="is_copyright" id="" class="form-control setupSelect2 ml10">
                <option value="1" {{ old('is_copyright') == '1' ? 'selected' : '' }}
                    @if (isset($movie))
                    {{ $movie->is_copyright == '1' ? 'selected' : '' }}
                    @endif>Có</option>

                <option value="0" {{ old('is_copyright') == '0' ? 'selected' : '' }}
                    @if (isset($movie))
                    {{ $movie->is_copyright == '0' ? 'selected' : '' }}
                    @endif>Không</option>
            </select>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-row">
            <label for="" class="control-label text-left">Dịch thuật <span class="text-danger">(*)</span></label>
            <select name="sub_docquyen" id="" class="form-control setupSelect2 ml10">
                <option value="1" {{ old('sub_docquyen') == '1' ? 'selected' : '' }}
                    @if (isset($movie))
                    {{ $movie->sub_docquyen == '1' ? 'selected' : '' }}
                    @endif>Có</option>

                <option value="0" {{ old('sub_docquyen') == '0' ? 'selected' : '' }}
                    @if (isset($movie))
                    {{ $movie->sub_docquyen == '0' ? 'selected' : '' }}
                    @endif>Không</option>
            </select>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-row">
            <label for="" class="control-label text-left">Chiếu rạp <span class="text-danger">(*)</span></label>
            <select name="chieurap" id="" class="form-control setupSelect2 ml10">
                <option value="1" {{ old('chieurap') == '1' ? 'selected' : '' }}
                    @if (isset($movie))
                    {{ $movie->chieurap == '1' ? 'selected' : '' }}
                    @endif>Có</option>

                <option value="0" {{ old('chieurap') == '0' ? 'selected' : '' }}
                    @if (isset($movie))
                    {{ $movie->chieurap == '0' ? 'selected' : '' }}
                    @endif>Không</option>
            </select>
        </div>
    </div>
</div>
@endif

@if (!isset($offTitle))
<div class="row mb15">
    <div class="col-lg-4">
        <div class="form-row">
            <label for="" class="control-label text-left">Thời gian <span class="text-danger">(*)</span></label>
            <input type="text" name="time" value="{{ old('time', $movie->time ?? '') }}" class="form-control"
                placeholder="0" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-row">
            <label for="" class="control-label text-left">Tâp hiện tại <span class="text-danger">(*)</span></label>
            <input type="text" name="episode_current" value="{{ old('episode_current', $movie->episode_current ?? '') }}" class="form-control"
                placeholder="0" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-row">
            <label for="" class="control-label text-left">Tổng số tập <span class="text-danger">(*)</span></label>
            <input type="text" name="episode_total" value="{{ old('episode_total', $movie->episode_total ?? '') }}" class="form-control"
                placeholder="0" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
        </div>
    </div>
</div>
@endif

@if (!isset($offTitle))
<div class="row mb15">
    <div class="col-lg-4">
        <div class="form-row">
            <label for="" class="control-label text-left">Chất lượng <span class="text-danger">(*)</span></label>
            <select name="quality" id="" class="form-control setupSelect2 ml10">
                <option value="" {{ old('quality') == ''        ? 'selected' : '' }}
                    @if (isset($movie))
                    {{ $movie->quality == ''        ? 'selected' : '' }}
                    @endif>Chọn chất lượng phim</option>
                <option value="FHD" {{ old('quality') == 'FHD'  ? 'selected' : '' }}
                    @if (isset($movie))
                    {{ $movie->quality == 'FHD'     ? 'selected' : '' }}
                    @endif>Full HD</option>
                <option value="HD" {{ old('quality') == 'HD'    ? 'selected' : '' }}
                    @if (isset($movie))
                    {{ $movie->quality == 'HD'      ? 'selected' : '' }}
                    @endif>HD</option>
            </select>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-row">
            <label for="" class="control-label text-left">Ngôn ngữ <span class="text-danger">(*)</span></label>
            <input type="text" name="lang" value="{{ old('lang', $movie->lang ?? '') }}" class="form-control"
                placeholder="language" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="form-row">
            <label for="" class="control-label text-left">Năm phát hành <span class="text-danger">(*)</span></label>
            <input type="text" name="year" value="{{ old('year', $movie->year ?? '') }}" class="form-control"
                placeholder="" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
        </div>
    </div>
</div>
@endif