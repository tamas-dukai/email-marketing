<header class="header">

    <div class="container">
        <div class="header-main">
            <div class="logo">
                <a href="#">Logo</a>
            </div>

            <div class="mobile-menu-toggle">
                <span></span>
            </div>
            <div class="menu-overlay"></div>

             <!-- Nav menu starts -->
             <nav class="nav-menu">
                 <div class="close-mobile-menu">
                     <img src="{{ asset('public/assets/frontend/images/close.svg') }}" alt="Close menu">
                 </div>
                 <ul class="menu">
                     <li class="menu-item">
                         <a href="{{ url('/') }}" data-toggle="sub-menu">Home</i></a>
                     </li>
                     <li class="menu-item">
                        <a href="#subscribe">Newsletter</a>
                    </li>
                    <li class="menu-item">
                        <a href="#contact">Contact</a>
                    </li>
                    <li class="menu-item">
                        @guest
                            <a href="{{ route('login') }}">Sign in</a>
                        @else 
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @endguest
                    </li>
                 </ul>
             </nav>
             <!-- Nav menu ends -->
        </div>
    </div>

</header>

<div class="wrapper">
