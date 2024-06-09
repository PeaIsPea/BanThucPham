<?php
    include("../../config/connection.php"); 
    require('../../../tfpdf/tfpdf.php');
    $id_order = $_GET['id'];
    $sql_order = "SELECT NguoiNhan, SoDienThoai, DiaChi, ThoiGianLap, HinhThucThanhToan, CodeOrder,  GiaTien
    from donhang where ID_DonHang = $id_order";
    $query_order = mysqli_query($mysqli, $sql_order);
    $row_order = mysqli_fetch_assoc($query_order);
    $sql_order_detail = "SELECT TenSanPham, chitietdonhang.SoLuong,
    chitietdonhang.GiaMua from sanpham inner join chitietdonhang
    on chitietdonhang.ID_SanPham = sanpham.ID_SanPham
    where chitietdonhang.ID_DonHang = $id_order";
    $query_order_detail = mysqli_query($mysqli, $sql_order_detail);
    $pdf = new tFPDF();
    $pdf->AddPage();
    $pdf->AddFont('DejaVu','','DejaVuSansCondensed.ttf',true);
    $pdf->SetFont('DejaVu','',14);
	$pdf->SetFillColor(235,236,236); 
    $pdf->Write(10,'=================== HÓA ĐƠN MUA HÀNG =================');
	$pdf->Ln(15);
    $pdf->Write(10,'Khách hàng: '.$row_order['NguoiNhan'].'. ');
    $pdf->Write(10,'Số điện thoại: '.$row_order['SoDienThoai']);
	$pdf->Ln(10);
    $pdf->Write(10,'Địa chỉ: '.$row_order['DiaChi'].'. ');
    $pdf->Write(10,'Thời gian: '.$row_order['ThoiGianLap']);
	$pdf->Ln(10);
    $pdf->Write(10,'Thanh toán: '.$row_order['HinhThucThanhToan']);
	$pdf->Ln(10);
    $pdf->Write(10,'Code: '.$row_order['CodeOrder']. '. Đơn hàng gồm có:');
	$pdf->Ln(10);
	$width_cell=array(20,80,20,30,40);
	$pdf->Cell($width_cell[0],10,'STT',1,0,'C',true);
	$pdf->Cell($width_cell[1],10,'Tên sản phẩm',1,0,'C',true);
	$pdf->Cell($width_cell[2],10,'SL',1,0,'C',true); 
	$pdf->Cell($width_cell[3],10,'Giá',1,0,'C',true);
	$pdf->Cell($width_cell[4],10,'Tổng',1,1,'C',true); 
	$pdf->SetFillColor(235,236,236); 
	$fill=false;
	$i = 0;
	while($row = mysqli_fetch_array($query_order_detail)){
		$i++;
	$pdf->Cell($width_cell[0],10,$i,1,0,'C',$fill);
	$pdf->Cell($width_cell[1],10,$row['TenSanPham'],1,0,'C',$fill);
	$pdf->Cell($width_cell[2],10,$row['SoLuong'],1,0,'C',$fill);
	$pdf->Cell($width_cell[3],10,number_format($row['GiaMua']),1,0,'C',$fill);
	$pdf->Cell($width_cell[4],10,number_format($row['SoLuong']*$row['GiaMua']),1,1,'C',$fill);
	$fill = !$fill;
	}
    $pdf->Write(10,'Thành tiền: '.$row_order['GiaTien'].' VND');
	$pdf->Ln(10);
    $pdf->Output();
?>