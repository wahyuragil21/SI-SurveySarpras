<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background-color: #006778;">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
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
            <img src="<?php echo base_url() ?>assets/dist/img/user1-128x128.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Mahasiswa</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2" style="background-color: #2C3531;">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= base_url('dashboard_user') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'dashboard_user') echo 'active' ?>">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-university"></i>
                <p>
                  Profil Jurusan
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= base_url('Struktur') ?>" class="nav-link">
                    <i class="fas fa-sitemap nav-icon"></i>
                    <p>Struktur Organisasi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('Mi') ?>" class="nav-link">
                    <i class="fas fa-graduation-cap nav-icon"></i>
                    <p>Manajemen Informatika</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('Si') ?>" class="nav-link">
                    <i class="fas fa-graduation-cap nav-icon"></i>
                    <p>Sistem Informasi</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= base_url('Galeri') ?>" class="nav-link">
                    <i class="fas fa-graduation-cap nav-icon"></i>
                    <p>Galeri</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('isi_kuesioner') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'isi_kuesioner') echo 'active' ?>">
                <i class="fas fa-calendar-alt nav-icon"></i>
                <p>Isi Kuesioner</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('diagram_hasil_mhs') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'diagram_hasil_mhs') echo 'active' ?>">
                <i class="fas fa-book nav-icon"></i>
                <p>Hasil Survei</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('ubah_pass') ?>" class="nav-link <?php if ($this->uri->segment(1) == 'ubah_pass') echo 'active' ?>">
                <i class="fas fa-key nav-icon"></i>
                <p>Ganti Password</p>
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