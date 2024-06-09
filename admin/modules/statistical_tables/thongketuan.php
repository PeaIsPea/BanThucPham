<?php
    use Carbon\Carbon;
    include('../../config/connection.php');
    require('../../../Carbon/autoload.php');
    $subdays3 = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    $sql3 = "SELECT 
    DATE(ThoiGianLap) AS NgayDat,
    COUNT(*) AS DonHang,
    SUM(GiaTien) AS DoanhThu
FROM
    donhang
WHERE XuLy = '1' AND
    DATE(ThoiGianLap) BETWEEN '$subdays3' AND '$now'
GROUP BY
    DATE(ThoiGianLap)";
    $sql_query3 = mysqli_query($mysqli, $sql3);
    while($val3 = mysqli_fetch_array($sql_query3)) {
        $chart_data3[] = array (
            'date3' => $val3['NgayDat'],
            'order3' => $val3['DonHang'],
            'sales3' => $val3['DoanhThu']
        );
    }
    // print_r($chart_data3);
    echo $data3 = json_encode($chart_data3);
?>