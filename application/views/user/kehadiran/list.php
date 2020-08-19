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
                    <th>Waktu Hadir</th>
                    <th>Tanggal Hadir</th>
                    <th>Lokasi</th>
                    <th>Jumlah Cuti</th>
                    <th>Jumlah Izin</th>
                    <th>Jumlah Sakit</th>
                  </tr>
                </thead>
                <tbody>
                
                  <tr>
                    <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->kehadiran($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['id_karyawan'] ; ?> 
                    <?php } ?></td>

                    <td><?php
                          $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->kehadiran($id_karyawan); 
                            foreach ($cek_query->result_array() as $row)
                            {       
                          ?><?php echo $row['jumlah_hadir'] ; ?> 
                      <?php } ?></td>
                    
                      <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->hadir($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['jam_masuk'] ; ?> 
                    <?php } ?></td>

                    <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->hadir($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['tanggal_masuk'] ; ?> 
                    <?php } ?></td>

                    <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->hadir($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['lokasi'] ; ?> 
                    <?php } ?></td>

                    <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->kehadiran($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['jumlah_cuti'] ; ?> 
                    <?php } ?></td>

                    <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->kehadiran($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['jumlah_izin'] ; ?> 
                    <?php } ?></td>

                    <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->kehadiran($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['jumlah_sakit'] ; ?> 
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