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
                    <th>Jumlah Hadir</th>
                    <th>Jumlah Cuti</th>
                    <th>Jumlah Izin</th>
                    <th>Jumlah Sakit</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                 
                 
                  $cek_query=$this->kehadiran->list(); 
                  
                  foreach ($cek_query->result_array() as $row)
                  {       
                ?>
                  <tr>
                    <td><?php echo $row['id_karyawan'] ; ?></td>
                    <td><?php echo $row['jumlah_hadir'] ; ?></td>
                    <td><?php echo $row['jumlah_cuti'] ; ?></td>
                    <td><?php echo $row['jumlah_izin'] ; ?></td>
                    <td><?php echo $row['jumlah_sakit'] ; ?></td>
                    <td><a href="<?php echo base_url('hrd/dashboard_hrd/delete?id=') . $row['id_karyawan']; ?>" class="btn btn-outline-danger"> Hapus </a>
                    <a href="<?php echo base_url('hrd/dashboard_hrd/edit?id=') . $row['id_karyawan']; ?>" class="btn btn-outline-success"> Edit </a>  </td>
                  </tr>

                  <?php } ?>
              
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
</div>