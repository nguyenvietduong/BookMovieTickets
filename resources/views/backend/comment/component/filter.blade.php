<form action="{{ route('comment.index') }}">
    <div class="filter-wrapper">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            @include('backend.dashboard.component.perpage')
            <div class="action">
                <div class="uk-flex uk-flex-middle">
                    <!-- @include('backend.dashboard.component.filterPublish') -->
                    @include('backend.comment.component.keyword')
                    <div class="uk-flex uk-flex-middle">
                        {{-- <a href="{{ route('user.catalogue.permission') }}" class="btn btn-warning mr10"><i
                                class="fa fa-key mr5"></i>Phân Quyền</a> --}}
                        <!-- <a href="{{ route('comment.create') }}" class="btn btn-danger"><i
                                class="fa fa-plus mr5"></i>{{ config('apps.messages.comment.create.title') }}</a> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
