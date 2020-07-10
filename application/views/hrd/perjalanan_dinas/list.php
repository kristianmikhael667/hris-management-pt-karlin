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
                    <th>Lampiran</th>
                    <th>Tanggal</th>
                    <th>Biaya Transportasi</th>
                    <th>Keterangan</th>
                    <th>Uang Makan</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                 
                 
                  $cek_query=$this->Perjalanan_dinas_m->list(); 
                  
                  foreach ($cek_query->result_array() as $row)
                  {       
                ?>
                  <tr>
                    <td><?php echo $row['id_karyawan'] ; ?></td>
                    <td><?php echo $row['lampiran'] ; ?></td>
                    <td><?php echo $row['tanggal'] ; ?></td>
                    <td><?php echo $row['biaya_transportasi'] ; ?></td>
                    <td><?php echo $row['ket'] ; ?></td>
                    <td><?php echo $row['uang_makan'] ; ?></td>
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