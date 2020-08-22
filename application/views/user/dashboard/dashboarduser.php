<?php
function draw_calendar($month,$year){

// Draw table for Calendar 
$calendar = '
<table cellpadding="0" cellspacing="0" class="calendar">';

// Draw Calendar table headings 
$headings = array('Sun','Mon','Tue','Wed','Thur','Fri','Sat');
$calendar.= '
<tr class="calendar-row">
    <td class="calendar-day-head">'.implode('</td>
    <td class="calendar-day-head">',$headings).'</td>
</tr>';

//days and weeks variable for now ... 
$running_day = date('w',mktime(0,0,0,$month,1,$year));
$days_in_month = date('t',mktime(0,0,0,$month,1,$year));
$days_in_this_week = 1;
$day_counter = 0;
$dates_array = array();

// row for week one 
$calendar.= '<tr class="calendar-row">';

// Display "blank" days until the first of the current week 
    for($x = 0; $x < $running_day; $x++):
        $calendar.= '
    <td class="calendar-day-np"> </td>';
        $days_in_this_week++;
    endfor;

// Show days.... 
    for($list_day = 1; $list_day <= $days_in_month; $list_day++):
        if($list_day==date('d') && $month==date('n'))
        {
            $currentday='currentday';
        }
        else
        {
            $currentday='';
        }
    $calendar.= '<td class="calendar-day '.$currentday.'">';

            // Add in the day number
            if($list_day<date('d') && $month==date('n'))
            {
                $showtoday='<strong class="overday">'.$list_day.'</strong>';
            }else
            {
                $showtoday=$list_day;
            }
            $calendar.= '<div class="day-number">'.$showtoday.'</div>';

        // Draw table end
        $calendar.= '</td>';
        if($running_day == 6):
            $calendar.= '</tr>';
            if(($day_counter+1) != $days_in_month):
                $calendar.= '<tr class="calendar-row">';
            endif;
            $running_day = -1;
            $days_in_this_week = 0;
        endif;
        $days_in_this_week++; $running_day++; $day_counter++;
    endfor;

// Finish the rest of the days in the week
if($days_in_this_week < 8):
    for($x = 1; $x <= (8 - $days_in_this_week); $x++):
        $calendar.= '<td class="calendar-day-np"> </td>';
    endfor;
endif;

// Draw table final row
$calendar.= '</tr>';

// Draw table end the table 
$calendar.= '</table>';

// Finally all done, return result 
return $calendar;
}

?>


<div id="content-wrapper">
<link href="<?php echo base_url() ?>tamplate/kalendercss.css" rel="stylesheet" type="text/css">

<div class="container-fluid">

  <!-- Page Heading -->
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><b>Halaman Utama Karyawan</b></h1>
    </div>
<!-- Content Row -->

<div class="row">

  <!-- Area Chart -->
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
      <!-- Card Header - Dropdown -->
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
        <h6 class="m-0 font-weight-bold text-primary">Record Activity</h6>
        <div class="dropdown no-arrow">
          <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
          </a>
          
        </div>
      </div>
      <!-- Card Body -->
      <div class="card-body">
        <div class="chart-area">
                 <!-- Color System -->
                 <div class="row">
                    
                        <div class="card mr-4 ml-4 mb-4" style="width: 33rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center text-primary"><b>RECORD KEHADIRAN</b></h5>
                                <center>
                                <i class="fa fa-users fa-10x center" aria-hidden="true"></i>
                                </center>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('user/kehadiran') ?>" class="btn btn-primary btn-block">KLIK SAYA</a>
                            </div>
                        </div>

                        <div class="card mr-4 ml-4 mb-4" style="width: 33rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center text-success"><b>UANG TRANSPORT</b></h5>
                                <center>
                                <i class="fa fa-credit-card fa-10x center" aria-hidden="true"></i>
                                </center>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('user/uangtransport') ?>" class="btn btn-success btn-block">KLIK SAYA</a>
                            </div>
                        </div>

                        <div class="card mr-4 ml-4 mb-4" style="width: 33rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center text-warning"><b>DATA DINAS DAN PERJALANAN DINAS</b></h5>
                                <center>
                                <i class="fa fa-road fa-10x center" aria-hidden="true"></i>
                                </center>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('user/perjalanandinas') ?>" class="btn btn-warning btn-block">KLIK SAYA</a>
                            </div>
                        </div>

                        <div class="card mr-4 ml-4 mb-4" style="width: 33rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center text-danger"><b>MEDICAL REIMBUST</b></h5>
                                <center>
                                <i class="fa fa-medkit fa-10x center" aria-hidden="true"></i>
                                </center>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('user/medicalreimbust') ?>" class="btn btn-danger btn-block">KLIK SAYA</a>
                            </div>
                        </div>

                        <div class="card mr-4 ml-4 mb-4" style="width: 33rem;">
                            <div class="card-body">
                                <h5 class="card-title text-center text-dark"><b>PURCHASE REQUEST & MANAJEMEN BARANG</b></h5>
                                <center>
                                <i class="fa fa-cubes fa-10x" aria-hidden="true"></i>
                                </center>
                            </div>
                            <div class="card-footer">
                                <a href="<?php echo base_url('user/databarang') ?>" class="btn btn-dark btn-block">KLIK SAYA</a>
                            </div>
                        </div>
                        
                   
                </div>
            
                  </div>
                  
                  <div class="mt-4 text-center small">
                     
                      
                  </div>
      </div>
    </div>
  </div>



  <!-- Pie Chart -->
  <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Calender</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                   
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $tgl = date('d-M-Y');
                        $bulan = date('m');
                        $tahun = date('Y');
                        echo '<h2>' . $tgl .'</h2>';
                        echo draw_calendar($bulan,$tahun)
                    ?>
               
                    
                  </div>
                </div>
              </div>
            </div>
          </div>

<!-- Content Row -->
<div class="row">

  <!-- Content Column -->
  <div class="col-lg-6 mb-4">

    


  </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
