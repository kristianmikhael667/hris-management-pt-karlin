<div id="content-wrapper">

      <div class="container-fluid">

      
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data Manajemen Barang</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Nomor Purchase</th>
                    <th>Id Barang</th>
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
                    <td><a href="<?php echo base_url('user/manajemenbarang/delete?id=') . $row['id_purchase_request']; ?>" class="btn btn-outline-danger"> Hapus </a>
                    <a href="<?php echo base_url('user/tabelbarang/edit?id=') . $row['id_purchase_request']; ?>" class="btn btn-outline-success"> Edit </a>  </td>
                        
                   
                  </tr>

                  <?php } ?>
              
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>