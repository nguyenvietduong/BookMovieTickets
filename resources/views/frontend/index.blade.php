@extends('layouts.frontend')
@section('frontendContent')
<!-- ==========Banner-Section========== -->
@include('frontend.component.banner-section')
<!-- ==========Banner-Section========== -->

<!-- ==========Ticket-Search========== -->
@include('frontend.component.search-ticket')
<!-- ==========Ticket-Search========== -->
<section class="movie-section padding-top padding-bottom bg-two">
    <div class="container">
        <div class="row flex-wrap-reverse justify-content-center">

            @include('frontend.component.widget')

            <div class="col-lg-9">
                @include('frontend.component.home.hot-movie')
                @include('frontend.component.home.cartoon-movie')
                @include('frontend.component.home.fantasy-movie')
                @include('frontend.component.home.other-movies')
            </div>
        </div>
    </div>
</section>
@endsection