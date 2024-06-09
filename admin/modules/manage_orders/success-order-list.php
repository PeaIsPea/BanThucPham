<?php
    $query_order = mysqli_query($mysqli,"SELECT * FROM donhang where XuLy='1' order by ID_DonHang DESC");
?>

<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Doanh thu của cửa hàng</h5>
        </div>
     
          
    <table class="table table-striped table-checkall">
        <thead>
            <tr>
                <th scope="col">STT</th>
                <th scope="col">ID đơn hàng</th>
                <th scope="col">ID thành viên</th>
                <th scope="col">Thời gian</th>
                <th scope="col">Địa chỉ</th>
                <th scope="col">Giá tiền</th>
                <th scope="col">Xem chi tiết</th>
                <th scope="col">In</th>
            </tr>
        </thead>
        <tbody>
           <?php 
           $sum=0;
           $num=0;
           while( $row_Order=mysqli_fetch_array($query_order)){
            $sum+=$row_Order['GiaTien']; 
            $num++;
            ?>
            <tr>
                <td><?php echo $num ?></td>
                <td><?php echo $row_Order['ID_DonHang']?></td>
                <td><?php echo $row_Order['ID_ThanhVien']?></td>
                <td><?php echo $row_Order['ThoiGianLap']?></td>
                <td><?php echo $row_Order['DiaChi']?></td>
                <td><?php echo number_format($row_Order['GiaTien'],0,',','.')?> VND</td>
                <td><a href="?order=order-detail&id=<?php echo $row_Order['ID_DonHang']?>">Xem chi tiết</a></td>
                <td>
                    <a target="_blank" href="modules/manage_orders/indonhang.php?id=<?php echo $row_Order['ID_DonHang']?>">In</a>
                </td>
            </tr>
        <?php
        }
         $AllMoney=$sum;  
        ?>
        <tr>
            <th colspan="2">Số đơn: <?= $num ?></th>
            <th colspan="5">Tổng tiền: <?= number_format($AllMoney,0,',','.') ?> VND</th>
        </tr>
        </tbody>
    </table>
        </div>
    </div>
</div>