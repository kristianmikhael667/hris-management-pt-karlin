<?php
 
 header("Content-type: application/vnd-ms-excel");
 
 header("Content-Disposition: attachment; filename=$title.xls");
 
 header("Pragma: no-cache");
 
 header("Expires: 0");
 
 ?>

<table class="table display nowrap table-striped table-bordered scroll-horizontal">
    <thead>
        <tr>
            <td>No.</td>
            <th>Id Karyawan</th>
            <th>Klaim ID</th>
            <th>Tanggal Pengajuan</th>
            <th>Status Pengajuan</th>
            <th>Tanggal Disetujui</th>
            <th>Jumlah Diajukan</th>
            <th>Jumlah Disetujui</th>
            <th>Stuck</th>
            <th>Keterangan</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $a=1;
           $cek_query=$this->medical->list(); 
           foreach ($cek_query->result_array() as $row)
           {       
        ?>
           <tr>
            <td><?php echo $a++; ?></td>
            <td><?php echo $row['id_karyawan'] ; ?></td>
            <td><?php echo $row['klaim_id'] ; ?></td>
            <td><?php echo $row['tanggal_pengajuan'] ; ?></td>
            <td><?php echo $row['status_pengajuan'] ; ?></td>
            <td><?php echo $row['tanggal_disetujui'] ; ?></td>
            <td><?php echo $row['jumlah_diajukan'] ; ?></td>
            <td><?php echo $row['jumlah_disetujui'] ; ?></td>
            <td><img style="width: 100px;" src="<?php echo base_url().'assets/images/'.$row['struck'];?>"></td>
            <td><?php echo $row['ket'] ; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
