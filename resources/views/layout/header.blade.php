<body>


	<div class="site-mobile-menu site-navbar-target">
		<div class="site-mobile-menu-header">
			<div class="site-mobile-menu-close">
				<span class="icofont-close js-menu-toggle"></span>
			</div>
		</div>
		<div class="site-mobile-menu-body"></div>
	</div>

	<nav class="site-nav">
    <div class="container">
        <div class="site-navigation">

            <a href="{{ url('/') }}" class="logo m-0">
                WanderBit <span class="text">.</span>
            </a>

            {{-- DESKTOP MENU --}}
            <ul class="js-clone-nav d-none d-lg-inline-block text-left site-menu float-right">
                <li><a href="{{ url('/') }}">Home</a></li>
                  <li><a href="{{ url('about') }}">About</a></li>
                <li><a href="{{ url('blogs') }}">Blog</a></li>
                <li><a href="{{ url('services') }}">Services</a></li>
                <li><a href="{{ url('contact') }}">Contact Us</a></li>

                @auth
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit"
                                style="background:none;border:none;color:#f5c542;font-weight:600; padding-left:20px">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth

                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @endguest
            </ul>

            {{-- MOBILE TOGGLE BUTTON --}}
            <a href="#"
               class="burger ml-auto float-right site-menu-toggle js-menu-toggle d-inline-block d-lg-none light">
                <span></span>
            </a>

        </div>
    </div>
</nav>
