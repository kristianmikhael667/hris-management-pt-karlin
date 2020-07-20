
<table class="table display nowrap table-striped table-bordered scroll-horizontal"><thead>
    <tr>
        <th>ID Karyawan</th>
        <th>Jumlah Hadir</th>
        <th>Jumlah Cuti</th>
        <th>Jumlah Izin</th>
        <th>Jumlah Sakit</th>
    </tr>
</thead><tbody>
        <tr>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->kehadiran($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['id_karyawan'] ; ?> 
                    <?php } ?></td>
            <td><?php
                          $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->kehadiran($id_karyawan); 
                            foreach ($cek_query->result_array() as $row)
                            {       
                          ?><?php echo $row['jumlah_hadir'] ; ?> 
                      <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->kehadiran($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['jumlah_cuti'] ; ?> 
                    <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->kehadiran($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['jumlah_izin'] ; ?> 
                    <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->kehadiran($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['jumlah_sakit'] ; ?> 
                    <?php } ?></td>
        </tr>
</tbody></table>
