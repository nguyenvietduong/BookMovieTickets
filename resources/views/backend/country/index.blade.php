@extends('layouts.backend')
@section('adminContent')
    @include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['index']['title']])
    <div class="row mt20">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>{{ $config['seo']['index']['table'] }} </h5>
                    @include('backend.dashboard.component.toolbox')
                </div>
                <div class="ibox-content">
                    @include('backend.country.component.filter')
                    @include('backend.country.component.table')
                </div>
            </div>
        </div>
    </div>
@endsection
