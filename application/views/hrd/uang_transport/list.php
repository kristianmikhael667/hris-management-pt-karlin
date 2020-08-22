<div id="content-wrapper">

  <div class="container-fluid">
      
    <div id="content-wrapper">
      
      <div class="container-fluid">
        <!-- DataTables Example -->
        <button class="btn btn-sm btn-success mb-4 mt-4" data-toggle="modal" data-target="#tambahuang" name=""><i class="fas fa-plus fa-sm"></i> Input Uang Transportasi </button>
        
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Transportasi Karyawan</div>
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
    </div>
  </div>
</div>

</div>
</div>
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
        <form action="<?php echo base_url()?>hrd/uangtransport/add"  method="post">
              <div class="form-group">
                <label>ID Karyawan</label>
                <br>
                <select class="form-control" id="sel1" name="id_karyawan">
                    <?php 
                   $cek_query=$this->karyawan->list();  
                    foreach ($cek_query->result_array() as $row) { ?>
                    <option> <?php echo $row['id_karyawan'] ?> </option>
                    <?php } ?>
                </select>
                <br>
                
                <label for="">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" required>

                <label>Uang Bensin</label>
                <input type="number" name="uang_bensin" class="form-control" placeholder="Input Uang Bensin" required>

                <label>Uang Parkir</label>
                <input type="number" name="uang_parkir" class="form-control" placeholder="Input Uang Parkir" required>
              
              </div>
              
              <button type="submit" class="btn btn-primary">Input</button>
              <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </form>
        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>
</div>