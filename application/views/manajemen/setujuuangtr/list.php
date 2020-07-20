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
                    <th>Id Transportasi</th>
                    <th>Uang Bensin</th>
                    <th>Uang Parkir</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                    <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->transport($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['id_karyawan'] ; ?> 
                    <?php } ?></td>

                    <td><?php
                          $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->transport($id_karyawan); 
                          $cek_query=$this->model_auth->hitunguang();
                            foreach ($cek_query->result_array() as $row)
                            {       
                          ?>Rp.<?php echo number_format($row['jumlah_hadir']*$row['uang_bensin'])  ?> 
                      <?php } ?></td>

                    <td><?php 
                          $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->transport($id_karyawan); 
                           $cek_query=$this->model_auth->hitunguang();  
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?>Rp.<?php echo number_format($row['jumlah_hadir']*$row['uang_parkir'])  ?> 
                    <?php } ?></td>

                    <td>
                    <a href="<?php echo base_url('user/pengajuancuti/ajukan?id=') . $row['id_karyawan']; ?>" class="btn btn-warning"> Pdf </a>
                    <a href="<?php echo base_url('user/pengajuancuti/ajukan?id=') . $row['id_karyawan']; ?>" class="btn btn-primary"> Edit </a>
                    <a href="<?php echo base_url('user/pengajuancuti/ajukan?id=') . $row['id_karyawan']; ?>" class="btn btn-danger"> Delete </a>
                    </td>
                    
                </tr>
              
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
      </div>
    </div>
  </div>
</div>