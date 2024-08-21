<div class="ibox w">
    <div class="ibox-title">
        <h5>Chọn thể loại phim</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="mb15">
                        <select name="category_id[]" class="form-control setupSelect2 ml10" multiple="multiple">
                            <option value="">Chọn thể loại phim</option>
                            @foreach ($categories as $val)
                            <option
                                value="{{ $val['id'] }}"
                                {{ (isset($movie) && $movie->categories->contains($val['id'])) || (old('category_id') && in_array($val['id'], old('category_id'))) ? 'selected' : '' }}>
                                {{ $val['name'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ibox w">
    <div class="ibox-title">
        <h5>Chọn quốc gia phim</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="mb15">
                        <select name="country_id[]" class="form-control setupSelect2 ml10" multiple="multiple">
                            <option value="">Chọn quốc gia phim</option>
                            @foreach ($countries as $val)
                            <option
                                value="{{ $val['id'] }}"
                                {{ (isset($movie) && $movie->countries->contains($val['id'])) || (old('country_id') && in_array($val['id'], old('country_id'))) ? 'selected' : '' }}>
                                {{ $val['name'] }}
                            </option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ibox w">
    <div class="ibox-title">
        <h5>Tên tác giả</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="mb15">
                        <input type="text" name="director" value="{{ old('director', $movie->director ?? '') }}" class="form-control"
                            placeholder="" autocomplete="off" {{ isset($disabled) ? 'disabled' : '' }}>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ibox w">
    <div class="ibox-title">
        <h5>Chọn diễn viên</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="mb15">
                        <select name="actor_id[]" class="form-control setupSelect2 ml10" multiple="multiple">
                            <option value="">Chọn diễn viên</option>
                            @foreach ($actors as $val)
                            <option
                                value="{{ $val['id'] }}"
                                {{ (isset($movie) && $movie->actors->contains($val['id'])) || (old('actor_id') && in_array($val['id'], old('actor_id'))) ? 'selected' : '' }}>
                                {{ $val['name'] }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ibox w">
    <div class="ibox-title">
        <h5>Chọn loại phim</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="mb15">
                        <select name="type" class="form-control setupSelect2" id="">
                            @foreach (config('apps.setup.movie_types') as $key => $val)
                            <option value="{{ $key }}" {{ $key == old('type', isset($movie->type) ? $movie->type : '') ? 'selected' : '' }}>
                                {{ $val }}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="ibox w">
    <div class="ibox-title">
        <h5>Chọn tình trạng</h5>
    </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-lg-12">
                <div class="form-row">
                    <div class="mb15">
                        <select name="status" class="form-control setupSelect2" id="">
                            @foreach (config('apps.setup.movie_status') as $key => $val)
                            <option {{ $key == old('status', isset($movie->status ) ? $movie->status  : '') ? 'selected' : '' }} value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>