<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Aug 2024 16:45:20 GMT -->

<head>
    @include('frontend.component.head')
</head>

<body>
    <!-- ==========Preloader========== -->
    @include('frontend.component.preloader')
    <!-- ==========Preloader========== -->

    <!-- ==========Overlay========== -->
    @include('frontend.component.overlay')
    <!-- ==========Overlay========== -->

    <!-- ==========Header-Section========== -->
    @include('frontend.component.header-section')
    <!-- ==========Header-Section========== -->

    <!-- ==========Movie-Main-Section========== -->
    <main>
        @yield('frontendContent')
    </main>
    <!-- ==========Movie-Main-Section========== -->

    <!-- ==========Newslater-Section========== -->
    @include('frontend.component.footer-section')
    <!-- ==========Newslater-Section========== -->



    <!-- =================Script============== -->
    @include('frontend.component.script')
    <!-- =================Script============== -->
</body>


<!-- Mirrored from pixner.net/boleto/demo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 05 Aug 2024 16:45:21 GMT -->

</html>