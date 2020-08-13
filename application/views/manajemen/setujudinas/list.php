
<div id="content-wrapper">

<div class="container-fluid">


<div id="content-wrapper">
<div class="container-fluid">
  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Data Perjalanan Dinas</div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>ID Karyawan</th>
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
              <td><?php echo $row['status'] ; ?></td>
              <td>
              <button class="btn btn-sm btn-dark mb-2" data-toggle="modal" data-target="#view" name=""><i class="fa fa-eye" aria-hidden="true"></i></button>
              <button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#excel" name=""><i class="fa fa-table" aria-hidden="true"></i></button>
              <?php
                $cek_query=$this->datadinas->tampil_data(); 
                  foreach ($cek_query->result_array() as $row)
                  { ?>
                    <a class="btn btn-sm btn-danger mb-2" href="<?php echo base_url('manajemen/setujupurchase/delete?id=') . $row['id_karyawan']; ?>"><i class="fa fa-trash"></i></a>
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
<!-- Modal SETUJU -->
<div class="modal fade" id="setuju" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Uang Transportasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
        <?php 
                $id_karyawan = $this->session->userdata('id_karyawan');
                $cek_query=$this->datadinas->tampil_data($id_karyawan); 
                foreach ($cek_query->result_array() as $row)
                  {          
                ?>
                  <form action="<?php echo base_url(). 'manajemen/setujupurchase/update' ?>"  method="post">
                    
                    <div class="for-group row">
                      <label class="col-sm-3 col-form-label">ID Karyawan</label>
                        <div class="col-sm-8">
                          <input type="text" name="id_karyawan" class="form-control" readonly value="<?php echo $row['id_karyawan'] ?>">
                        </div>
                    </div>
                      
                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"> Nomor SPPD </label>
                          <div class="col-sm-8">
                            <input type="number" class="form-control" name="nomor_sppd" readonly placeholder="" value="<?php echo $row['nomor_sppd'] ?>" required>
                          </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"> Tanggal Keberangkatan </label>
                          <div class="col-sm-8">
                            <input type="date" class="form-control" name="tgl_keberangkatan" readonly placeholder="" value="<?php echo $row['tgl_keberangkatan'] ?>" required>
                          </div>
                    </div>   

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"> Bulan Keberangkatan </label>
                          <div class="col-sm-8">
                            <input type="date" class="form-control" name="bln_keberangkatan" readonly placeholder="" value="<?php echo $row['bln_keberangkatan'] ?>" required>
                          </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"> Tujuan </label>
                          <div class="col-sm-8">
                            <input type="date" class="form-control" name="tujuan" readonly placeholder="" value="<?php echo $row['tujuan'] ?>" required>
                          </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-sm-3 col-form-label"> Alasan </label>
                          <div class="col-sm-8">
                            <input type="date" class="form-control" name="alasan" readonly placeholder="" value="<?php echo $row['alasan'] ?>" required>
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

</div>