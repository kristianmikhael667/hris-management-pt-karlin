<div id="content-wrapper">
  <div class="container-fluid">
  <?php

$id_karyawan = $this->session->userdata('id_karyawan');
        
        $cek_data = $this->karyawan->check_employe($id_karyawan);

        foreach ($cek_data->result_array() as $row)
        {
          
          ?>
        <div class="row">
          <div class="col-lg-8">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                View Profil</div>
              <div class="card-body">
                  ID Karyawan
                  <div class="card-footer small text-muted"><?php echo $row['id_karyawan'] ?></div><br>
                  Jenis Kelamin
                  <div class="card-footer small text-muted"><?php echo $row['jenis_kelamin'] ?></div><br>
                  Nama
                  <div class="card-footer small text-muted"><?php echo $row['nama_karyawan'] ?></div><br>
                  Jabatan
                  <div class="card-footer small text-muted"><?php echo $row['kode_bagian'] ?></div><br>
                  Alamat
                  <div class="card-footer small text-muted"><?php echo $row['alamat']  ?></div><br>
                  Nomor Telepon
                  <div class="card-footer small text-muted"><?php echo $row['nomor_telepon']  ?></div><br>
                  Email
                  <div class="card-footer small text-muted"><?php echo $row['email']  ?></div><br>

              </div>
              
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                <i class=""></i>
                Profile Picture</div>
              <div class="card-body">
                <center><img style="width:200px;" src="<?php echo base_url().'assets/images/'.$row['foto'];?>"></center>
              </div>
              <div class="card-footer small text-muted"> </div>
            </div>
          </div>
        </div>

                <?php } ?>




  </div>
</div>
        