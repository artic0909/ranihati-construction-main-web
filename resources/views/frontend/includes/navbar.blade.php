        <div class="nav-bar">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="{{ route('home') }}" class="nav-item nav-link {{ Request::routeIs('home') ? 'active' : '' }}">Home</a>
                            <a href="{{ route('services') }}" class="nav-item nav-link {{ Request::routeIs('services') ? 'active' : '' }}">Products & Services</a>
                            <a href="{{ route('mission') }}" class="nav-item nav-link {{ Request::routeIs('mission') ? 'active' : '' }}">Mission & Vision</a>
                            <a href="{{ route('careers') }}" class="nav-item nav-link {{ Request::routeIs('careers') ? 'active' : '' }}">Careers</a>
                            <a href="{{ route('blogs') }}" class="nav-item nav-link {{ Request::routeIs('blogs') ? 'active' : '' }}">Blogs</a>
                            <a href="{{ route('contact') }}" class="nav-item nav-link {{ Request::routeIs('contact') ? 'active' : '' }}">Contact US</a>
                            <a href="https://maps.app.goo.gl/Sa3edA8FfJDtGxZj9" target="_blank"
                                class="nav-item nav-link" id="floating-little-location-and-blink-orange-white"><i
                                    class="fa-solid fa-location-dot" style="font-size:20px;"></i></a>
                            <!-- <div class="nav-item dropdown">
                                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                                    <div class="dropdown-menu">
                                        <a href="blog.html" class="dropdown-item">Blog Page</a>
                                        <a href="single.html" class="dropdown-item">Single Page</a>
                                    </div>
                                </div> -->
                        </div>
                        <div class="ml-auto">
                            <a class="btn" href="#">OUR BROCHURE <i class="fa-solid fa-up-right-from-square"></i></a>
                        </div>
                    </div>
                </nav>
            </div>
        </div>