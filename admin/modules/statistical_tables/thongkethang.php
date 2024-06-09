<?php
    use Carbon\Carbon;
    include('../../config/connection.php');
    require('../../../Carbon/autoload.php');
    $subdays2 = Carbon::now('Asia/Ho_Chi_Minh')->subDays(30)->toDateString();
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    $sql2 = "SELECT 
    DATE(ThoiGianLap) AS NgayDat,
    COUNT(*) AS DonHang,
    SUM(GiaTien) AS DoanhThu
FROM
    donhang
WHERE XuLy = '1' AND
    DATE(ThoiGianLap) BETWEEN '$subdays2' AND '$now'
GROUP BY
    DATE(ThoiGianLap)";
    $sql_query2 = mysqli_query($mysqli, $sql2);
    while($val2 = mysqli_fetch_array($sql_query2)) {
        $chart_data2[] = array (
            'date2' => $val2['NgayDat'],
            'order2' => $val2['DonHang'],
            'sales2' => $val2['DoanhThu']
        );
    }
    echo $data2 = json_encode($chart_data2);
?>