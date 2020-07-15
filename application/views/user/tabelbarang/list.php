<div id="content-wrapper">

      <div class="container-fluid">

      
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Purchase Request</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>ID Karyawan</th>
                    <th>ID Purchase Request</th>
                    <th>Tanggal Permintaan</th>
                    <th>Keterangan</th>
                    <th>Data Barang</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                 
                  $cek_query=$this->manajemenbarang->tampil(); 
                  
                  foreach ($cek_query->result_array() as $row)
                  {       
                ?>
                  <tr>
                    <td><?php echo $row['id_karyawan'] ; ?></td>
                    <td><?php echo $row['id_purchase_request'] ; ?></td>
                    <td><?php echo $row['tgl_permintaan'] ; ?></td>
                    <td><?php echo $row['keterangan'] ; ?></td>
                    <td>
                      <button class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#view" name=""><i class="fa fa-eye"></i></button>
                      <button class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#manajemen" name=""><i class="fa fa-trash"></i></button>
                      <button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#edit" name=""><i class="fa fa-magic"></i></button>
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
<div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nomor Purchase Request</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  $cek_query=$this->manajemenbarang->tampil_data(); 
                  foreach ($cek_query->result_array() as $row)
                  {       
                ?>
                  <tr>
                    <td><?php echo $row['id_purchase_request'] ; ?></td>
                    <td><?php echo $row['id_barang'] ; ?></td>
                    <td><?php echo $row['nama_barang'] ; ?></td>
                    <td><?php echo $row['harga'] ; ?></td>
                    <td>
                      <button class="btn btn-sm btn-danger mb-2" data-toggle="modal" data-target="#manajemen" name=""><i class="fa fa-trash"></i></button>
                      <button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#manajemen" name=""><i class="fa fa-magic"></i></button>
                    </td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="modal-footer">

        </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-success" id="exampleModalLabel"><i class="fa fa-magic"></i> Edit Data Purchase Request</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <?php
            $cek_query=$this->manajemenbarang->tampil(); 
            foreach ($cek_query->result_array() as $row)
            {       
          ?>
          <form method="post" action="<?php echo base_url(). 'user/manajemenbarang/update' ?>">
            <div class="for-group">
              <label>ID Karyawan</label>
              <input type="text" name="id_karyawan" class="form-control" readonly value="<?php echo $row['id_karyawan'] ; ?>">
            </div>

            <div class="for-group">
              <label>Nomor Purchase</label>
              <input type="text" name="id_purchase_request" class="form-control" readonly value="<?php echo $row['id_purchase_request'] ; ?>">
            </div>

            <div class="for-group">
              <label>Tanggal Permintaan</label>
              <input type="text" name="tgl_permintaan" class="form-control" value="<?php echo $row['tgl_permintaan'] ; ?>">
            </div>

            <div class="for-group">
              <label>Keterangan</label>
              <input type="text" name="keterangan" class="form-control" value="<?php echo $row['keterangan'] ; ?>">
            </div>

            <button type="submit" class="btn btn-primary btn-sm mt-3">Simpan</button>
            
          </form>
          <?php } ?>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>