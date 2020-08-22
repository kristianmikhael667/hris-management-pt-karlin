<div id="content-wrapper">
    <div class="container-fluid">

        <!-- Area Chart Example-->
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-users"></i>
            Input Data Karyawan</div>
            <div class="card-body">
                
                <form action="<?php echo base_url()?>hrd/dashboard_hrd/add"  method="post" enctype="multipart/form-data">
                    <div class="container"> 
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> ID KARYAWAN </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id_karyawan" placeholder="ID KARYAWAN" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> NAMA </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_karyawan" placeholder="NAMA LENGKAP KARYAWAN" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> JENIS KELAMIN</label>
                            <div class="form-group col-sm-6">	
                                    <input type="radio"  name="jenis_kelamin" value="L"  > LAKI LAKI <BR>
                                    <input type="radio"  name="jenis_kelamin" value="P" > PEREMPUAN
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> DIVISI </label>
                            <div class="col-sm-8">
                                <select class="form-control" name="kode_bagian" required >
                                    <option> -- Pilih Divisi -- </option>
                                    <option value="CEO"> CEO </option>
                                    <option value="GENERAL MANAGER"> GENERAL MANAGER </option>
                                    <option value="FINANCE & HRD MANAGER"> FINANCE & HRD MANAGER </option>
                                    <option value="SALES MANAGER"> SALES MANAGER </option>
                                    <option value="SECRETARY/HRD"> SECRETARY/HRD </option>
                                    <option value="MANAGER IT"> MANAGER IT </option>
                                    <option value="ACCOUNTING"> ACCOUNTING </option>
                                    <option value="FINANCE"> FINANCE </option>
                                    <option value="SALES ADMIN"> SALES ADMIN </option>
                                    <option value="ADMIN"> ADMIN </option>
                                    <option value="PURCHASING"> PURCHASING </option>
                                    <option value="ACCOUNT MANAGER"> ACCOUNT MANAGER </option>
                                    <option value="AM"> AM </option>
                                    <option value="RECEPTIONIST"> RECEPTIONIST </option>
                                    <option value="ADMIN WEB"> ADMIN WEB </option>
                                    <option value="PRODUCT SPECIALIST"> PRODUCT SPECIALIST </option>
                                    <option value="SPV SALES"> SPV SALES </option>
                                    <option value="ADM LPSE"> ADM LPSE </option>
                                    <option value="HR"> HR </option>
                                    <option value="WEB DEVELOPER"> WEB DEVELOPER </option>
                                    <option value="DESAIN GRAFIS"> DESAIN GRAFIS </option>
                                    <option value="SALES"> SALES </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> AKSES WEB </label>
                            <div class="form-group col-sm-6">	
                                    <input type="radio" name="role_id" value="1" > MANAGEMENT <br>
                                    <input type="radio" name="role_id" value="2" > HR <br>
                                    <input type="radio" name="role_id" value="3" > KARYAWAN
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> ALAMAT </label>
                            <div class="form-group col-sm-8">	
                                <textarea name="alamat" class="form-control" cols="20" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> NOMOR TELEPON </label>
                            <div class="form-group col-sm-8">	
                                <input type="text" class="form-control" name="nomor_telepon" placeholder="NOMOR TELEPON" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> EMAIL </label>
                            <div class="form-group col-sm-8">	
                                <input type="text" class="form-control" name="email" placeholder="EMAIL" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> PASSWORD </label>
                            <div class="form-group col-sm-8">	
                                <input type="password" class="form-control" name="password" placeholder="PASSWORD" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="status" class="control-label col-sm-3">Status</label>
                                <div class="col-sm-3">
                                <select name="status" class="form-control">
                                    <option value="aktif" <?php if("aktif") { echo "SELECTED"; } ?>>Aktif</option>
                                    <option value="none" <?php if("none") { echo "SELECTED"; } ?>>Tidak Aktif</option>
                                </select>
                                </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> TANGGAL LAHIR </label>
                            <div class="form-group col-sm-8">	
                                <input type="date" class="form-control" name="tanggal_lahir" placeholder="TANGGAL LAHIR" required>  
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> FOTO </label>
                            <div class="form-group col-sm-8">	
                                    <input type="file" name="filefoto">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10" style="float: right;">	
                                <button class="btn btn-lg btn-danger" name="batal">BATAL</button>
                                <button class="btn btn-lg btn-primary" name="tambah">TAMBAH</button>
                            </div>	
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href=" <?php echo base_url("#page-top")?>">
<i class="fas fa-angle-up"></i>
</a>


