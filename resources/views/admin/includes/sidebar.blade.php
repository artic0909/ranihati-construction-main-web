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
        <!-- Dashboard -->
        <li class="menu-item {{ Request::routeIs('admin.dashboard') ? 'active' : '' }}">
            <a href="{{ route('admin.dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Dashboard">Dashboard</div>
            </a>
        </li>

        <!-- Requests Section -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Requests</span>
        </li>
        
        <li class="menu-item">
            <a href="" class="menu-link">
                <i class='menu-icon tf-icons bx bx-timer'></i>
                <div data-i18n="Classes">Pending Requests</div>
            </a>
        </li>

        <!-- Profile Section -->
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