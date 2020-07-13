
<div id="content-wrapper">

      <div class="container-fluid">

      
      <div id="content-wrapper">
      <div class="container-fluid">
      <button class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#tambahuang" name=""><i class="fas fa-plus fa-sm"></i> Input Perjalanan Dinas</button>
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
                    <th>Lampiran</th>
                    <th>Tanggal</th>
                    <th>Biaya Transportasi</th>
                    <th>Keterangan</th>
                    <th>Uang Makan</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                 
                 
                  $cek_query=$this->perjalanan_dinas->tampil_data(); 
                  
                  foreach ($cek_query->result_array() as $row)
                  {       
                ?>
                  <tr>
                    <td><?php echo $row['id_karyawan'] ; ?></td>
                    <td><?php echo $row['lampiran'] ; ?></td>
                    <td><?php echo $row['tanggal'] ; ?></td>
                    <td><?php echo $row['biaya_transportasi'] ; ?></td>
                    <td><?php echo $row['ket'] ; ?></td>
                    <td><?php echo $row['uang_makan'] ; ?></td>
                    <td><a href="<?php echo base_url('hrd/dashboard_hrd/delete?id=') . $row['id_karyawan']; ?>" class="btn btn-outline-danger"> Hapus </a>
                    <a href="<?php echo base_url('hrd/dashboard_hrd/edit?id=') . $row['id_karyawan']; ?>" class="btn btn-outline-success"> Edit </a>  </td>
                  </tr>

                  <?php } ?>
              
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          
      </div>
      <!-- Modal -->
  <div class="modal fade" id="tambahuang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Uang Transportasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url()?>hrd/perjalanandinas/add"  method="post">
              <div class="form-group">
                <label>Id Karyawan</label>
                <br>
                <select class="form-control" id="sel1" name="id_karyawan">
                    <?php 
                     $cek_query=$this->karyawan->list(); 
                    foreach ($cek_query->result_array() as $row) { ?>
                    <option> <?php echo $row['id_karyawan'] ?> </option>
                    <?php } ?>
                </select>
                <br>
                <label>Lampiran</label>
                <input type="number" name="lampiran" class="form-control" placeholder="Lampiran" required>

                <label>Tanggal</label>
                <input type="date" name="tanggal" class="form-control" placeholder="Tanggal" required>

                <label>Biaya Transportasi</label>
                <input type="text" name="biaya_transportasi" class="form-control" placeholder="Biaya Transportasi" required>

                <label>Keterangan</label>
                <input type="text" name="ket" class="form-control" placeholder="Keterangan" required>
                
                <label>Uang Makan</label>
                <input type="number" name="uang_makan" class="form-control" placeholder="Uang Makan" required>
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