<div id="content-wrapper">

      

<div class="container-fluid">
<?php

$id_karyawan = $this->session->userdata('id_karyawan');
        
        $cek_data = $this->karyawan->check_employe($id_karyawan);

        foreach ($cek_data->result_array() as $row)
        {
          
          ?>
        <div class="row">
          <div class="col-lg-8">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                View Profil</div>
              <div class="card-body">
                  ID Karyawan
                  <div class="card-footer small text-muted"><?php echo $row['id_karyawan'] ?></div><br>
                  Jenis Kelamin
                  <div class="card-footer small text-muted"><?php echo $row['jenis_kelamin'] ?></div><br>
                  Nama
                  <div class="card-footer small text-muted"><?php echo $row['nama_karyawan'] ?></div><br>
                  Jabatan
                  <div class="card-footer small text-muted"><?php
                   $jabatan = $row['kode_bagian'];
                   
                  if($jabatan == 1){
                     echo "CEO";
                  }
                  else if($jabatan == 2){
                    echo "Manger";
                  }
                  else if($jabatan == 3){
                    echo "AM";
                  }
                  else if($jabatan == 4){
                    echo "HR";
                  }
                  else if($jabatan == 5){
                    echo "Web Dev";
                  }
                  else if($jabatan == 6){
                    echo "Desain Grafis";
                  }
                  else if($jabatan == 7){
                    echo "Sales";
                  }
                   ?></div><br>
                  Alamat
                  <div class="card-footer small text-muted"><?php echo $row['alamat']  ?></div><br>
                  Nomor Telepon
                  <div class="card-footer small text-muted"><?php echo $row['nomor_telepon']  ?></div><br>
                  Email
                  <div class="card-footer small text-muted"><?php echo $row['email']  ?></div><br>

              </div>
              
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                <i class=""></i>
                Profile Picture</div>
              <div class="card-body">
                <center><img style="width:200px;" src="<?php echo base_url().'assets/images/'.$row['foto'];?>"></center>
              </div>
              <div class="card-footer small text-muted"> </div>
            </div>
          </div>
        </div>

                <?php } ?>



                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Halaman Utama Karyawan</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <!-- Area Chart Example-->
                        <div class="card mb-3">
                            <div class="card-header">
                                <i class="fa fa-bullhorn mr-2" aria-hidden="true"></i> KARYAWAN</div>
                            <div class="card-body">

                                <div class="row">
                                    <div class="col-xl-3 col-sm-6 mb-3">
                                        <div class="card text-white bg-primary o-hidden h-100">
                                            <div class="card-body">
                                                <div class="card-body-icon">
                                                    <i class=""></i>
                                                </div>
                                                <div class="mr-5">RECORD KEHADIRAN</div>
                                            </div>
                                            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('hrd/jumlahkehadiran') ?>">
                                                <span class="float-left">View Details</span>
                                                <span class="float-right">
                                                  <i class="fas fa-angle-right"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 mb-3">
                                        <div class="card text-white bg-warning o-hidden h-100">
                                            <div class="card-body">
                                                <div class="card-body-icon">
                                                    <i class=""></i>
                                                </div>
                                                <div class="mr-5">UANG TRANSPORT</div>
                                            </div>
                                            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('hrd/uangtransport') ?>">
                                                <span class="float-left">View Details</span>
                                                <span class="float-right">
                                                  <i class="fas fa-angle-right"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 mb-3">
                                        <div class="card text-white bg-success o-hidden h-100">
                                            <div class="card-body">
                                                <div class="card-body-icon">
                                                    <i class=""></i>
                                                </div>
                                                <div class="mr-5">REIMBURSTMENT</div>
                                            </div>
                                            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('hrd/perjalanandinas') ?>">
                                                <span class="float-left">View Details</span>
                                                <span class="float-right">
                                                  <i class="fas fa-angle-right"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 mb-3">
                                        <div class="card text-white bg-danger o-hidden h-100">
                                            <div class="card-body">
                                                <div class="card-body-icon">
                                                    <i class=""></i>
                                                </div>
                                                <div class="mr-5">PERJALANAN DINAS</div>
                                            </div>
                                            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('hrd/medicalreimbust') ?>">
                                                <span class="float-left">View Details</span>
                                                <span class="float-right">
                                                  <i class="fas fa-angle-right"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 mb-3">
                                        <div class="card text-white bg-danger o-hidden h-100">
                                            <div class="card-body">
                                                <div class="card-body-icon">
                                                    <i class=""></i>
                                                </div>
                                                <div class="mr-5">FORM CUTI</div>
                                            </div>
                                            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('hrd/medicalreimbust') ?>">
                                                <span class="float-left">View Details</span>
                                                <span class="float-right">
                                                  <i class="fas fa-angle-right"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 mb-3">
                                        <div class="card text-white bg-danger o-hidden h-100">
                                            <div class="card-body">
                                                <div class="card-body-icon">
                                                    <i class=""></i>
                                                </div>
                                                <div class="mr-5">FORM PERJALANAN DINAS</div>
                                            </div>
                                            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('hrd/medicalreimbust') ?>">
                                                <span class="float-left">View Details</span>
                                                <span class="float-right">
                                                  <i class="fas fa-angle-right"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-sm-6 mb-3">
                                        <div class="card text-white bg-danger o-hidden h-100">
                                            <div class="card-body">
                                                <div class="card-body-icon">
                                                    <i class=""></i>
                                                </div>
                                                <div class="mr-5">FORM PURCHASE REQUEST</div>
                                            </div>
                                            <a class="card-footer text-white clearfix small z-1" href="<?php echo base_url('hrd/medicalreimbust') ?>">
                                                <span class="float-left">View Details</span>
                                                <span class="float-right">
                                                  <i class="fas fa-angle-right"></i>
                                                </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="card-footer small text-muted"></div>
                        </div>

                        <!-- Area Chart Example-->

                    </div>


                    <!-- Content Row -->

                    <div class="row">

                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>