<div class="main">
    <nav class="navbar navbar-expand navbar-light navbar-bg">
        <a class="sidebar-toggle js-sidebar-toggle">
            <i class="hamburger align-self-center"></i>
        </a>

        <div class="navbar-collapse collapse">
            <ul class="navbar-nav navbar-align">
                <li class="nav-item dropdown">
                    <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                        <i class="align-middle" data-feather="settings"></i>
                    </a>

                    <a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                        <img src="<?= base_url('assets/img/profile/' . $user['image']); ?>" class="avatar img-fluid rounded-circle me-1" /> <span class="text-dark"><?= $user['nama'] ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end">
                        <a class="dropdown-item" href="<?= base_url('Profile'); ?>"><i class="align-middle me-2" data-feather="user"></i>My Profile</a>
                        <a class="dropdown-item" href="<?= base_url('Password'); ?>"><i class="align-middle me-2" data-feather="lock"></i>Password</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?= base_url('auth/logout'); ?>"><i class="align-middle me-2" data-feather="log-out"></i>Log out</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>