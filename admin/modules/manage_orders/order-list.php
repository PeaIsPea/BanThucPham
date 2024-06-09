<?php
    include("config/connection.php");
    $sql_CountOrder1=mysqli_query($mysqli,"SELECT * FROM donhang WHERE XuLy= '1'");
    $CountOrder1= mysqli_num_rows($sql_CountOrder1);
    $sql_AllMoney=mysqli_query($mysqli,"SELECT GiaTien FROM donhang where XuLy='1'");
    $i=0;
    while( $allMoney=mysqli_fetch_array($sql_AllMoney)){
        $i+=$allMoney['GiaTien'];
    }
    $AllMoney=0;
    $AllMoney=$i;
    $sql_CountOrder2=mysqli_query($mysqli,"SELECT * FROM donhang WHERE XuLy= '0' ");
    $CountOrder2= mysqli_num_rows($sql_CountOrder2);
    $sql_CountOrder3=mysqli_query($mysqli,"SELECT ID_DonHang FROM donhang WHERE XuLy= '2'");
    $CountOrder3= mysqli_num_rows($sql_CountOrder3);
?>
<div class="container-fluid py-5">  
    <div class="row">
        <div class="col">
                <div class="card text-white bg-primary mb-3" style="max-width: 18rem; height: 180px;">
                <div class="card-header">DOANH SỐ</div>
                <div class="card-body">
                    <h5 class="card-title"><?php echo number_format($AllMoney,0,',','.') ?> đ</h5>
                    <p class="card-text">Doanh số hệ thống</p>
                </div>
             </div>
        </div>
        <div class="col">
            <div class="card text-white bg-success mb-3" style="max-width: 18rem; height: 180px;">
                <div class="card-header">ĐƠN HÀNG THÀNH CÔNG</div>
                <div class="card-body">
                    <h5 class="card-title"><?php  echo $CountOrder1 ?></h5>
                    <p class="card-text">Đơn hàng giao dịch thành công</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-danger mb-3" style="max-width: 18rem; height: 180px;">
                <div class="card-header">ĐƠN HÀNG ĐANG XỬ LÝ</div>
                <div class="card-body">
                    <h5 class="card-title"><?php  echo $CountOrder2 ?></h5>
                    <p class="card-text">Số lượng đơn hàng đang xử lý</p>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem; height: 180px;">
                <div class="card-header">ĐƠN HÀNG HỦY</div>
                <div class="card-body">
                    <h5 class="card-title"><?php  echo $CountOrder3 ?></h5>
                    <p class="card-text">Số đơn bị hủy trong hệ thống</p>
                </div>
            </div>
    </div>
</div>
    <!-- end analytic  -->
    <div class="card">
        <div class="card-header font-weight-bold">
            ĐƠN HÀNG ĐANG CHỜ DUYỆT
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Mã ĐH</th>
                        <th scope="col">Khách hàng</th>
                        <th scope="col">Giá tiền</th>
                        <th scope="col">SĐT</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Thời gian</th>
                        <th scope="col">Thanh toán</th>
                        <th scope="col">Duyệt/Hủy</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $i=0;
                    while($row=mysqli_fetch_array($sql_CountOrder2)){
                    $i++;?>
                    <tr>
                        <th scope="row"><?php echo $i?></th>
                        <td><?php echo $row['ID_DonHang']?></td>
                        <td>
                            <?php echo $row['NguoiNhan']?>
                        </td>
                        <td><?php echo $row['GiaTien']?> VND</td>
                        <td><a href="#"><?php echo $row['SoDienThoai']?></a></td>
                        <td><?php echo $row['DiaChi']?></td>
                        <td><?php echo $row['ThoiGianLap']?></td>
                        <td><?php echo $row['HinhThucThanhToan']?></td>
                        <td>
                            <a href="modules/manage_orders/browse-order.php?id=<?php echo $row['ID_DonHang']?>" class="btn btn-success btn-sm text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-check-square"></i></a>
                            <a href="modules/manage_orders/cancel-order.php?id=<?php echo $row['ID_DonHang']?>" class="btn btn-danger btn-sm text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>