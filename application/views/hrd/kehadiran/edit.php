<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a> Edit Cuti Karyawan</a>
            </li>   
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Edit Data Cuti Karyawan</div>
            <div class="card-body">
                
                <form action="<?php echo base_url()?>hrd/kehadiran/edit"  method="post" enctype="multipart/form-data">
                <?php	
                $id = $this->input->get('id');
                $cek_query = $this->kehadiran->list_cuti($id);

                foreach ($cek_query->result_array() as $row)
                {  
                ?>
    
                
                    <div class="container"> 
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> ID KARYAWAN </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id_karyawan"  value="<?php echo $row['id_karyawan'] ?>" readonly >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Cuti Tahunan </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_cuti_tahunan" value="<?php echo $row['jumlah_cuti_tahunan'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Cuti Melahirkan </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_cuti_melahirkan" value="<?php echo $row['jumlah_cuti_melahirkan'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Cuti Keluarga Meninggal </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_cuti_keluarga_meninggal" value="<?php echo $row['jumlah_cuti_keluarga_meninggal'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Cuti Menikahkan Anak </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_cuti_menikahkan_anak" value="<?php echo $row['jumlah_cuti_menikahkan_anak'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Cuti Anak Khitanan </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_cuti_anak_khitan" value="<?php echo $row['jumlah_cuti_anak_khitan'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Cuti Pembaptisan Anak Khitanan </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_cuti_pembaptisan_anak" value="<?php echo $row['jumlah_cuti_pembaptisan_anak'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Izin </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_izin" value="<?php echo $row['jumlah_izin'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Sakit </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_sakit" value="<?php echo $row['jumlah_sakit'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Sisa Cuti Tahunan </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_cuti_cuti_tahunan" value="<?php echo $row['jumlah_cuti_cuti_tahunan'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Sisa Melahirkan </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_cuti_cuti_melahirkan" value="<?php echo $row['jumlah_cuti_cuti_melahirkan'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Sisa Keluarga Meninggal </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_cuti_cuti_keluarga_meninggal" value="<?php echo $row['jumlah_cuti_cuti_keluarga_meninggal'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Sisa Menikahkan Anak </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_cuti_cuti_menikahkan_anak" value="<?php echo $row['jumlah_cuti_cuti_menikahkan_anak'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Sisa Anak Khitanan </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_cuti_cuti_anak_khitan" value="<?php echo $row['jumlah_cuti_cuti_anak_khitan'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Sisa Cuti Pembaptisan Anak </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_cuti_cuti_pembaptisan_anak" value="<?php echo $row['jumlah_cuti_cuti_pembaptisan_anak'] ?>" required >
                            </div>
                        </div>
                       
                        <div class="form-group row">
                            <div class="col-sm-10" style="float: right;">	
                                <button class="btn btn-lg btn-danger" name="batal">BATAL</button>
                                <button class="btn btn-lg btn-primary" name="tambah">Edit</button>
                            </div>	
                        </div>
                        
                    </div>
                </div>
                <?php } ?>

                </form>
            </div>
        </div>
    </div>
<!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href=" <?php echo base_url("#page-top")?>">
<i class="fas fa-angle-up"></i>
</a>


