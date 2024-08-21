@extends('layouts.frontend')
@section('frontendContent')
<!-- ==========Banner-Section========== -->
<section class="banner-section">
    <div class="banner-bg bg_img bg-fixed" data-background="/frontend/assets/images/banner/banner02.jpg"></div>
    <div class="container">
        <div class="banner-content">
            <h1 class="title bold">NHẬN VÉ XEM <span class="color-theme">PHIM</span></h1>
            <p>Mua vé xem phim trước, tìm giờ chiếu phim, xem đoạn giới thiệu, đọc bài đánh giá phim và nhiều hơn nữa.</p>
        </div>
    </div>
</section>
<!-- ==========Banner-Section========== -->

<!-- ==========Ticket-Search========== -->
@include('frontend.component.movie-grid.search-ticket')
<!-- ==========Ticket-Search========== -->

<!-- ==========Movie-Section========== -->
<section class="movie-section padding-top padding-bottom">
    <div class="container">
        <div class="row flex-wrap-reverse justify-content-center">

            @include('frontend.component.movie-grid.widget-1')

            @include('frontend.component.movie-grid.filter-tab')

        </div>
    </div>
</section>
<!-- ==========Movie-Section========== -->
@endsection