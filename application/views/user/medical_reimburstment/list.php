
<div id="content-wrapper">

      <div class="container-fluid">

      <button class="btn btn-sm btn-success mb-2 ml-3" data-toggle="modal" data-target="#manajemen" name=""><i class="fas fa-plus fa-sm"></i> Management Barang </button>

      <div id="content-wrapper">
      <div class="container-fluid">
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Medical Reinburstment</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Id Karyawan</th>
                    <th>Klaim ID</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Status Pengajuan</th>
                    <th>Tanggal Disetujui</th>
                    <th>Jumlah Diajukan</th>
                    <th>Jumlah Disetujui</th>
                    <th>Stuck</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                 
                 
                  $cek_query=$this->medical->list(); 
                  
                  foreach ($cek_query->result_array() as $row)
                  {       
                ?>
                  <tr>
                    <td><?php echo $row['id_karyawan'] ; ?></td>
                    <td><?php echo $row['klaim_id'] ; ?></td>
                    <td><?php echo $row['tanggal_pengajuan'] ; ?></td>
                    <td><?php echo $row['status_pengajuan'] ; ?></td>
                    <td><?php echo $row['tanggal_disetujui'] ; ?></td>
                    <td><?php echo $row['jumlah_diajukan'] ; ?></td>
                    <td><?php echo $row['jumlah_disetujui'] ; ?></td>
                    <td><?php echo $row['struck'] ; ?></td>
                    <td><?php echo $row['ket'] ; ?></td>
                    <td>
                    <a href="<?php echo base_url('user/report/pdf?id=') . $row['id_karyawan']; ?>" class="btn btn-warning"> Pdf </a>
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
<div class="modal fade" id="manajemen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Uang Transportasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url()?>user/Medicalreimbust/add"  method="post">
              <div class="form-group">
              <label>Nomor Purchase</label>
               
                <label>Id Karyawan</label>
                <input type="text" name="id_karyawan" class="form-control" readonly value="<?php echo $this->session->userdata('id_karyawan'); ?>" placeholder="Id Karyawan" required>

                <label>Id Claim</label>
                <input type="text" name="klaim_id" class="form-control" placeholder="Id Barang" required>

                <label>Jumlah Diajukan</label>
                <input type="number" name="jumlah_diajukan" class="form-control" placeholder="Nama Barang" required>
                
            
                <label  class="col-sm-3 col-form-label"> Struk </label>  <input type="file" name="filefoto" required>
                <br>
                <label>Keterangan</label>
                <input type="number" name="ket" class="form-control" placeholder="Harga" required>
              </div>
              
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </form>
        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>
        </div>

      </div>

