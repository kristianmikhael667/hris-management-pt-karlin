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
                            <label class="col-sm-3 col-form-label"> Jumlah Cuti </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_cuti" value="<?php echo $row['jumlah_cuti'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Izin </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_izin" value="<?php echo $row['jumlah_sakit'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Sakit </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_sakit" value="<?php echo $row['jumlah_sakit'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Sisa Cuti </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_cuti_cuti" value="<?php echo $row['jumlah_cuti_cuti'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Sisa Izin </label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="jumlah_cuti_izin"  value="<?php echo $row['jumlah_cuti_izin'] ?>" required >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Jumlah Sisa Sakit </label>
                            <div class="col-sm-8">
                                 <input type="number" class="form-control" name="jumlah_cuti_sakit"  value="<?php echo $row['jumlah_cuti_sakit'] ?>" required >
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


