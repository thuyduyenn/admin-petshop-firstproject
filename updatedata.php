<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname ="manage";
 $conn = new mysqli($host,$username,$password,$dbname);
if($conn->connect_error){
    die("connect error" .$conn->connect_error);
  }  
//  }else {
//     echo '<script>alert("oke r");</script>';
//  }
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
     if((isset($_GET['datachange']))&&($_GET['datachange'] >= 0)){
              $idchange = $_GET['datachange']; 
              $sql = "SELECT * FROM tbl_bill WHERE id='$idchange'";
              $res = mysqli_query($conn,$sql);
              $count = mysqli_num_rows($res);
              if($count > 0 ){
                while($row = $res->fetch_assoc()){

                echo '<form action="updatedata.php" method="post">
                <h1> Bạn cần thay đổi gì </h1>
                <label for="name">Tên khách hàng</label>
                <input type="text" id="name" name="nameupdate" placeholder="nhập tên người mua..." value="'.$row['tenkh'].'">
                <label for="phone"> Số điện thoại</label>
                <input type="text" name="phoneupdate" id="phone" placeholder="nhập số điện thoại khách hàng..." value="'.$row['sđt'].'">
                <label for="product">Tên sản phẩm</label>
                <input type="text" id="product" name="productupdate" placeholder=" nhập tên sản phẩm " value="'.$row['tensp'].'">
                <label for="price">Giá một sản phẩm</label>
                <input type="text" name="priceupdate" id="price" placeholder="giá sản phẩm....." value="'.$row['giasp'].'">
                <input type="hidden" name="id" value="'.$idchange.'">
                <input type="number"  name="soluongupdate" min="1" value="'.$row['soluong'].'">
                <input type="submit" name="change" value="Thay đổi">
   
         </form>';
              }

               
     }
     }
     if((isset($_POST['change']))&&($_POST['change'])){
           $id = $_POST['id'];
           $tenkh = $_POST['nameupdate'];
           $phone = $_POST['phoneupdate'];
           $tensp = $_POST['productupdate'];
           $giasp = $_POST['priceupdate'];
           $soluong = $_POST['soluongupdate'];
       
           $sql1 = "UPDATE tbl_bill SET tenkh='$tenkh', sđt='$phone', tensp='$tensp', giasp='$giasp', soluong='$soluong' WHERE id='$id'";
           $res1 = mysqli_query($conn,$sql1);
           if($res1==true){
            
              header('location: http://localhost/third-project/data.php');
           }
    }
     ?>  
    
    </div>
</html>
