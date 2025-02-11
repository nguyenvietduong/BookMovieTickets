<form action="{{ route('seat.index', $screen_id) }}">
    <div class="filter-wrapper">
        <div class="uk-flex uk-flex-middle uk-flex-space-between">
            @include('backend.dashboard.component.perpage')
            <div class="action">
                <div class="uk-flex uk-flex-middle">
                    <!-- @include('backend.dashboard.component.filterPublish') -->
                    @include('backend.dashboard.component.keyword')
                    <div class="uk-flex uk-flex-middle">
                        <!-- {{-- <a href="{{ route('user.catalogue.permission') }}" class="btn btn-warning mr10"><i
                                class="fa fa-key mr5"></i>Phân Quyền</a> --}} -->
                        <a href="{{ route('seat.create', $screen_id) }}" class="btn btn-danger"><i
                                class="fa fa-plus mr5"></i>{{ config('apps.messages.seat.create.title') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
