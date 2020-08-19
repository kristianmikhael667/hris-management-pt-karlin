
<div id="content-wrapper">

      <div class="container-fluid">

      <button class="btn btn-sm btn-success mb-2 ml-3" data-toggle="modal" data-target="#manajemen" name=""><i class="fas fa-plus fa-sm"></i> Input Medical Reinburstment </button>

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
                 
                 $id_karyawan = $this->session->userdata('id_karyawan');
                  $cek_query=$this->medical->check_medical($id_karyawan); 
                  
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
                    <td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$row['struck'];?>"></td>
                    <td><?php echo $row['ket'] ; ?></td>
                    <td>
                    <a href="<?php echo base_url('user/laporan_medical_pdf/pdfmedical?id=') . $row['id_karyawan']; ?>" class="btn btn-warning"> Pdf </a>
                    <a href="<?php echo base_url('user/medicalreimbust/edit?id=') . $row['id_karyawan']; ?>" class="btn btn-primary"> Edit </a>
                    <a href="<?php echo base_url('user/medicalreimbust/delete?id=') . $row['id_karyawan']; ?>" class="btn btn-danger"> Delete </a>
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
          <h5 class="modal-title" id="exampleModalLabel">Medical Reimbust</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url()?>user/medicalreimbust/add"  method="post" enctype="multipart/form-data">
              <div class="form-group">
               
                <label>Id Karyawan</label>
                <input type="text" name="id_karyawan" class="form-control" readonly value="<?php echo $this->session->userdata('id_karyawan'); ?>" placeholder="Id Karyawan" required>

                <label>Id Klaim</label>
                <input type="text" name="klaim_id" class="form-control" placeholder="Id Klaim" required>

                <label>Jumlah Diajukan</label>
                <input type="number" name="jumlah_diajukan" class="form-control" placeholder="Jumlah Diajukan" required>
            
                <label> Struk </label>  
                <br>
                <input type="file" name="filefoto" required>
                <br>

                <label>Keterangan</label>
                <input type="number" name="ket" class="form-control" placeholder="Keterangan" required>
              </div>
              
              <button type="submit" class="btn btn-primary">Tambah</button>
              <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </form>
        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>
        </div>

      </div>

