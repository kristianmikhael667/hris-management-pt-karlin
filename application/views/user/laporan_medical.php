
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"><thead>
    <tr>
        <th>ID Karyawan</th>
        <th>Klaim ID</th>
        <th>Tanggal Pengajuan</th>
        <th>Status Pengajuan</th>
        <th>Tanggal Disetujui</th>
        <th>Jumlah Diajukan</th>
        <th>Jumlah Disetujui</th>
        <th>Struck</th>
        <th>Keterangan</th>
    </tr>
</thead><tbody>
        <tr>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->check_medical($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['id_karyawan'] ; ?> 
                    <?php } ?></td>
            <td><?php
                          $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->check_medical($id_karyawan); 
                            foreach ($cek_query->result_array() as $row)
                            {       
                          ?><?php echo $row['klaim_id'] ; ?> 
                      <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->check_medical($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['tanggal_pengajuan'] ; ?> 
                    <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->check_medical($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['status_pengajuan'] ; ?> 
                    <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->check_medical($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['tanggal_disetujui'] ; ?> 
                    <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->check_medical($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['jumlah_diajukan'] ; ?> 
                    <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->check_medical($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['jumlah_disetujui'] ; ?> 
                    <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->check_medical($id_karyawan);
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['struck'] ; ?> 
                    <?php } ?></td>
            <td><?php $id_karyawan = $this->session->userdata('id_karyawan');
                          $cek_query=$this->model_auth->check_medical($id_karyawan); 
                          foreach ($cek_query->result_array() as $row)
                        {          
                      ?><?php echo $row['ket'] ; ?> 
                    <?php } ?></td>
        </tr>
</tbody></table>
