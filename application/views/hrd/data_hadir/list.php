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
                  <tr>
                    <th>Id Karyawan</th>
                    <th>Nomor SPPD</th>
                    <th>Tanggal Keberangkatan</th>
                    <th>Bulan Keberangkatan</th>
                    <th>Tujuan</th>
                    <th>Alasan</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                 
                 
                  $cek_query=$this->datadinas->tampil_data(); 
                  
                  foreach ($cek_query->result_array() as $row)
                  {       
                ?>
                  <tr>
                    <td><?php echo $row['id_karyawan'] ; ?></td>
                    <td><?php echo $row['nomor_sppd'] ; ?></td>
                    <td><?php echo $row['tgl_keberangkatan'] ; ?></td>
                    <td><?php echo $row['bln_keberangkatan'] ; ?></td>
                    <td><?php echo $row['tujuan'] ; ?></td>
                    <td><?php echo $row['alasan'] ; ?></td>
                    <td><?php echo $row['status']; ?></td>
                    <td>
                    <button class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#view" name=""><i class="fa fa-eye"></i> View</button>
                    <button class="btn btn-sm btn-warning mb-3 mt-2" data-toggle="modal" data-target="#tambahuang" name=""><i class="fas fa-plus fa-sm"></i> Input Perjalanan Dinas</button>

                      <?php
                        $cek_query=$this->datadinas->tampil_data(); 
                        foreach ($cek_query->result_array() as $row)
                        { ?>
                          <a class="btn btn-sm btn-danger mb-2" href="<?php echo base_url('hrd/perjalanandinas/delete?id=') . $row['nomor_sppd']; ?>"><i class="fa fa-trash"></i> Delete</a>
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

<div class="modal fade" id="tambahuang" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Data Perjalanan Dinas</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <div class="modal-body">
      <form action="<?php echo base_url()?>hrd/dinas/add"  method="post">
          <div class="form-group">
                <label>Nomor SPPD</label>
                <br>
                <select class="form-control" id="sel1" name="nomor_sppd">
                    <?php 
                    $cek_query=$this->datadinas->tampil_data(); 
                    foreach ($cek_query->result_array() as $row) { ?>
                    <option> <?php echo $row['nomor_sppd'] ?> </option>
                    <?php } ?>
                </select>
                <br>

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
        <form action="<?php echo base_url()?>hrd/dinas/update"  method="post">
        <?php	
            $id = $this->input->get('id');
            $cek_query = $this->datadinas->tampil_data($id);

            foreach ($cek_query->result_array() as $row)
            {  
              ?>
              <div class="form-group">
                <label>ID Karyawan</label>
                <input type="number" name="id_karyawan" class="form-control" readonly placeholder="Nomor SPPD" value="<?php echo $row['id_karyawan'] ?>" required>

                <label>Nomor SPPD</label>
                <input type="number" name="nomor_sppd" class="form-control" placeholder="Nomor SPPD" value="<?php echo $row['nomor_sppd'] ?>" required>

                <label>Tanggal Keberangkatan</label>
                <input type="date" name="tgl_keberangkatan" class="form-control" placeholder="Tanggal Keberangkatan" value="<?php echo $row['tgl_keberangkatan'] ?>" required>

                <label>Bulan Keberangkatan</label>
                <input type="date" name="bln_keberangkatan" class="form-control" placeholder="Keterangan" value="<?php echo $row['bln_keberangkatan'] ?>" required>
                
                <label>Tujuan</label>
                <input type="text" name="tujuan" class="form-control" placeholder="Uang Makan" value="<?php echo $row['tujuan'] ?>" required>

                <label>Alasan</label>
                <input type="text" name="alasan" class="form-control" placeholder="Uang Makan" value="<?php echo $row['alasan'] ?>" required>

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

<!-- VIEW -->
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
                    <th>Nomor SPPD</th>
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
                    <td><?php echo $row['nomor_sppd'] ; ?></td>
                    <td><?php echo $row['tanggal'] ; ?></td>
                    <td><?php echo $row['biaya_transportasi'] ; ?></td>
                    <td><?php echo $row['ket'] ; ?></td>
                    <td><?php echo $row['uang_makan'] ; ?></td>
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