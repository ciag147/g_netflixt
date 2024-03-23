<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="{{ $initParam ?? '' }}/admin/dashboard" class="text-nowrap logo-img">
                <img src="{{ asset('img/logo.png') }}" width="180" class="ps-4" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap"><i class="ti ti-dots nav-small-cap-icon fs-4"></i> <span class="hide-menu">Trang Chủ</span></li>
                <li class="sidebar-item"><a class="sidebar-link" href="/admin/dashboard" aria-expanded="false"> <span><i class="fas fa-chart-line"></i> </span> <span class="hide-menu">DashBoard</span> </a></li>
                <li class="nav-small-cap"><i class="ti ti-dots nav-small-cap-icon fs-4"></i> <span class="hide-menu">QUẢN LÝ PHIM</span></li>
                <li class="sidebar-item"><a class="sidebar-link" href="/admin/videos" aria-expanded="false"> <span> <i class="fas fa-film"></i> </span> <span class="hide-menu">Danh sách phim</span> </a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="/admin/videos/disabled" aria-expanded="false"> <span> <i class="far fa-tv-alt"></i></i> </span> <span class="hide-menu">Phim ngừng công chiếu</span> </a></li>
                <li class="nav-small-cap"><i class="ti ti-dots nav-small-cap-icon fs-4"></i> <span class="hide-menu">QUẢN LÝ NGƯỜI DÙNG</span></li>
                <li class="sidebar-item"><a class="sidebar-link" href="/admin/users" aria-expanded="false"> <span> <i class="fas fa-users"></i> </span> <span class="hide-menu">Danh sách người dùng</span> </a></li>
                <li class="nav-small-cap"><i class="ti ti-dots nav-small-cap-icon fs-4"></i> <span class="hide-menu">BÁO CÁO - THỐNG KÊ</span></li>
                <li class="sidebar-item"><a class="sidebar-link" href="/admin/videos/liked" aria-expanded="false"> <span> <i class="fas fa-thumbs-up"></i> </span> <span class="hide-menu">Lượt thích từng phim</span> </a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="userlike" aria-expanded="false"> <span> <i class="fas fa-heart"></i> </span> <span class="hide-menu">Người dùng yêu thích</span> </a></li>
                <li class="sidebar-item"><a class="sidebar-link" href="doanhthu" aria-expanded="false"> <span> <i class="fas fa-money-bill-wave"></i> </span> <span class="hide-menu">Doanh thu</span> </a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
