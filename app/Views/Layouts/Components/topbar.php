<nav class="navbar navbar-expand navbar-light bg-dark topbar mb-4 static-top shadow">
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
    </button>
    <ul class="navbar-nav ml-auto">
        <div class="topbar-divider d-none d-sm-block"></div>
        <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="fasle">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php //echo user()->username?></span>
                <img class="img-profile rounded-circle"
                    src="<?= base_url('assets/img/undraw_profile.svg')?>">
        </a>
        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
            aria-labellebdy="userDropdown">
            <a class="dropdown-item" href="/logout" data-toggle="modal" data-target="#logoutModal">
                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-grey-400"></i>
                Logout
            </a>
        </div>
        </li>
    </ul>
</nav>