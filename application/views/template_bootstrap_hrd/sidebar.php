
  <div id="wrapper">

<!-- Sidebar -->
<ul class="sidebar navbar-nav">
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <i class="fas fa-fw fa-folder"></i>
        <span>Karyawan</span>
    </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <h6 class="dropdown-header">Action</h6>
        <a class="dropdown-item" href="<?php echo base_url() ?>hrd/dashboard_hrd">Data Seluruh Karyawan</a>
        <a class="dropdown-item" href="<?php echo base_url() ?>hrd/dashboard_hrd/add">Tambah Karyawan</a>
      </div>
  </li>
  <li class="nav-item active">
    <a class="nav-link" href="<?php echo base_url() ?>hrd/kehadiran">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Kehadiran Karyawan</span>
    </a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() ?>hrd/uangtransport">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Uang Transport</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() ?>hrd/perjalanandinas">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Perjalanan Dinas</span></a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="<?php echo base_url() ?>hrd/medicalreimbust">
      <i class="fas fa-fw fa-chart-area"></i>
      <span>Medical Reimburstment</span></a>
  </li>

</ul>
