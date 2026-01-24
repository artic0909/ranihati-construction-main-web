<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('./img/logo.png') }}" width="50px" alt="RCPL Logo" />
            </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2" style="text-transform: capitalize">RCPL</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <!-- Sidebar -->
    <ul class="menu-inner py-1">

        <li class="menu-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Page Content</span>
        </li>

        <li class="menu-item {{ Request::routeIs('admin.carousel') ? 'active' : '' }}">
            <a href="{{ route('admin.carousel') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-carousel'></i>
                <div data-i18n="Carousel">Add Carousel</div>
            </a>
        </li>

        <li class="menu-item {{ Request::routeIs('admin.work') ? 'active' : '' }}">
            <a href="{{ route('admin.work') }}" class="menu-link">
                <i class='menu-icon tf-icons bx bx-building-house'></i>
                <div data-i18n="Works">Add Works</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class='menu-icon tf-icons bx bx-package'></i>
                <div data-i18n="Projects">Add Projects</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class='menu-icon tf-icons bx bx-list-check'></i>
                <div data-i18n="Facts">Add Facts</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class='menu-icon tf-icons bx bx-info-circle'></i>
                <div data-i18n="About">Add About</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class='menu-icon tf-icons bx bx-user-voice'></i>
                <div data-i18n="Clients">Add Clients</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class='menu-icon tf-icons bx bx-question-mark'></i>
                <div data-i18n="FAQs">Add FAQs</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class='menu-icon tf-icons bx bx-message-square-dots'></i>
                <div data-i18n="Testimonials">Testimonials</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class='menu-icon tf-icons bx bx-news'></i>
                <div data-i18n="Blogs">Blogs</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Enquiry</span>
        </li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class='menu-icon tf-icons bx bx-envelope'></i>
                <div data-i18n="Enquiry">Enquiry</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class='menu-icon tf-icons bx bx-briefcase'></i>
                <div data-i18n="Job">Job Enquiry</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Profile</span>
        </li>

        <li class="menu-item">
            <a href="" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Enquiry">Profile Details</div>
            </a>
        </li>
    </ul>
</aside>