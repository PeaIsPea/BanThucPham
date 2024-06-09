<?php
$sql_getList = "SELECT * FROM danhmuc ORDER BY ID_DanhMuc ASC";
$query_getList= mysqli_query($mysqli, $sql_getList);
?>
<div class="text-white mt-60" >
  <p><i class="fas fa-list"></i> DANH MỤC</p>
  <ul class="list-unstyled">
    <?php
      while ($row_getList= mysqli_fetch_array($query_getList)) {
    ?>
      <li class="p-2 mt-2">
        <a class="text-white" 
        href="index.php?navigate=category&id=<?php echo $row_getList['ID_DanhMuc']?>"><?php echo $row_getList['TenDanhMuc']?>
        </a>
      </li>
    <?php
      }
    ?>
  </ul>
</div>