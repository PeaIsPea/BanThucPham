<?php
    $query_order = mysqli_query($mysqli, "SELECT * FROM donhang where XuLy='2' order by ID_DonHang DESC");
?>

<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
            <h5 class="m-0 ">Đơn hàng đã hủy</h5>
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
            </tr>
        </thead>
        <tbody>
            <?php 
            $num=0;
            while( $row_Order=mysqli_fetch_array($query_order)) {
            $num++;
            ?>
            <tr>
                <td><?php echo $num?></td>
                <td><?php echo $row_Order['ID_DonHang']?></td>
                <td><?php echo $row_Order['ID_ThanhVien']?></td>
                <td><?php echo $row_Order['ThoiGianLap']?></td>
                <td><?php echo $row_Order['DiaChi']?></td>
                <td><?php echo number_format($row_Order['GiaTien'],0,',','.')?> VND</td>
                <td>
                    <a href="?order=order-detail&id=<?php echo $row_Order['ID_DonHang']?>">Xem chi tiết</a>
                </td>
            </tr>
        <?php
        }
        ?>
        </tbody>
    </table>
        </div>
    </div>
</div>