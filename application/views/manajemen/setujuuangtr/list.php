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
                    <th>Id Karyawan</th>
                    <th>Uang Bensin</th>
                    <th>Uang Parkir</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <tr>
                <?php

                  $cek_query=$this->uang_transport->hitunguang(); 

                  foreach ($cek_query->result_array() as $row)
                  {       
                  ?>
                  <tr>
                    <td><?php echo $row['id_karyawan'] ; ?></td>
                    <td>Rp.<?php echo number_format($row['jumlah_hadir']*$row['uang_bensin'])  ?></td>
                    <td>Rp.<?php echo number_format($row['jumlah_hadir']*$row['uang_parkir'])  ?></td>
                    <td><?php echo $row['status'] ; ?></td>
                    <td>
                      <button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#view" name=""><i class="fa fa-table" aria-hidden="true"></i></button>
                      <?php
                        $cek_query=$this->uang_transport->hitunguang(); 
                  
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
    
    <!-- Modal Edit-->
    <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Uang Transportasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal Setuju-->
    <div class="modal fade" id="setuju" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Persetujuan Uang Transportasi</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="container">

            <?php 
              $id_karyawan = $this->session->userdata('id_karyawan');
              $cek_query=$this->uang_transport->tampil($id_karyawan); 
              foreach ($cek_query->result_array() as $row)
                {          
              ?>
              <form action="<?php echo base_url(). 'manajemen/setujuuang/update' ?>"  method="post">
                
                <div class="for-group row">
                  <label class="col-sm-3 col-form-label">ID Karyawan</label>
                    <div class="col-sm-8">
                      <input type="text" name="id_karyawan" class="form-control" readonly value="<?php echo $row['id_karyawan'] ?>">
                    </div>
                </div>
                  
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"> Uang Bensin </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="uang_bensin" placeholder="" value="<?php echo $row['uang_bensin'] ?>" required>
                      </div>
                </div>

                <div class="form-group row">
                  <label class="col-sm-3 col-form-label"> Uang Parkir </label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="uang_parkir" placeholder="" value="<?php echo $row['uang_parkir'] ?>" required>
                      </div>
                </div>   
                
                  <div class="form-group row">
                      <label for="status" class="control-label col-sm-3">Status</label>
                        <select name="status" class="form-control ">
                          <option value="DISETUJUI" <?php echo ($row['status'] == 'DISETUJUI') ? "selected": "" ?>>Di Setujui</option>
                          <option value="MENUNGGU" <?php echo ($row['status'] == 'MENUNGGU') ? "selected": "" ?>>Menunggu</option>
                          <option value="DITOLAK" <?php echo ($row['status'] == 'DITOLAK') ? "selected": "" ?>>Di Tolak</option>
                        </select>   
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