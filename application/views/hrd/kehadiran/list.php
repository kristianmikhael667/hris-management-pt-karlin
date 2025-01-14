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
                    <td rowspan="3" align="center">No</td>
                    <td rowspan="3" align="center">Id Karyawan</th>
                    <td rowspan="3" align="center">Nama Karyawan</th>
                    <td colspan="17" align="center">Record Timesheet</th>
                  </tr>
                  <tr>
                    <td rowspan="2" align="center">Jumlah Hadir</th>
                    <td colspan="2" align="center">Cuti Tahunan</th>
                    <td colspan="2" align="center">Cuti Melahirkan</th>
                    <td colspan="2" align="center">Cuti Keluarga Meninggal</th>
                    <td colspan="2" align="center">Cuti Menikahkan Anak</th>
                    <td colspan="2" align="center">Cuti Anak Khitan</th>
                    <td colspan="2" align="center">Cuti Pembaptisan Anak</th>
                    <td rowspan="2" align="center">Cuti Izin</th>
                    <td rowspan="2" align="center">Cuti Sakit</th>
                    <td colspan="2" align="center">Action</th>
                  </tr>
                  <tr>
                    <td align="center">Jumlah</th>
                    <td align="center">Sisa</th>
                    <td align="center">Jumlah</th>
                    <td align="center">Sisa</th>
                    <td align="center">Jumlah</th>
                    <td align="center">Sisa</th>
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
                  $no = 1;
                  foreach ($cek_query->result_array() as $row)
                  {       
                ?>
                  <tr>
                    <td><?php echo $no++;?></td>
                    <td align="center"><?php echo $row['id_karyawan'] ; ?></td>
                    <td align="center"><?php echo $row['nama_karyawan'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_hadir'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_cuti_tahunan'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_cuti_cuti_tahunan'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_cuti_melahirkan'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_cuti_cuti_melahirkan'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_cuti_keluarga_meninggal'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_cuti_cuti_keluarga_meninggal'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_cuti_menikahkan_anak'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_cuti_cuti_menikahkan_anak'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_cuti_anak_khitan'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_cuti_cuti_anak_khitan'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_cuti_pembaptisan_anak'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_cuti_cuti_pembaptisan_anak'] ; ?></td>
                    <td align="center"><?php echo $row['jumlah_izin'] ; ?></td>       
                    <td align="center"><?php echo $row['jumlah_sakit'] ; ?></td>
                    <td>
                      <div class="btn-group" role="group">
                          <a id="btnGroupDrop1" type="button" class="btn btn-outline-danger" data-toggle="dropdown" href="<?php echo base_url('hrd/kehadiran/edit?id=') . $row['id_karyawan']; ?>"> Kosongkan </a>
                          <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                              <a class="dropdown-item btn btn-outline-primary" href="<?php echo base_url('hrd/kehadiran/kosongkan_jumlah_cuti?id=') . $row['id_karyawan']; ?>" > Kosongkan Jumlah Cuti</a><br>
                              <a class="dropdown-item btn btn-outline-primary" href="<?php echo base_url('hrd/kehadiran/kosongkan_sisa_cuti?id=') . $row['id_karyawan']; ?>"> Kosongkan Sisa Cuti</a><br>
                          </div>
                      </div>
                      <a href="<?php echo base_url('hrd/kehadiran/edit?id=') . $row['id_karyawan']; ?>" class="btn btn-outline-success"> Edit </a>
                    </td>
                    
                    <td align="center"><a href="<?php echo base_url('hrd/kehadiran/edit?id=') . $row['id_karyawan']; ?>" class="btn btn-outline-success"> Excel </a>  </td>
                  </tr>
 
                  <?php } ?>
              
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
</div>