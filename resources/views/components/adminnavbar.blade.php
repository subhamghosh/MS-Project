<nav class="navbar navbar-expand-md navbar-inverse fixed-top bg-dark">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'Laravel') }}
                    </a>
					
					
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
						<li><a class="nav-link" href="/admin">Home <span class="sr-only">(current)</span></a></li>
						<li><a class="nav-link" href="/news">Campus News <span class="sr-only">(current)</span></a></li>
						<li><a class="nav-link" href="/forums">Forum <span class="sr-only">(current)</span></a></li>
						<li><a class="nav-link" href="/about">AboutUs <span class="sr-only">(current)</span></a></li>
						
                    </ul>
					

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
					
						
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
							<li><a href="/admin"><i class="fa fa-adn" style="color:red"></i></a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu" >
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();" style="color:red">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
									
                                </ul>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>