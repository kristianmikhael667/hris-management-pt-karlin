
<div id="content-wrapper">

      <div class="container-fluid">

      
      <div id="content-wrapper">
      <div class="container-fluid">
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Table Example</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id Karyawan</th>
                    <th>Klaim ID</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status Pengajuan</th>
                    <th>Tanggal Disetujui</th>
                    <th>Jumlah Diajukan</th>
                    <th>Jumlah Disetujui</th>
                    <th>Stuck</th>
                    <th>Keterangan</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                 
                 
                  $cek_query=$this->medical->list(); 
                  
                  foreach ($cek_query->result_array() as $row)
                  {       
                ?>
                  <tr>
                    <td><?php echo $row['id_karyawan'] ; ?></td>
                    <td><?php echo $row['klaim_id'] ; ?></td>
                    <td><?php echo $row['tanggal_pengajuan'] ; ?></td>
                    <td><?php echo $row['status_pengajuan'] ; ?></td>
                    <td><?php echo $row['tanggal_disetujui'] ; ?></td>
                    <td><?php echo $row['jumlah_diajukan'] ; ?></td>
                    <td><?php echo $row['jumlah_disetujui'] ; ?></td>
                    <td><?php echo $row['struck'] ; ?></td>
                    <td><?php echo $row['ket'] ; ?></td>
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