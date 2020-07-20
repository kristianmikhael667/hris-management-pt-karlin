
<div id="content-wrapper">

<div class="container-fluid">


<div id="content-wrapper">
<div class="container-fluid">
<button class="btn btn-sm btn-success mb-2" data-toggle="modal" data-target="#manajemen" name=""><i class="fas fa-plus fa-sm"></i> Management Barang </button>
  <!-- DataTables Example -->
  <div class="card mb-3">
    <div class="card-header">
      <i class="fas fa-table"></i>
      Forum Purchase Request</div>
    <div class="card-body">
        <form action="<?php echo base_url()?>user/formpurchase/add" method="post" enctype="multipart/form-data">
            <div class="container"> 
                <div class="form-group row">
                    <label for="sel1" class="col-sm-3 col-form-label">Id Karyawan</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="id_karyawan" readonly value="<?php echo $this->session->userdata('id_karyawan')?>"  required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"> Nomor Request </label>
                        <div class="col-sm-8">
                            <input type="number" class="form-control" name="id_purchase_request" required>
                        </div>
                </div>
                <div class="form-group row">
                    <label class="col-sm-3 col-form-label"> Tanggal Permintaan </label>
                        <div class="col-sm-8">
                            <input type="date" class="form-control" name="tgl_permintaan" required>
                        </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label"> Keterangan </label>
                        <div class="form-group col-sm-8">	
                            <textarea name="keterangan" class="form-control" cols="20" rows="4"></textarea>
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
<div class="modal fade" id="manajemen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Uang Transportasi</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="<?php echo base_url()?>user/manajemenbarang/add"  method="post">
              <div class="form-group">
                <label>Nomor Purchase</label>
                <br>
                <select class="form-control" id="sel1" name="id_purchase_request">
                    <?php 
                    $cek_query=$this->formpurchase->list(); 
                    foreach ($cek_query->result_array() as $row) { ?>
                    <option> <?php echo $row['id_purchase_request'] ?> </option>
                    <?php } ?>
                </select>
                <br>

                <label>Id Barang</label>
                <input type="text" name="id_barang" class="form-control" placeholder="Id Barang" required>

                <label>Nama Barang</label>
                <input type="text" name="nama_barang" class="form-control" placeholder="Nama Barang" required>
                
                <label>Harga</label>
                <input type="number" name="harga" class="form-control" placeholder="Harga" required>
              </div>
              
              <button type="submit" class="btn btn-primary">Simpan</button>
              <button type="reset" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </form>
        </div>
        <div class="modal-footer">

        </div>
    </div>
</div>
</div>

</div>