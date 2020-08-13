
<div id="content-wrapper">

      <div class="container-fluid">
      
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
                    <td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$row['struck'];?>"></td>

                    <td><?php echo $row['ket'] ; ?></td>
                    <td>
                    <button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#view" name=""><i class="fa fa-table" aria-hidden="true"></i></button>
                      <?php
                        $cek_query=$this->medical->list(); 
                  
                        foreach ($cek_query->result_array() as $row)
                        {    ?>
                          <a class="btn btn-sm btn-danger mb-2" href="<?php echo base_url('manajemen/setujuuang/delete?id=') . $row['id_karyawan']; ?>"><i class="fa fa-trash"></i></a>
                      <?php } ?>
                        <button class="btn btn-sm btn-warning mb-2" data-toggle="modal" data-target="#edit" name=""><i class="fa fa-magic"></i></button>
                        <button class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#setuju" name=""><i class="fa fa-check" aria-hidden="true"></i></button>
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

    
        <!-- Modal -->
    <div class="modal fade" id="setuju" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Persetujuan Medical</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">
              <?php 
                $id_karyawan = $this->session->userdata('id_karyawan');
                $cek_query=$this->medical->list($id_karyawan); 
                foreach ($cek_query->result_array() as $row)
                  {          
                ?>
                  <form action="<?php echo base_url(). 'manajemen/setujumedical/update' ?>"  method="post">
                    
                    <div class="for-group row">
                      <label class="col-sm-3 col-form-label">ID Karyawan</label>
                        <div class="col-sm-8">
                          <input type="text" name="id_karyawan" class="form-control" readonly value="<?php echo $row['id_karyawan'] ?>">
                        </div>
                    </div>
                      
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"> Klaim ID </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="klaim_id" readonly placeholder="" value="<?php echo $row['klaim_id'] ?>" required>
                          </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"> Tanggal Pengajuan </label>
                          <div class="col-sm-8">
                            <input type="date" class="form-control" name="tanggal_pengajuan" readonly placeholder="" value="<?php echo $row['tanggal_pengajuan'] ?>" required>
                          </div>
                    </div>   
                    
                      <div class="form-group row">
                          <label for="status" class="control-label col-sm-3">Status Pengajuan</label>
                            <select name="status_pengajuan" class="form-control ">
                              <option value="DISETUJUI" <?php echo ($row['status_pengajuan'] == 'DISETUJUI') ? "selected": "" ?>>Di Setujui</option>
                              <option value="MENUNGGU" <?php echo ($row['status_pengajuan'] == 'MENUNGGU') ? "selected": "" ?>>Menunggu</option>
                              <option value="DITOLAK" <?php echo ($row['status_pengajuan'] == 'DITOLAK') ? "selected": "" ?>>Di Tolak</option>
                            </select>   
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Tanggal Disetujui </label>
                            <div class="col-sm-8">
                              <input type="date" class="form-control" name="tanggal_disetujui" placeholder="" value="<?php echo $row['tanggal_disetujui'] ?>" required>
                            </div>
                      </div>  

                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Jumlah Diajukan </label>
                            <div class="col-sm-8">
                              <input type="number" class="form-control" name="jumlah_diajukan" readonly placeholder="" value="<?php echo $row['jumlah_diajukan'] ?>" required>
                            </div>
                      </div> 

                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Jumlah Disetujui </label>
                            <div class="col-sm-8">
                              <input type="number" class="form-control" name="jumlah_disetujui" placeholder="" value="<?php echo $row['jumlah_disetujui'] ?>" required>
                            </div>
                      </div>

                      <div class="form-group row">
                        <label class="col-sm-3 col-form-label"> Keterangan </label>
                            <div class="col-sm-8">
                              <input type="number" class="form-control" name="ket" readonly placeholder="" value="<?php echo $row['ket'] ?>" required>
                            </div>
                      </div>
                              
                      <button type="submit" class="btn btn-primary">Setujui</button>
                      <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                      
                      </form>
                    <?php } ?>

            </div>  
          </div>
          <div class="modal-footer">
            
          </div>
        </div>
      </div>
    </div>



    
  </div>
</div>