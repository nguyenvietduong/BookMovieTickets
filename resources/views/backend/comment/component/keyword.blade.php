<div class="uk-search uk-flex uk-flex-middle mr10">
    <div class="input-group">
        <input type="text" name="content" value="{{ request('content') ?: old('content') }}"
            placeholder="{{ config('apps.setup.searchInput') }}" class="form-control">
        <span class="input-group-btn">
            <button type="submit" name="content" value="search"
                class="btn btn-primary mb0 btn-sm">{{ config('apps.setup.search') }}
            </button>
        </span>
    </div>
</div>
