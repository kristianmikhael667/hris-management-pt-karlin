
<table class="table display nowrap table-striped table-bordered scroll-horizontal"><thead>
    <tr>
        <th>ID Karyawan</th>
        <th>Tanggal</th>
        <th>Uang Bensin</th>
        <th>Uang Parkir</th>
        <th>Status</th>
    </tr>
</thead><tbody>
        <tr>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->uangtr($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['id_karyawan'] ; ?> 
                    <?php } ?></td>
            <td><?php
                          $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->uangtr($id_karyawan); 
                            foreach ($cek_query->result_array() as $row)
                            {       
                          ?><?php echo $row['tanggal'] ; ?> 
                      <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->uangtr($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['uang_bensin'] ; ?> 
                    <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->uangtr($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['uang_parkir'] ; ?> 
                    <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->uangtr($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['status'] ; ?> 
                    <?php } ?></td>
        </tr>
</tbody></table>
