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
            <th>ID Karyawan</th>
            <th>Nomor SPPD</th>
            <th>Tanggal Keberangkatan</th>
            <th>Bulan Keberangkatan</th>
            <th>Tujuan</th>
            <th>Alasan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $a=1;
           $cek_query=$this->datadinas->tampil_data(); 
           foreach ($cek_query->result_array() as $row)
           {       
        ?>
           <tr>
            <td><?php echo $a++; ?></td>
             <td><?php echo $row['id_karyawan'] ; ?></td>
             <td><?php echo $row['nomor_sppd'] ; ?></td>
             <td><?php echo $row['tgl_keberangkatan'] ; ?></td>
             <td><?php echo $row['bln_keberangkatan'] ; ?></td>
             <td><?php echo $row['tujuan'] ; ?></td>
             <td><?php echo $row['alasan'] ; ?></td>
             <td><?php echo $row['status'] ; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
