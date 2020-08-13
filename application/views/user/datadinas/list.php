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
           
                $id_karyawan = $this->session->userdata('id_karyawan');
                  $cek_query=$this->datadinas->datadinass($id_karyawan); 
                  
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
                    <td><?php echo $row['status'] ; ?></td>
                    <td>
                    
                    <form action="<?php echo base_url('user/laporan_datadinas/pdfdinas?id=') . $row['id_karyawan']; ?>" method="post">
                        <button class="btn btn-sm btn-primary mb-2" type="submit"><i class="fa fa-file" aria-hidden="true"></i>  PDF</button>
                    </form>

                    <form action="<?php echo base_url('user/datadinas/delete?id=') . $row['id_karyawan']; ?>" method="post">
                        <button class="btn btn-sm btn-danger mb-2" type="submit"><i class="fa fa-trash" aria-hidden="true"></i> DELETE</button>
                    </form>

                        <button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#edit" name=""><i class="fa fa-magic"></i> EDIT</button>
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
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Data Dinas</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="<?php echo base_url()?>user/datadinas/update"  method="post" enctype="multipart/form-data">
          <?php
          $id = $this->input->get('id');
          $cek_query = $this->datadinas->datadinass($id); 

                foreach ($cek_query->result_array() as $row)
                {  
                ?>
              <div class="form-group">
               
                <label>Id Karyawan</label>
                <input type="text" name="id_karyawan" class="form-control" readonly value="<?php echo $row['id_karyawan'] ; ?>" placeholder="Id Karyawan" required>

                <label>Nomor SPPD</label>
                <input type="text" name="nomor_sppd" class="form-control" placeholder="Id Klaim" value="<?php echo $row['nomor_sppd'] ; ?>" required>

                <label>Tanggal Keberangkatan</label>
                <input type="date" name="tgl_keberangkatan" class="form-control" placeholder="Jumlah Diajukan" value="<?php echo $row['tgl_keberangkatan'] ; ?>" required>
            
                <label> Bulan Keberangkatan </label>  
                <input type="date" name="bln_keberangkatan" class="form-control" placeholder="Jumlah Diajukan" value="<?php echo $row['bln_keberangkatan'] ; ?>" required>

                <label>Tujuan</label>
                <input type="text" name="tujuan" class="form-control" placeholder="Jumlah Diajukan" value="<?php echo $row['tujuan'] ; ?>" required>

                <label>Alasan</label>
                <input type="text" name="alasan" class="form-control" placeholder="Jumlah Diajukan" value="<?php echo $row['alasan'] ; ?>" required>
              </div>

      </div>
      <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
          <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      <?php } ?>
      </form>
    </div>
  </div>
</div>