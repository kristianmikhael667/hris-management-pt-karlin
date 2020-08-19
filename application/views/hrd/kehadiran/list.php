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
                    <td rowspan="2" align="center">Id Karyawan</th>
                    <td rowspan="2" align="center">Nama Karyawan</th>
                    <td rowspan="2" align="center">Jumlah Hadir</th>
                    <td colspan="2" align="center">Jumlah Cuti</th>
                    <td colspan="2" align="center">Jumlah Izin</th>
                    <td colspan="2" align="center">Jumlah Sakit</th>
                    <td colspan="2" align="center">Action</th>
                  </tr>
                  <tr>
                    <td align="center">Jumlah</th>
                    <td align="center">Sisa</th>
                    <td align="center">Jumlah</th>
                    <td align="center">Sisa</th>
                    <td align="center">Jumlah</th>
                    <td align="center">Sisa</th>
                    <td align="center">Action</th>
                    <td align="center">Excel</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                 
                 
                  $cek_query=$this->kehadiran->list(); 
                  
                  foreach ($cek_query->result_array() as $row)
                  {       
                ?>
                  <tr>
                    <td align="center"><?php echo $row['id_karyawan'] ; ?></td>
                    <td align="center"><?php echo $row['nama_karyawan'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_hadir'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_cuti'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_cuti_cuti'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_izin'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_cuti_izin'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_sakit'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_cuti_sakit'] ; ?></td>
                    <td align="center"><a href="<?php echo base_url('hrd/kehadiran/edit?id=') . $row['id_karyawan']; ?>" class="btn btn-outline-danger"> Edit Jumlah Cuti </a>
                    <a href="<?php echo base_url('hrd/kehadiran/edit?id=') . $row['id_karyawan']; ?>" class="btn btn-outline-success"> Edit Sisa Cuti </a>  </td>
                    <td align="center"><a href="<?php echo base_url('hrd/dashboard_hrd/edit?id=') . $row['id_karyawan']; ?>" class="btn btn-outline-success"> Excel </a>  </td>
                  </tr>
 
                  <?php } ?>
              
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
</div>