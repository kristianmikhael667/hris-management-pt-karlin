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
                    <th>No</th>
                    <th>Id Karyawan</th>
                    <th>Nama Karyawan</th>
                    <th>Kode Bagian</th>
                    <th>Status</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th>Email</th>
                    <th>Tanggal Lahir</th>
                    <th>Foto</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                 
                 $no = 1;
                  $cek_query=$this->karyawan->list(); 
                  
                  foreach ($cek_query->result_array() as $row)
                  {       
                ?>
                  <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $row['id_karyawan'] ; ?></td>
                    <td><?php echo $row['nama_karyawan'] ; ?></td>
                    <td><?php echo $row['kode_bagian'] ; ?></td>
                    <td><?php echo $row['status'] ; ?></td>
                    <td><?php echo $row['alamat'] ; ?></td>
                    <td><?php echo $row['nomor_telepon'] ; ?></td>
                    <td><?php echo $row['email'] ; ?></td>
                    <td><?php echo $row['tanggal_lahir'] ; ?></td>
                    <td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$row['foto'];?>"></td>
                    <td><a href="<?php echo base_url('hrd/dashboard_hrd/delete?id=') .$row['id_karyawan']; ?>" class="btn btn-outline-danger"> Hapus </a>
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