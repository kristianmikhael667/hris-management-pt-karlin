
<br>

  <!-- end tagline -->

  <section id="maincontent">
    <div class="container">

      <div class="row">
        <div class="span3">
          <h3 class="heading-success"><span class="btn btn-large btn-success"><i class="m-icon-big-swapright m-icon-white"></i></span>&nbsp;&nbsp;Logout</h3>
          <img src="assets/img/icons/box-1-white.png" alt="" />
        </div>
        <div class="span9">
          <div class="well well-primary box">
            
            <h3>Profil mu</h3>
            <p>
             NAMA :
             BAGIAN :
             JABATAN :

            </p>
          
          </div>
        </div>
       
        
      </div>

      <!-- divider -->
      <div class="row">
        <div class="span12">
          <div class="divider"></div>
        </div>
      </div>
      <!-- end divider -->

      <div class="row">
        <div class="span6">
          <h3 class="heading-success"><span class="btn btn-large btn-success"><i class="m-icon-big-swapright m-icon-white"></i></span>&nbsp;&nbsp; Form Untuk Kamu</h3>

          <div id="myCarousel" class="carousel slide testimonials">
            <div class="carousel-inner">
              
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFive">
						Form Cuti
					  </a>
              </div>
              <div id="collapseFive" class="accordion-body collapse">
                <div class="accordion-inner">
                
                  <h5>Internet marketing services</h5>
                  
                  			
                  <form action="<?php echo base_url('index.php/ketidakhadiran/input') ?>"  method="post" enctype="multipart/form-data">
                  
                  <label for="basic-url">Tanggal Mulai Cuti</label>
                  <div class="input-group mb-3">
                      <input type="date" name="tanggal_mulai_Cuti" class="form-control" id="datepicker" aria-describedby="basic-addon3" style="width:100%";>
                  </div>
                  <label for="basic-url">Tanggal Akhir Cuti</label>
                  <div class="input-group mb-3">
                      <input type="date" name="tanggal_akhir_Cuti" class="form-control" id="datepicker" aria-describedby="basic-addon3" style="width:100%";>
                  </div>
                    <label for="basic-url">Jenis Cuti</label>
                    <div class="input-group mb-3">
                        <select class="form-control" name="lab" id="basic-url" aria-describedby="basic-addon3" style="width:100%"; rows="10" >
                            <option value="Cuti "> Cuti </option>
                            <option value="Izin"> Izin </option>
                            <option value="Sakit"> Sakit </option>
                        </select>
                    </div>
                    <label for="basic-url">Alasan </label>
                    <div class="input-group mb-3">
                        <textarea class="form-control" class="form-control" id="basic-url" aria-describedby="basic-addon3" style="width:100%"; rows="10" ></textarea>
                    </div>
                    <button type="button" class="btn btn-primary btn-lg btn-block">Input</button>

                  </form>



                </div>
              </div>
            </div>

            
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSeven">
                Form Perjalanan Dinas
					  </a>
              </div>
              <div id="collapseSeven" class="accordion-body collapse">
                <div class="accordion-inner">
                  <h5>Internet marketing services</h5>
                  
                  <label for="basic-url">Nomer SPPD</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" style="width:100%";>
                  </div>
                  <label for="basic-url">Tanggal Keberangkatan</label>
                  <div class="input-group mb-3">
                      <input type="date" name="tanggal_keberangkatan_dinas" class="form-control" id="datepicker" aria-describedby="basic-addon3" style="width:100%";>
                  </div>
                  <label for="basic-url">Bulan Keberangkatan</label>
                  <div class="input-group mb-3">
                      <input type="date" name="tanggal_kepulangan_dinas" class="form-control" id="datepicker" aria-describedby="basic-addon3" style="width:100%";>
                  </div>
                  <label for="basic-url">Tujuan</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" style="width:100%";>
                  </div>
                  <label for="basic-url">Keterangan </label>
                    <div class="input-group mb-3">
                        <textarea class="form-control" class="form-control" id="basic-url" aria-describedby="basic-addon3" style="width:100%"; rows="10" ></textarea>
                  </div>
                  <button type="button" class="btn btn-primary btn-lg btn-block">Input</button>

                 
                   

                  

                  <a href="#">Learn more</a>
                </div>
              </div>
            </div>

            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseSix">
						Form purchase request
					  </a>
              </div>
              <div id="collapseSix" class="accordion-body collapse">
                <div class="accordion-inner">
                  <img src="" class="alignleft" alt="" />
                  <h5>Internet marketing services</h5>
                  
                  <form action="<?php echo base_url('index.php/ketidakhadiran/input') ?>"  method="post" enctype="multipart/form-data">
                  
                  <label for="basic-url">Nomer Request</label>
                  <div class="input-group mb-3">
                    <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3" style="width:100%";>
                  </div>
                  <label for="basic-url">Tanggal Permintaan</label>
                  <div class="input-group mb-3">
                      <input type="date" name="tanggal_permintaan_purchase" class="form-control" id="datepicker" aria-describedby="basic-addon3" style="width:100%";>
                  </div>
                  <label for="basic-url">Keterangan </label>
                    <div class="input-group mb-3">
                        <textarea class="form-control" class="form-control" id="basic-url" aria-describedby="basic-addon3" style="width:100%"; rows="10" ></textarea>
                  </div>
                  <button type="button" class="btn btn-primary btn-lg btn-block">Input</button>

                 
                  <div class="accordion-heading">
                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
               <center> Manajemen Data Barang </center>
                </a>
                  </div>
                  <div id="collapseOne" class="accordion-body collapse">
                    <div class="accordion-inner">
                     
                      
                            <div class="table-responsive">
                              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                  <tr>
                                    <th>Kode</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Cetak</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                  </tr>
                                </thead>
                                <tfoot>
                                  <tr>
                                    <th>Kode</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Cetak</th>
                                    <th>Edit</th>
                                    <th>Hapus</th>
                                    
                                  </tr>
                                </tfoot>
                                <tbody>
                                  <tr>
                                    <td>111</td>
                                    <td>2</td>
                                    <td>2</td>
                                 
                                    <td><button type="button" class="btn btn-primary">Cetak PDF</button></td>
                                    <td><button type="button" class="btn btn-warning">EditF</button></td>
                                    <td><button type="button" class="btn btn-danger">Hapus</button></td>
                                                              
                                  </tr>
                              </tbody>
                              </table>
                        </div>
           

                </form>		
                  

                  <a href="#">Learn more</a>
            
              </div>
            </div>

            
          



                </div>
              </div>
            </div>

            
            </div></div>


        </div>

        <div class="span6">
          <h3 class="heading-success"><span class="btn btn-large btn-success"><i class="m-icon-big-swapright m-icon-white"></i></span>&nbsp;&nbsp;Laporan Mu</h3>
          <div class="accordion" id="accordion2">

          <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOnee">
						Record Kehadiran
					  </a>
              </div>
              <div id="collapseOnee" class="accordion-body collapse">
                <div class="accordion-inner">
                
                  
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>ID Karyawan</th>
                                <th>Kehadiran</th>
                                <th>Cuti Izin</th>
                                <th>Cuti Sakit</th>
                                <th>Tanpa Keterangan</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>ID Karyawan</th>
                                <th>Kehadiran</th>
                                <th>Cuti Izin</th>
                                <th>Cuti Sakit</th>
                                <th>Tanpa Keterangan</th>
                                
                              </tr>
                            </tfoot>
                            <tbody>
                              <tr>
                                <td>111</td>
                                <td>2</td>
                                <td>2</td>
                                <td>2</td>
                                <td>2</td>
                                                          
                              </tr>
                           </tbody>
                          </table>
                        </div>
                   

                  

                  <a href="#">Learn more</a>
                </div>
              </div>
            </div>

      
            
            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
						Uang transport mu
					  </a>
              </div>
              <div id="collapseTwo" class="accordion-body collapse">
                <div class="accordion-inner">
               
                  
                        <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>ID Karyawan</th>
                                <th>Jumlah Kehadiran</th>
                                <th>Uang Trasnport</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                                <th>ID Karyawan</th>
                                <th>Jumlah Kehadiran</th>
                                <th>Uang Trasnport</th>
                             
                              </tr>
                            </tfoot>
                            <tbody>
                              <tr>
                                <td>111</td>
                                <td>2</td>
                                <td>2</td>
                                </td>                              
                              </tr>
                           </tbody>
                          </table>
                        </div>
                   

                  

                  <a href="#">Learn more</a>
                </div>
              </div>
            </div>

            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
						Reimburstment
					  </a>
              </div>
              <div id="collapseThree" class="accordion-body collapse">
                <div class="accordion-inner">
                

                  <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>ID Karyawan</th>
                                <th>Klaim ID</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                                <th>Jumlah</th>
                                <th>Cetak</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                               <th>ID Karyawan</th>
                                <th>Klaim ID</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                                <th>Jumlah</th>
                                <th>Cetak</th>
                             
                              </tr>
                            </tfoot>
                            <tbody>
                              <tr>
                                <td>111</td>
                                <td>2516-90</td>
                                <td>25/07/2020</td>
                                <td>Disetujui</td>
                                <td>Rp. 10.000.000</td>
                                <td><button type="button" class="btn btn-danger">Cetak PDF</button></td>  
                                </td>                              
                              </tr>
                           </tbody>
                          </table>
                        </div>
                   

                  <a href="#">Learn more</a>
                </div>
              </div>
            </div>

            <div class="accordion-group">
              <div class="accordion-heading">
                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
						Perjalanan dinas
					  </a>
              </div>
              <div id="collapseFour" class="accordion-body collapse">
                <div class="accordion-inner">
                   <h5>Wordpress development services</h5>
                  
                  <div class="table-responsive">
                          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                              <tr>
                                <th>ID Karyawan</th>
                                <th>No SPPD</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                                <th>Tujuan</th>
                                <th>Cetak</th>
                              </tr>
                            </thead>
                            <tfoot>
                              <tr>
                              <th>ID Karyawan</th>
                                <th>No SPPD</th>
                                <th>Tanggal Pengajuan</th>
                                <th>Status</th>
                                <th>Tujuan</th>
                                <th>Cetak</th>
                             
                              </tr>
                            </tfoot>
                            <tbody>
                              <tr>
                                <td>111</td>
                                <td>2516-90</td>
                                <td>25/07/2020</td>
                                <td>Disetujui</td>
                                <td>Semarang</td>
                                <td><button type="button" class="btn btn-danger">Cetak PDF</button></td>  
                                </td>                              
                              </tr>
                           </tbody>
                          </table>
                        </div>
                   

                  <a href="#">Learn more</a>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>



    </div>
  </section>

<!-- Template Custom JavaScript File -->
<script src="assets/js/custom.js"></script>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>


<!-- Core plugin JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>


<!-- Page level plugin JavaScript-->
<script src="<?php echo base_url(); ?>assets/vendor/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.js"></script>


<!-- Custom scripts for all pages-->
<script src="<?php echo base_url(); ?>assets/js/sb-admin.min.js"></script>

<!-- Demo scripts for this page-->
<script src="<?php echo base_url(); ?>assets/js/demo/datatables-demo.js"></script>

</body>