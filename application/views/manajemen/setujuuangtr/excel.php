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
            <th>Uang Bensin</th>
            <th>Uang Parkir</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $a=1;
           $cek_query=$this->uang_transport->hitunguang(); 
           foreach ($cek_query->result_array() as $row)
           {       
        ?>
           <tr>
            <td><?php echo $a++; ?></td>
            <td><?php echo $row['id_karyawan'] ; ?></td>
            <td>Rp.<?php echo number_format($row['jumlah_hadir']*$row['uang_bensin']) ; ?></td>
            <td>Rp.<?php echo number_format($row['jumlah_hadir']*$row['uang_parkir']) ; ?></td>
            <td><?php echo $row['status'] ; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
