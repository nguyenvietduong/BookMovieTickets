<select name="type" class="form-control setupSelect2 ml10">
    @foreach (config('apps.setup.movie_types') as $key => $val)
        <option {{ old('type') == $key ? 'selected' : '' }} value="{{ $key }}">{{ $val }}</option>
    @endforeach
</select>
