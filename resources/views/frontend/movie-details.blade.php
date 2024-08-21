@extends('layouts.frontend')
@section('frontendContent')
<!-- ==========Banner-Section========== -->
<section class="details-banner bg_img" data-background="https://phimimg.com/upload/vod/20231016-1/6a45585d457b3d77e91cbe7757f28c94.jpg">
    <div class="container">
        <div class="details-banner-wrapper">

            @include('frontend.component.movie-detail.details-banner-thumb')

            @include('frontend.component.movie-detail.details-banner-content')
        </div>

    </div>
</section>
<!-- ==========Banner-Section========== -->

<!-- ==========Book-Section========== -->
@include('frontend.component.movie-detail.book-section')
<!-- ==========Book-Section========== -->

<!-- ==========Movie-Section========== -->
<section class="movie-details-section padding-top padding-bottom">
    <div class="container">
        <div class="row justify-content-center flex-wrap-reverse mb--50">
            <div class="col-lg-3 col-sm-10 col-md-6 mb-50">
                <div class="widget-1 widget-tags">
                    <ul>
                        <li>
                            <a href="#0">2D</a>
                        </li>
                        <li>
                            <a href="#0">imax 2D</a>
                        </li>
                        <li>
                            <a href="#0">4DX</a>
                        </li>
                    </ul>
                </div>
                @include('frontend.component.movie-detail.widget-1')
            </div>

            <div class="col-lg-9 mb-50">
                <div class="movie-details">
                    <h3 class="title">photos</h3>

                    @include('frontend.component.movie-detail.details-photos')

                    <div class="tab summery-review">
                        <ul class="tab-menu">
                            <li class="active">
                                summery
                            </li>
                            <li>
                                user review <span>147</span>
                            </li>
                        </ul>
                        <div class="tab-area">

                            @include('frontend.component.movie-detail.description')

                            @include('frontend.component.movie-detail.comment')

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ==========Movie-Section========== -->
@endsection