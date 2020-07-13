  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Tables</h1>
<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
  </div>
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
                                </tr>

                                <?php } ?>
                            
                                </tbody>
                            </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>