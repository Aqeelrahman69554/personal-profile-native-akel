<!-- Sidebar -->
<div class="sidebar" data-background-color="dark">
    <div class="sidebar-logo">
        <!-- Logo Header -->
        <div class="logo-header" data-background-color="dark">
            <a href="index.php" class="logo">
                <img
                    src="../template/admin/assets/img/kaiadmin/logo_light.svg"
                    alt="navbar brand"
                    class="navbar-brand"
                    height="20" />
            </a>
            <div class="nav-toggle">
                <button class="btn btn-toggle toggle-sidebar">
                    <i class="gg-menu-right"></i>
                </button>
                <button class="btn btn-toggle sidenav-toggler">
                    <i class="gg-menu-left"></i>
                </button>
            </div>
            <button class="topbar-toggler more">
                <i class="gg-more-vertical-alt"></i>
            </button>
        </div>
        <!-- End Logo Header -->
    </div>
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">
            <ul class="nav nav-secondary">

                <li class="nav-section">
                    <span class="sidebar-mini-icon">
                        <i class="fa fa-ellipsis-h"></i>
                    </span>
                    <h4 class="text-section">Menu</h4>
                </li>

                <li class="nav-item <?= $fitur == 'dashboard' ? 'active' : '' ?>">
                    <a href="index.php">
                        <i class="fas fa-id-card"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                <li class="nav-item <?= $fitur == 'home' ? 'active' : '' ?>">
                    <a href="index.php?fitur=home">
                        <i class="fas fa-home"></i>
                        <p>Home</p>
                    </a>
                </li>

                <li class="nav-item <?= $fitur == 'about' ? 'active' : '' ?>">
                    <a href="index.php?fitur=about">
                        <i class="fas fa-address-book"></i>
                        <p>About</p>
                    </a>
                </li>

                <li class="nav-item <?= $fitur == 'resume' ? 'active' : '' ?>">
                    <a href="index.php?fitur=resume">
                        <i class="fas fa-clipboard-list"></i>
                        <p>Resume</p>
                    </a>
                </li>

                <li class="nav-item <?= $fitur == 'stats_skills' ? 'active' : '' ?>">
                    <a href="index.php?fitur=stats_skills">
                        <i class="
fas fa-list-alt"></i>
                        <p>Statistics & Skill</p>
                    </a>
                </li>

                <li class="nav-item <?= $fitur == 'portofolio' ? 'active' : '' ?>">
                    <a href="index.php?fitur=portofolio">
                        <i class="
fas fa-stamp"></i>
                        <p>Portofolio</p>
                    </a>
                </li>

                <li class="nav-item <?= $fitur == 'service' ? 'active' : '' ?>">
                    <a href="index.php?fitur=service">
                        <i class="fab fa-servicestack"></i>
                        <p>Service & Testimonials</p>
                    </a>
                </li>

                <li class="nav-item <?= $fitur == 'contact' ? 'active' : '' ?>">
                    <a href="index.php?fitur=contact">
                        <i class="
fas fa-user-circle"></i>
                        <p>Contact</p>
                    </a>
                </li>

                <li class="nav-item <?= $fitur == 'form' ? 'active' : '' ?>">
                    <a href="index.php?fitur=form">
                        <i class="
fas fa-user-edit"></i>
                        <p>Form</p>
                    </a>
                </li>
                <hr>
                <li class="nav-item">
                    <a href="pages/login/logout.php">
                        <i class="
fas fa-door-open"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->