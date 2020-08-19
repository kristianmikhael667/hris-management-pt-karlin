


<div id="content-wrapper">

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Halaman Utama Karyawan</h1>
           <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-dark shadow-sm"><i class="fa fa-user fa-sm text-white-50"></i> Status Karyawan : <span class="mr-2 d-none d-lg-inline text-dark-600 large text-success">
            <?php
              $id_karyawan = $this->session->userdata('id_karyawan');
              $cek_query=$this->model_auth->check_employe($id_karyawan); 
              $a = 1;
                foreach ($cek_query->result_array() as $row)
                {       
                     echo $row['status'] ; 
                } 
            ?></span></a>
    </div>
<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Record Activity</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-area">
                 <!-- Color System -->
                 <div class="row">
                
                 <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                              <th>No.</th>
                              <th>Waktu Hadir</th>
                              <th>Tanggal Hadir</th>
                              <th>Lokasi</th>
                            </tr>
                          </thead>
                          <tbody>
                                <?php $id_karyawan = $this->session->userdata('id_karyawan');
                                echo $id_karyawan;
                                    $cek_query=$this->kehadiran->jumlah_absen($id_karyawan); 
                                    foreach ($cek_query->result_array() as $row)
                                  {          
                                ?>
                            <tr>
                             
                              <td> <?php echo  $a++; ?> </td>
                              <td><?php echo $row['jam_masuk'] ; ?> </td>

                              <td><?php echo $row['tanggal_masuk'] ; ?></td>

                              <td><?php echo $row['lokasi'] ; ?> <br></td>

                            
                            </tr>

                            <?php } ?>
                        
                          </tbody>
                        </table>
                      </div>
            </div>
                  </div>
                  
                  <div class="mt-4 text-center small">
                     
                      
                  </div>
      </div>
    </div>
  </div>



  <!-- Pie Chart -->
  <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Record Kehadiran</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                   
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                  <div class="card mb-3">
                    <div class="card-header">
                      <i class="fas fa-table"></i>
                      Data Table Example</div>
                    <div class="card-body">
                      <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                          <thead>
                            <tr>
                             <th>Jumlah Hadir</th>
                              <th>Jumlah Cuti</th>
                              <th>Jumlah Izin</th>
                              <th>Jumlah Sakit</th>
                            </tr>
                          </thead>
                          <tbody>
                                <?php $id_karyawan = $this->session->userdata('id_karyawan');
                                echo $id_karyawan;
                                    $cek_query=$this->kehadiran->kehadiran($id_karyawan); 
                                    foreach ($cek_query->result_array() as $row)
                                  {          
                                ?>
                            <tr>
                           
                              <td><?php echo $row['jumlah_hadir'] ; ?></td>
                              
                              <td><?php echo $row['jumlah_cuti'] ; ?> </td>

                              <td><?php echo $row['jumlah_izin'] ; ?> </td>

                              <td><?php echo $row['jumlah_sakit'] ; ?> </td>
                            </tr>

                            <?php } ?>
                        
                          </tbody>
                        </table>
                      </div>
                    </div>
                </div> 
               
                    
                  </div>
                </div>
              </div>
            </div>
          </div>

<!-- Content Row -->
<div class="row">

  <!-- Content Column -->
  <div class="col-lg-6 mb-4">

    


  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
