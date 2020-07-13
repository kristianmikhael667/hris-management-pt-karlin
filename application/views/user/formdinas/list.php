<div id="content-wrapper">

<div class="container-fluid">


<div id="content-wrapper">
<div class="container-fluid">
  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Forum Perjalanan Dinas</div>
    <div class="card-body">
        <form action="<?php echo base_url()?>user/formdinas/add" method="post" enctype="multipart/form-data">
            <div class="container"> 
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"> NOMOR SPPD </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="nomor_sppd" required>
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"> TANGGAL KEBERANGKATAN </label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="tgl_keberangkatan" required>
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"> BULAN KEBERANGKATAN </label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="bln_keberangkatan" required>
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"> TUJUAN </label>
                        <div class="col-sm-8">
                            <input type="teks" class="form-control" name="tujuan" required>
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