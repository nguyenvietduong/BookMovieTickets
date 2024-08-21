@if (Auth::check())
<li>
    <a href=""><b><i>{{ Auth::user()->name }}</i></b></a>
    <ul class="submenu">
        @if (Auth::check() && Auth::user()->role == 'admin')
        <li>
            <a href="about.html">Administrators</a>
        </li>
        @endif
        <li>
            <a href="about.html">Account Information</a>
        </li>
        <li>
            <form action="{{ route('logout') }}" method="post" class="mt-2 text-center">
                @csrf
                <button class="btn btn-secondary w-100">Logout</button>
            </form>
        </li>
    </ul>
</li>
@else
<li class="header-button pr-0">
    <a href="">Tham Gia</a>
</li>
@endif