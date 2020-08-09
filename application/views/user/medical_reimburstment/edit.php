<div id="content-wrapper">

    <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
            <a> Edit Data Medical Reinburstment </a>
            </li>   
        </ol>

        <!-- Area Chart Example-->
        <div class="card mb-3">
            <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Edit Data Medical Reinburstment</div>
            <div class="card-body">
                
                <form action="<?php echo base_url()?>user/medicalreimbust/edit"  method="post" enctype="multipart/form-data">
                <?php	
                $id = $this->input->get('id');
                $cek_query = $this->medical->check_medical($id);

                foreach ($cek_query->result_array() as $row)
                {  
                ?>
                    <div class="container"> 
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> ID KARYAWAN </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control"  readonly name="id_karyawan" placeholder="ID KARYAWAN" value="<?php echo $row['id_karyawan'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> Klaim ID </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="klaim_id" placeholder="Klaim ID " value="<?php echo $row['klaim_id'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> Jumlah DiAjukan </label>
                            <div class="form-group col-sm-8">	
                                <input type="text" class="form-control" name="jumlah_diajukan" placeholder="Jumlah DiAjukan" value="<?php echo $row['jumlah_diajukan'] ?>" required>
                            </div>
                        </div>
                
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> FOTO </label>
                            <div class="form-group col-sm-8">	
                                    <input type="file" name="struck">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> Keterangan </label>
                            <div class="form-group col-sm-8">	
                                <input type="text" class="form-control" name="ket" placeholder="Keterangan" value="<?php echo $row['ket'] ?>" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-10" style="float: right;">	
                                <button class="btn btn-lg btn-danger" name="batal">BATAL</button>
                                <button class="btn btn-lg btn-primary" name="tambah">EDIT</button>
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


