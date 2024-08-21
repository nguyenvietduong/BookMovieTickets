<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-lg-8">
        <h2>{{ $title }}</h2>
        <ol class="breadcrumb" style="margin-bottom:10px;">
            <li>
                <a href="{{ route('dashboard.index') }}"><strong><u>{{ config('apps.setup.web_name') }}</u></strong></a>
            </li>
            <li class="active"><strong>{{ $title }}</strong></li>
        </ol>
    </div>
</div>

