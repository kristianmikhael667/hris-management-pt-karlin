
<div id="content-wrapper">

<div class="container-fluid">

<div id="content-wrapper">
<div class="container-fluid">
  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Data Kontak Karyawan</div>
        <div class="card-body">
            <h2>Daftar Kontak</h2>
            <br>

            <table class="table table-bordered">
            <tr>
                <thead>
                <tr>
                    <th>No</th>
                    <th>Profil</th>
                    <th>ID Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Jenis Kelamin</th>
                    <th>Kode Bagian</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                    <th>Status</th>
                </tr>
                </thead>
            </tr>
            <tbody>

            <?php
                 
                 $no = 0;
                 $logged_status = 0;
                  $cek_query=$this->karyawan->list(); 
                  
                  foreach ($cek_query->result_array() as $row)
                  {   
                    $no++;  
                  ?>
                    <tr>
                    <td><?php echo $no++; ?></td>
                    <td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$row['foto'];?>"></td>
                    <td><?php echo $row['id_karyawan'] ; ?></td>
                    <td><?php echo $row['nama_karyawan'] ; ?></td>
                    <td><?php echo $row['jenis_kelamin'] ; ?></td>
                    <td><?php echo $row['kode_bagian'] ; ?></td>
                    <td><?php echo $row['nomor_telepon'] ; ?></td>
                    <td><?php echo $row['email'] ; ?></td>
                    <td><?php echo $row['status'] ; ?></td>
                  </tr>

                  <?php } ?>
              
            </tbody>
            </table>
            </p>
        </div>
        </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
</div>

</div>

<script src="<?php echo base_url(); ?>js/dashboard.js" type="text/javascript"></script>