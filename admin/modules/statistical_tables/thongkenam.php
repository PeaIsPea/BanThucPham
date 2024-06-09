<?php
    use Carbon\Carbon;
    include('../../config/connection.php');
    require('../../../Carbon/autoload.php');

    
    $subdays1 = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    $sql1 = "SELECT 
    DATE(ThoiGianLap) AS NgayDat,
    COUNT(*) AS DonHang,
    SUM(GiaTien) AS DoanhThu
FROM
    donhang
WHERE XuLy = '1' AND
    DATE(ThoiGianLap) BETWEEN '$subdays1' AND '$now'
GROUP BY
    DATE(ThoiGianLap)";
    $sql_query1 = mysqli_query($mysqli, $sql1);
    while($val1 = mysqli_fetch_array($sql_query1)) {
        $chart_data1[] = array (
            'date1' => $val1['NgayDat'],
            'order1' => $val1['DonHang'],
            'sales1' => $val1['DoanhThu']
        );
    }   
    echo $data1 = json_encode($chart_data1);
?>
