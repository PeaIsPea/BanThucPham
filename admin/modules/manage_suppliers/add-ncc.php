<div id="content" class="container-fluid">
    <div class="card">
        <div class="card-header font-weight-bold">
         Thêm nhà cung cấp
     </div>
     <div class="card-body">
        <form method="POST" action="modules/manage_suppliers/add.php" enctype="multipart/form-data">
            <div class="form-group">
                <label class="text-danger "for="name">Tên nhà cung cấp:</label>
                <input required class="form-control" type="text" name="TenNCC">
            </div>
            <div class="form-group">
                <label for="name">Mô tả:</label>
                <textarea class="form-control" name="MoTa"></textarea>
            </div>
            <div class="form-group">
                <label for="name">Email:</label>
                <input required class="form-control" type="text" name="Email">
            </div>
            <div class="form-group">
                <label for="name">Số điện thoại:</label>
                <input required class="form-control" type="text" name="SoDienThoai">
            </div>
            <div class="form-group">
                <label for="name">Địa chỉ:</label>
                <input required class="form-control" type="text" name="DiaChi">
            </div>
            <div class="form-group">
               <label>Hình ảnh:</label>
               <input required class="form-control" type="file" name="Img" accept="image/*">
           </div>
           <input type="submit" class="btn btn-primary" value="Thêm mới" name="submit">
       </form>
   </div>
</div>
</div>