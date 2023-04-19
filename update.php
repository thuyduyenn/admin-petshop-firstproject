<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
    <link rel="stylesheet" href="./style5.css">
</head>
<body>
    <div class="update">
     <?php 
     if((isset($_GET['sessid']))&&($_GET['sessid'] >= 0)){
               echo '<form action="index.php?changeid='.$_GET['sessid'].'" method="post">
               <h1> Bạn cần thay đổi gì </h1>
               <label for="name">Tên khách hàng</label>
               <input type="text" id="name" name="nameupdate" placeholder="nhập tên người mua..." value="'.$_SESSION['giohang1'][$_GET['sessid']][0].'">
               <label for="phone"> Số điện thoại</label>
               <input type="text" name="phoneupdate" id="phone" placeholder="nhập số điện thoại khách hàng..." value="'.$_SESSION['giohang1'][$_GET['sessid']][1].'">
               <label for="product">Tên sản phẩm</label>
               <input type="text" id="product" name="productupdate" placeholder=" nhập tên sản phẩm " value="'.$_SESSION['giohang1'][$_GET['sessid']][2].'">
               <label for="price">Giá một sản phẩm</label>
               <input type="text" name="priceupdate" id="price" placeholder="giá sản phẩm....." value="'.$_SESSION['giohang1'][$_GET['sessid']][3].'">
  
               <input type="number"  name="soluongupdate" min="1" value="'.$_SESSION['giohang1'][$_GET['sessid']][4].'">
               <input type="submit" name="change" value="Thay đổi">
  
        </form>';
     }
     ?>  
    
    </div>
</html>