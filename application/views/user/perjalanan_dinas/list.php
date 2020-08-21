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
                  $cek_query=$this->datadinas->list($id_karyawan); 
                  
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
                    <button class="btn btn-sm btn-primary mb-2" data-toggle="modal" data-target="#view" name=""><i class="fa fa-eye"></i>View</button>
                    <form action="<?php echo base_url('user/laporan_datadinas/pdfdinas?id=') . $row['id_karyawan']; ?>"  method="post" enctype="multipart/form-data">
                      <button class="btn btn-sm btn-warning mb-2" name=""><i class="fa fa-file"></i> Pdf</button>
                    </form>
                      <?php
                        $cek_query=$this->datadinas->list(); 
                        foreach ($cek_query->result_array() as $row)
                        { ?>
                          <a class="btn btn-sm btn-danger mb-2" href="<?php echo base_url('user/perjalanandinas/delete?id=') . $row['id_karyawan']; ?>"><i class="fa fa-trash"></i> Delete</a>
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
  <div class="modal fade" id="view" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Data Perjalanan Dinas</h5>
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
                  $cek_query=$this->perjalanan_dinas->tampil_dat(); 
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