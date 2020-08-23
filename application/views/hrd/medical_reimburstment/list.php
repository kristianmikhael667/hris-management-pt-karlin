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
                  <tr class="text-center">
                    <th>Id Karyawan</th>
                    <th>Nama Karyawan</th>
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
                  <tr class="text-center">
                  <td><?php echo $row['id_karyawan'] ; ?></td>
                    <td><?php echo $row['nama_karyawan'] ; ?></td>
                    <td><?php echo $row['klaim_id'] ; ?></td>
                    <td><?php echo $row['tanggal_pengajuan'] ; ?></td>
                    <td><?php echo $row['status_pengajuan'] ; ?></td>
                    <td><?php echo $row['tanggal_disetujui'] ; ?></td>
                    <td><?php echo $row['jumlah_diajukan'] ; ?></td>
                    <td><?php echo $row['jumlah_disetujui'] ; ?></td>
                    <td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$row['struck'];?>"></td>
                    <td><?php echo $row['ket'] ; ?></td>
                    <td>
                    <button class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#view" name=""><i class="fa fa-eye"></i> View</button>
                  
                      <?php
                        $cek_query=$this->medical->list(); 
                        foreach ($cek_query->result_array() as $row)
                        { ?>
                          <a class="btn btn-sm btn-danger mb-2" href="<?php echo base_url('hrd/medicalreimbust/delete?id=') . $row['id_karyawan']; ?>"><i class="fa fa-trash"></i> Delete</a>
                      <?php } ?>
                        <button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#edit" name=""><i class="fa fa-magic"></i> Edit</button></td>
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



<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Dinas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
        <form action="<?php echo base_url()?>hrd/medicalreimbust/edit"  method="post">
        <?php	
            $id = $this->input->get('id');
            $cek_query = $this->medical->check_medical($id);

            foreach ($cek_query->result_array() as $row)
            {  
              ?>
              <div class="form-group">
                <label>ID Karyawan</label>
                <input type="number" name="id_karyawan" class="form-control" readonly placeholder="Nomor SPPD" value="<?php echo $row['id_karyawan'] ?>" required readonly>

                <label>Nama Karyawan</label>
                <input type="number" name="nama_karyawan" class="form-control" placeholder="Nama Karyawan" value="<?php echo $row['nama_karyawan'] ?>" required readonly>

                <label>Claim ID</label>
                <input type="date" name="klaim_id" class="form-control" placeholder="Claim ID" value="<?php echo $row['klaim_id'] ?>" required>

                <label>Tanggal Pengajuan</label>
                <input type="date" name="tanggal_pengajuan" class="form-control" placeholder="Keterangan" value="<?php echo $row['tanggal_pengajuan'] ?>" required>
                
                <label>Status Pengajuan</label>
                <input type="text" name="status_pengajuan" class="form-control" placeholder="Status Pengajuan" value="<?php echo $row['status_pengajuan'] ?>" required readonly>

                <label>Tanggal Disetujui</label>
                <input type="text" name="tanggal_disetujui" class="form-control" placeholder="Tanggal Disetujui" value="<?php echo $row['tanggal_disetujui'] ?>" required readonly>

                <label>Jumlah Diajukan</label>
                <input type="text" name="jumlah_diajukan" class="form-control" placeholder="Jumlah Diajukan" value="<?php echo $row['jumlah_diajukan'] ?>" required>

                <label>Tanggal DIsetujui</label>
                <input type="text" name="tanggal_disetujui" class="form-control" placeholder="Uang Makan" value="<?php echo $row['tanggal_disetujui'] ?>" required readonly>


              </div>
              
              <button type="submit" class="btn btn-primary">Edit</button>
              <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <?php } ?>
          </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>




</div>