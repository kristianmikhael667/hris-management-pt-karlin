
<div id="content-wrapper">

<div class="container-fluid">


<div id="content-wrapper">
<div class="container-fluid">
  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Forum Purchase Request</div>
    <div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Nomor Purchase Request</th>
                    <th>ID Barang</th>
                    <th>Nama Barang</th>
                    <th>Harga</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                 $cek_query=$this->manajemenbarang->tampil_dat();
                 foreach ($cek_query->result_array() as $row)
                 {        
                    //SELECT COUNT(nama_kolom) FROM nama_table
                ?>
                  <tr>
                    <td><?php echo $row['id_purchase_request'] ; ?></td>
                    <td><?php echo $row['id_barang'] ; ?></td>
                    <td><?php echo $row['nama_barang'] ; ?></td>
                    <td><?php echo $row['harga'] ; ?></td>
                    <td><?php echo $row['status'] ; ?></td>
                    <td>
                    <form action="<?php echo base_url(); ?>manajemen/setujupurchase/excel" method="post">
                      <button class="btn btn-sm btn-success mb-2" type="submit"><i class="fa fa-table" aria-hidden="true"></i> Excel</button>
                    </form>  
                      <?php
                        $cek_query=$this->formpurchase->list(); 
                  
                        foreach ($cek_query->result_array() as $row)
                        {    ?>
                          <a class="btn btn-sm btn-danger mb-2" href="<?php echo base_url('manajemen/setujupurchase/delete?id=') . $row['id_purchase_request']; ?>"><i class="fa fa-trash"></i> Delete</a>
                      <?php } ?>
                      <br>
                        <button class="btn btn-sm btn-warning mb-2" data-toggle="modal" data-target="#edit" name=""><i class="fa fa-magic"></i> Edit</button>
                        <br>
                        <button class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#setuju" name=""><i class="fa fa-check" aria-hidden="true"></i> Setuju</button>
                    </td>
                    </td>
                  </tr>

                  <?php } ?>
              
                </tbody>
              </table>
            </div>
    </div>
<div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    
</div>
<!-- Modal Setuju-->
<div class="modal fade" id="setuju" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Persetujuan Manajemen Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <?php 
                $id_karyawan = $this->session->userdata('id_karyawan');
                $cek_query=$this->manajemenbarang->tampil_dat($id_karyawan); 
                foreach ($cek_query->result_array() as $row)
                  {          
                ?>
                  <form action="<?php echo base_url(). 'manajemen/setujupurchase/update' ?>"  method="post">
                    
                    <div class="for-group row">
                      <label class="col-sm-3 col-form-label">Nomor Purchase Request</label>
                        <div class="col-sm-8">
                          <input type="text" name="id_purchase_request" class="form-control" readonly value="<?php echo $row['id_purchase_request'] ?>">
                        </div>
                    </div>
                      
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"> ID Barang </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="id_barang" readonly placeholder="" value="<?php echo $row['id_barang'] ?>" required>
                          </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"> Nama Barang </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_barang" readonly placeholder="" value="<?php echo $row['nama_barang'] ?>" required>
                          </div>
                    </div>   

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"> Harga </label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" name="harga" readonly placeholder="" value="<?php echo $row['harga'] ?>" required>
                          </div>
                    </div>
                    
                      <div class="form-group row">
                          <label for="status" class="control-label col-sm-3">Status</label>
                            <select name="status" class="form-control">
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
        <div class="modal-footer">

        </div>
    </div>
</div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Purchase Request</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <?php 
                $id_karyawan = $this->session->userdata('id_karyawan');
                $cek_query=$this->manajemenbarang->tampil_dat($id_karyawan); 
                foreach ($cek_query->result_array() as $row)
                  {          
                ?>
                  <form action="<?php echo base_url(). 'manajemen/setujupurchase/updatee' ?>"  method="post">
                    
                    <div class="for-group row">
                      <label class="col-sm-3 col-form-label">Nomor Purchase Request</label>
                        <div class="col-sm-8">
                          <input type="text" name="id_purchase_request" class="form-control" readonly value="<?php echo $row['id_purchase_request'] ?>">
                        </div>
                    </div>
                      
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"> ID Barang </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="id_barang" placeholder="" value="<?php echo $row['id_barang'] ?>" required>
                          </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"> Nama Barang </label>
                          <div class="col-sm-8">
                            <input type="text" class="form-control" name="nama_barang" placeholder="" value="<?php echo $row['nama_barang'] ?>" required>
                          </div>
                    </div>   

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"> Harga </label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" name="harga" placeholder="" value="<?php echo $row['harga'] ?>" required>
                          </div>
                    </div>
                              
                      <button type="submit" class="btn btn-primary">Edit</button>
                      <button type="reset" class="btn btn-danger" data-dismiss="modal">Reset</button>
                      
                      </form>
                    <?php } ?>
        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>
</div>


</div>