
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

  <!-- Sidebar -->
  <ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
      <div class="sidebar-brand-icon rotate-n-20">
      <i class="fa fa-lock" aria-hidden="true"></i>
      </div>
      <div class="sidebar-brand-text mx-3">Halaman HRD</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item collapsed">
      <a class="nav-link" href="<?php echo base_url() ?>hrd/utama_hrd">
      <i class="fa fa-home" aria-hidden="true"></i>
        <span>Dashboard HRD</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
      Menu HRD
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fa fa-users" aria-hidden="true"></i>
        <span>Karyawan</span>
      </a>
      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
        <div class="bg-white py-2 collapse-inner rounded">
          <h6 class="collapse-header">Action</h6>
          <a class="collapse-item" href="<?php echo base_url() ?>hrd/dashboard_hrd">Data Seluruh Karyawan</a>
          <a class="collapse-item" href="<?php echo base_url() ?>hrd/dashboard_hrd/add">Tambah Karyawan</a>
        </div>
      </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo base_url() ?>hrd/kehadiran" >
      <i class="fa fa-check-square" aria-hidden="true"></i>
        <span>Kehadiran Karyawan</span>
      </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo base_url() ?>hrd/uangtransport">
      <i class="fa fa-credit-card" aria-hidden="true"></i>
        <span>Uang Transport</span>
      </a>
    </li>

    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo base_url() ?>hrd/dinas">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Data Dinas</span>
      </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
      <a class="nav-link collapsed" href="<?php echo base_url() ?>hrd/medicalreimbust">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Medical Reimburstment</span>
      </a>
    </li>

    
    <!-- Divider -->
    <hr class="sidebar-divider">

    

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  </ul>