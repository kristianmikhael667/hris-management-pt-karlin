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
                    <th>Nomor SPPD</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Bulan Keberangkatan</th>
                    <th>Tujuan</th>
                    <th>Alasan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $cek_query=$this->datadinas->list(); 
                  
                  foreach ($cek_query->result_array() as $row)
                  {       
                ?>
                  <tr>
                    <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->datadinas->datadinass($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['id_karyawan'] ; ?> 
                    <?php } ?></td>

                    <td><?php
                          $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->datadinas->datadinass($id_karyawan); 
                            foreach ($cek_query->result_array() as $row)
                            {       
                          ?><?php echo $row['nomor_sppd'] ; ?> 
                      <?php } ?></td>

                    <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->datadinas->datadinass($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['tgl_keberangkatan'] ; ?> 
                    <?php } ?></td>

                    <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->datadinas->datadinass($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['bln_keberangkatan'] ; ?> 
                    <?php } ?></td>

                    <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->datadinas->datadinass($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['tujuan'] ; ?> 
                    <?php } ?></td>

                    <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->datadinas->datadinass($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['alasan'] ; ?> 
                    <?php } ?></td>

                    <td>
                    <a href="<?php echo base_url(); ?>user/laporan_kehadiran_pdf/pdf" class="btn btn-warning"> Pdf </a>
                    <a href="<?php echo base_url('user/pengajuancuti/ajukan?id=') . $row['id_karyawan']; ?>" class="btn btn-primary"> Edit </a>
                    <a href="<?php echo base_url('user/pengajuancuti/ajukan?id=') . $row['id_karyawan']; ?>" class="btn btn-danger"> Delete </a>
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