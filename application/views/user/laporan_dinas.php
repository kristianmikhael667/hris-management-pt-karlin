
<table class="table display nowrap table-striped table-bordered scroll-horizontal"><thead>
    <tr>
        <th>ID Karyawan</th>
        <th>Nomor SPPD</th>
        <th>Tanggal Keberangkatan</th>
        <th>Bulan Keberangkatan</th>
        <th>Tujuan</th>
        <th>Alasan</th>
        <th>Status</th>
    </tr>
</thead><tbody>
        <tr>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->dinasa->datadinas($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['id_karyawan'] ; ?> 
                    <?php } ?></td>
            <td><?php
                          $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->dinasa->datadinas($id_karyawan);  
                            foreach ($cek_query->result_array() as $row)
                            {       
                          ?><?php echo $row['nomor_sppd'] ; ?> 
                      <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->dinasa->datadinas($id_karyawan);  
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['tgl_keberangkatan'] ; ?> 
                    <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->dinasa->datadinas($id_karyawan);  
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['bln_keberangkatan'] ; ?> 
                    <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->dinasa->datadinas($id_karyawan);  
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['tujuan'] ; ?> 
                    <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->dinasa->datadinas($id_karyawan);  
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['alasan'] ; ?> 
                    <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->dinasa->datadinas($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['status'] ; ?> 
                    <?php } ?></td>
        </tr>
</tbody></table>
