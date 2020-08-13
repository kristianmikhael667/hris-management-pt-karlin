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
            <th>Nomor Purchase Request</th>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Harga</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $a=1;
           $cek_query=$this->manajemenbarang->tampil_dat(); 
           foreach ($cek_query->result_array() as $row)
           {       
        ?>
           <tr>
            <td><?php echo $a++; ?></td>
            <td><?php echo $row['id_purchase_request'] ; ?></td>
            <td><?php echo $row['id_barang'] ; ?></td>
            <td><?php echo $row['nama_barang'] ; ?></td>
            <td><?php echo $row['harga'] ; ?></td>
            <td><?php echo $row['status'] ; ?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
