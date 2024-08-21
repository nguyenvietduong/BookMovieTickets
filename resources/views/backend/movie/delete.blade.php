@extends('layouts.backend')
@section('adminContent')
    @include('backend.dashboard.component.breadcrumb', ['title' => $config['seo']['create']['title']])
    @include('backend.dashboard.component.formError')
    <form action="{{ route('movie.destroy', $movie->id) }}" method="post" class="box">
        @include('backend.dashboard.component.destroy', ['model' => $movie])
    </form>
@endsection