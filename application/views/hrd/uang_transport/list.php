<div id="content-wrapper">

      <div class="container-fluid">
      
      <div id="content-wrapper">
      
      <div class="container-fluid">
      <button class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#tambahuang" name=""><i class="fas fa-plus fa-sm"></i> Input Uang Transportasi</button>
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
                    <th>Id Transportasi</th>
                    <th>Uang Bensin</th>
                    <th>Uang Parkir</th>
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
          <form>
            <div class="form-group">
                <label>Id Transportasi</label>
                <input type="text" name="id_tr" class="form-control">

                <label>Uang Bensin</label>
                <input type="text" name="uang_bensin" class="form-control">

                <label>Uang Parkir</label>
                <input type="text" name="uang_parkir" class="form-control">

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