<div id="content-wrapper">

      <div class="container-fluid">
      
      <div id="content-wrapper">
      
      <div class="container-fluid">
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Transportasi Keryawan</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Id Karyawan</th>
                    <th>Tanggal</th>
                    <th>Uang Bensin</th>
                    <th>Uang Parkir</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                      <?php
                          $no = 1; 
                          $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->uang_transport->hitunguang($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?>
                <tbody>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['id_karyawan'] ; ?></td>
                    <td><?php echo $row['tanggal'] ; ?></td>
                    <td>Rp.<?php echo number_format($row['jumlah_hadir']*$row['uang_bensin'])  ?></td>
                    <td>Rp.<?php echo number_format($row['jumlah_hadir']*$row['uang_parkir'])  ?></td>
                    <td><?php echo $row['status']; ?> </td>  
                    <td>
                    <a href="<?php echo base_url('user/laporan_uangtr/pdfuangtr?id=') . $row['id_karyawan']; ?>" class="btn btn-warning"> Pdf </a>
                    <a href="<?php echo base_url('user/uangtransport/edit?id=') . $row['id_karyawan']; ?>" class="btn btn-primary"> Edit </a>
                    <a href="<?php echo base_url('user/uangtransport/delete?id=') . $row['id_karyawan']; ?>" class="btn btn-danger"> Delete </a>
                    </td>
                    
                </tr>
                        <?php } ?>

                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
  </div>
</div>