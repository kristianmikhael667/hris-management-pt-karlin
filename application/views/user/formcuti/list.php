
<div id="content-wrapper">

<div class="container-fluid">


<div id="content-wrapper">
<div class="container-fluid">
  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Forum Pengajuan Cuti</div>
    <div class="card-body">
        <form action="<?php echo base_url()?>user/formcuti/add" method="post" enctype="multipart/form-data">
            <div class="container"> 
                <div class="form-group row">
                    <label for="sel1" class="col-sm-3 col-form-label">Id Karyawan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="id_karyawan" readonly value="<?php echo $this->session->userdata('id_karyawan')?>"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"> TANGGAL MULAI CUTI </label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="mulai_cuti" required>
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"> TANGGAL AKHIR CUTI </label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="akhir_cuti" required>
                        </div>
                </div>
                        
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> JENIS CUTI </label>
                            <div class="col-sm-8">
                                <select class="form-control" name="jenis_cuti" required >
                                    <option value="01"> Cuti </option>
                                    <option value="02"> Izin </option>
                                    <option value="03"> Sakit </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> ALASAN </label>
                            <div class="form-group col-sm-8">	
                                <textarea name="alasan" class="form-control" cols="20" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10" style="float: right;">
                                <button class="btn btn-md btn-primary" name="tambah">TAMBAH</button>	
                                <button class="btn btn-md btn-danger" name="batal">BATAL</button>
                            </div>	
                        </div>
                    </div>
                </form>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    
</div>
<!-- Modal -->

</div>
</div>

</div>