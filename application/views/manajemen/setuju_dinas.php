<div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Persetujuan Perjalanan Dinas</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <!-- Content Row -->

                    <div class="row">
                        <!-- Area Chart Example-->
                        <div class="card mb-3 ml-3" style="width: 100%;">
                            <div class="card-header">
                                <i class="fa fa-address-card mr-2" aria-hidden="true"></i> Forum Perjalanan Dinas</div>
                            <div class="card-body">
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
                            <div class="card-footer small text-muted"></div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>