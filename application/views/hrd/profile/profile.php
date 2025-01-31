<div id="content-wrapper">

      <div class="container-fluid">


<ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a>
            
            </a>
          </li>
          
        </ol>

        <!-- Icon Cards-->
        <div class="row">
        
        </div>
 
 <!-- Area Chart Example-->
 <form action="<?php echo base_url()?>hrd/profile/edit"  method="post" enctype="multipart/form-data">
        <?php	
        
        $id_karyawan = $this->session->userdata('id_karyawan');
        
        $cek_data = $this->karyawan->check_employe($id_karyawan);

        foreach ($cek_data->result_array() as $row)
        {
          
          ?>
        <div class="row">
          <div class="col-lg-8">
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-bar"></i>
                View Profil</div>
              <div class="card-body">
                  ID Karyawan
                  <div class="card-footer small text-muted"><?php echo $row['id_karyawan'] ?></div><br>
                  Jenis Kelamin
                  <div class="card-footer small text-muted"><?php echo $row['jenis_kelamin'] ?></div><br>
                  Nama
                  <div class="card-footer small text-muted"><?php echo $row['nama_karyawan'] ?></div><br>
                  Jabatan
                  <div class="card-footer small text-muted"><?php
                   $jabatan = $row['kode_bagian'];
                   
                  if($jabatan == 1){
                     echo "CEO";
                  }
                  else if($jabatan == 2){
                    echo "Manger";
                  }
                  else if($jabatan == 3){
                    echo "AM";
                  }
                  else if($jabatan == 4){
                    echo "HR";
                  }
                  else if($jabatan == 5){
                    echo "Web Dev";
                  }
                  else if($jabatan == 6){
                    echo "Desain Grafis";
                  }
                  else if($jabatan == 7){
                    echo "Sales";
                  }
                   ?></div><br>
                  Alamat
                  <div class="card-footer small text-muted"><?php echo $row['alamat']  ?></div><br>
                  Nomor Telepon
                  <div class="card-footer small text-muted"><?php echo $row['nomor_telepon']  ?></div><br>
                  Email
                  <div class="card-footer small text-muted"><?php echo $row['email']  ?></div><br>

              </div>
              
            </div>
          </div>
          <div class="col-lg-4">
            <div class="card mb-3">
              <div class="card-header">
                <i class=""></i>
                Profile Picture</div>
              <div class="card-body">
                <center><img style="width:200px;" src="<?php echo base_url().'assets/images/'.$row['foto'];?>"></center>
              </div>
              <div class="card-footer small text-muted"> </div>
            </div>
          </div>
        </div>
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-chart-area"></i>
            Edit Profil</div><br>
                         <div class="container"> 
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> ID KARYAWAN </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id_karyawan" readonly placeholder="ID KARYAWAN" value="<?php echo $row['id_karyawan'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> NAMA </label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_karyawan" placeholder="NAMA LENGKAP KARYAWAN" value="<?php echo $row['nama_karyawan'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> JENIS KELAMIN</label>
                            <div class="form-group col-sm-6">	
                                    <input type="radio" name="jenis_kelamin" value="L" <?php echo ($row['jenis_kelamin'] == 'L') ? "checked": "" ?> > Laki - Laki <br>
                                    <input type="radio" name="jenis_kelamin" value="P" <?php echo ($row['jenis_kelamin'] == 'P') ? "checked": "" ?> > Perempuan <br>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label"> DEVISI </label>
                            <div class="col-sm-8">
                                <select class="form-control" name="kode_bagian" required >
                                    <option <?php echo ($row['kode_bagian'] == '1') ? "selected": "" ?> value="01"> CEO </option>
                                    <option <?php echo ($row['kode_bagian'] == '2') ? "selected": "" ?> value="02"> MANAGER </option>
                                    <option <?php echo ($row['kode_bagian'] == '3') ? "selected": "" ?> value="03"> MANAGER </option>
                                    <option <?php echo ($row['kode_bagian'] == '4') ? "selected": "" ?> value="04"> AM </option>
                                    <option <?php echo ($row['kode_bagian'] == '5') ? "selected": "" ?> value="05"> HR </option>
                                    <option <?php echo ($row['kode_bagian'] == '6') ? "selected": "" ?> value="06"> WEB DEV </option>
                                    <option <?php echo ($row['kode_bagian'] == '7') ? "selected": "" ?> value="07"> DESAIN GRAFIS </option>
                                    <option <?php echo ($row['kode_bagian'] == '8') ? "selected": "" ?> value="08"> SALES </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> AKSES WEB </label>
                            <div class="form-group col-sm-6">	
                                    <input type="radio"  name="role_id" value="1" <?php echo ($row['role_id'] == '1') ? "checked": "" ?> > MANAGEMENT <br>
                                    <input type="radio"  name="role_id" value="2" <?php echo ($row['role_id'] == '2') ? "checked": "" ?> >  HR <br>
                                    <input type="radio"  name="role_id" value="3" <?php echo ($row['role_id'] == '3') ? "checked": "" ?> > USER
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> ALAMAT </label>
                            <div class="form-group col-sm-8">	
                                <textarea name="alamat" class="form-control" cols="20" rows="4"><?php echo $row['alamat']  ?> </textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> NOMOR TELEPON </label>
                            <div class="form-group col-sm-8">	
                                <input type="text" class="form-control" name="nomor_telepon" placeholder="NOMOR TELEPON" value="<?php echo $row['nomor_telepon'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> EMAIL </label>
                            <div class="form-group col-sm-8">	
                                <input type="text" class="form-control" name="email" placeholder="EMAIL" value="<?php echo $row['email'] ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> PASSWORD </label>
                            <div class="form-group col-sm-8">	
                                <input type="text" class="form-control" name="password" placeholder="PASSWORD" value="<?php echo sha1($row['password']) ?>" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> TANGGAL LAHIR </label>
                            <div class="form-group col-sm-8">	
                                <input type="date" class="form-control" name="tanggal_lahir" placeholder="TANGGAL LAHIR" value="<?php echo $row['tanggal_lahir'] ?>" required>  
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


          <div class="card-body">
            

          
          

    
    

     
    <div class="container">
        
    </div>
    


<?php } ?>
</form>

</div>
        </div>
            
       


          </div>
          <div class="card-footer small text-muted"> </div>
        </div>
        