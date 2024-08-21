@extends('layouts.backend')
@section('adminContent')
@include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('movie.update', $movie->id) }}" method="post" class="box">
        @csrf
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-9">
                    <div class="ibox">
                        <div class="ibox-title">
                            <h5>Thông tin bài viết</h5>
                        </div>
                        <div class="ibox-content">
                            @include('backend.movie.component.content')
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    @include('backend.movie.component.aside')
                </div>
            </div>
            @include('backend.dashboard.component.button')
        </div>
    </form>


@endsection