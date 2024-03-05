<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #006778">
      <!-- Left navbar links -->

      <ul class=" navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <li class="nav-item">
          <a class="nav-link" data-widget="navbar-search" href="#" role="button">
            <i class="fas fa-search"></i>
          </a>
          <div class="navbar-search-block">
            <form class="form-inline">
              <div class="input-group input-group-sm">
                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                  <button class="btn btn-navbar" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
            </form>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
            <i class="fas fa-expand-arrows-alt"></i>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-info elevation-4" style="background-color: #2C3531;">
      <!-- Brand Logo -->
      <a href="#" class="brand-link">
        <img src="<?php echo base_url() ?>assets/dist/img/survey2.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SI-SURVEY SARPRAS</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Admin</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2" style="background-color: #2C3531;">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('dashboard_admin') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'dashboard_admin') echo 'active' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('user') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'user') echo 'active' ?>">
                <i class="fas fa-user nav-icon"></i>
                <p>Management User</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('semester') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'semester') echo 'active' ?>">
                <i class="fas fa-tasks nav-icon"></i>
                <p>Management Pernyataan</p>
              </a>
            </li>
            <!-- <li class="nav-item">
              <a href="<?= base_url('data_master') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'data_master') echo 'active' ?>">
                <i class="fas fa-folder nav-icon"></i>
                <p>Data Master</p>
              </a>
            </li> -->
            <li class="nav-item">
              <a href="<?= base_url('diagram_hasil') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'diagram_hasil') echo 'active' ?>">
                <i class="fas fa-book nav-icon"></i>
                <p>Hasil Survei</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('login/logout') ?>" class="nav-link">
                <i class="nav-icon fas fa-power-off"></i>
                <p>
                  Logout
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>
    <!-- Main Sidebar Container -->