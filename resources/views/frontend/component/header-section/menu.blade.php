<ul class="menu">
    <li>
        <a href="{{ route('frontend.home') }}" class="{{ request()->is('/') ? 'active' : '' }}">Trang chủ</a>
    </li>
    <li>
        <a href="#0">Thể Loại</a>
        <ul class="submenu">
            <li>
                <a href="{{ route('movie.grid', 'conan') }}" class="{{ request()->is('movie-grid') ? 'active' : '' }}">Trinh Thám</a>
            </li>
            <li>
                <a href="{{ route('movie.grid', 'conan') }}" class="{{ request()->is('movie-grid') ? 'active' : '' }}">Hài</a>
            </li>
            <li>
                <a href="{{ route('movie.grid', 'conan') }}" class="{{ request()->is('movie-grid') ? 'active' : '' }}">Gia Đình</a>
            </li>
            <li>
                <a href="{{ route('movie.grid', 'conan') }}" class="{{ request()->is('movie-grid') ? 'active' : '' }}">Hành Động</a>
            </li>
            <li>
                <a href="{{ route('movie.grid', 'conan') }}" class="{{ request()->is('movie-grid') ? 'active' : '' }}">Chính Kịch</a>
            </li>
            <li>
                <a href="{{ route('movie.grid', 'conan') }}" class="{{ request()->is('movie-grid') ? 'active' : '' }}">Kinh Dị</a>
            </li>
            <li>
                <a href="{{ route('movie.grid', 'conan') }}" class="{{ request()->is('movie-grid') ? 'active' : '' }}">Tình Cảm</a>
            </li>
            <li>
                <a href="{{ route('movie.grid', 'conan') }}" class="{{ request()->is('movie-grid') ? 'active' : '' }}">Hài Kịch</a>
            </li>
            <li>
                <a href="{{ route('movie.grid', 'conan') }}" class="{{ request()->is('movie-grid') ? 'active' : '' }}">Tâm Lý</a>
            </li>
            <li>
                <a href="{{ route('movie.grid', 'conan') }}" class="{{ request()->is('movie-grid') ? 'active' : '' }}">Khoa Học Viễn Tưởng</a>
            </li>
            <li>
                <a href="{{ route('movie.grid', 'conan') }}" class="{{ request()->is('movie-grid') ? 'active' : '' }}">Hoạt Hình</a>
            </li>
            <li>
                <a href="{{ route('movie.grid', 'conan') }}" class="{{ request()->is('movie-grid') ? 'active' : '' }}">Anime</a>
            </li>
            <li>
                <a href="{{ route('movie.grid', 'conan') }}" class="{{ request()->is('movie-grid') ? 'active' : '' }}">Thàn Thoại</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="contact.html">Phim Sắp Chiếu</a>
    </li>
    <li>
        <a href="#0">Lịch Chiếu</a>
        <ul class="submenu">
            <li>
                <a href="blog.html">Blog</a>
            </li>
            <li>
                <a href="blog-details.html">Blog Single</a>
            </li>
        </ul>
    </li>
    <li>
        <a href="{{ route('blog') }}" class="{{ request()->is('blog') ? 'active' : '' }}">Blog</a>
    </li>
    <li>
        <a href="{{ route('contact') }}" class="{{ request()->is('contact') ? 'active' : '' }}">Liên Hệ</a>
    </li>

    @include('frontend.component.header-section.auth')
</ul>