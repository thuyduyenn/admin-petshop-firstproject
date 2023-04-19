<?php
session_start();
$host = "localhost";
$username = "root";
$password = "";
$dbname ="manage";
 $conn = new mysqli($host,$username,$password,$dbname);
if($conn->connect_error){
    die("connect error" .$conn->connect_error);
    
 }
if((isset($_POST['nhaphang']))&&($_POST['nhaphang'])){
       $name = $_POST['name'];
       $price = $_POST['price'];
       $soluong = $_POST['soluong'];
       $thanhtien =$price * $soluong ;
       $date = date("Y-m-d");
       $sql = "INSERT INTO `tbl_nhaphang` (`tensp`,`giasp`,`soluong`,`thanhtien`,`ngaymua`) VALUES ('$name','$price','$soluong','$thanhtien','$date')";
       $res = mysqli_query($conn,$sql);
       



}
$conn=null;

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nhập hàng</title>
    <link rel="stylesheet" href="./style5.css">
    <link rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
</head>
<body>
<header>
        <ul class="nav-menu">
         
             <a href="index.php"> Hôm nay</a>
             <a href="data.php"> Đã lưu </a>
             <a href="nhaphang.php">Nhập hàng </a>
             <a href="donhang.php">Đơn hàng online </a>
         
        </ul>
        <form action="nhaphang.php" method="get" class="search">
            <input type="search" name="nhaphang" placeholder="Bạn cần tìm gì.....">
            <label class="bx bx-search-alt-2"></label>
           </form>
</header>
<div class="nhaphang">
<section class="index-form">
       <form action="nhaphang.php" method="post">
             <h1>Nhập kho hàng</h1>
             <label for="name">Tên sản phẩm</label>
             <input type="text" id="name" name="name" placeholder="nhập tên người mua...">
              <label for="price">Giá một sản phẩm</label>
             <input type="text" name="price" id="price" placeholder="giá sản phẩm.....">

             <input type="number"  name="soluong" min="1" value="1">
             <input type="submit" name="nhaphang" value="nhaphang">

      </form>
</section>
<section class="index-table"> 
      
     <?php 
     $host = "localhost";
     $username = "root";
     $password = "";
     $dbname ="manage";
      $conn = new mysqli($host,$username,$password,$dbname);
     if($conn->connect_error){
         die("connect error" .$conn->connect_error);
         
      }
      if((isset($_GET['nhaphang']))&&($_GET['nhaphang'] !=="") &&($_GET['nhaphang'] !=="all")){
              
               $textsearch = $_GET['nhaphang'];
               // echo '<script> alert("'.$textsearch.'");</script>';
               $sql1 = "SELECT * FROM tbl_nhaphang WHERE id LIKE '%$textsearch%' OR tensp LIKE '%$textsearch%' OR giasp LIKE '%$textsearch%' OR soluong LIKE '%$textsearch%' OR thanhtien LIKE '%$textsearch%' OR ngaymua LIKE '%$textsearch%'";
             
      }else {
          // echo '<script>alert("rỗng");</script>';
                $sql1 = "SELECT * FROM tbl_nhaphang";
      }
      $res1 = mysqli_query($conn,$sql1);
      $count1 = mysqli_num_rows($res1);
    
     
     if($count1 > 0 ){
              echo '
              <h1>Đơn hàng đã nhập kho</h1>
              <div class="scrollbar">
               <table>
                
               <tr>
                    <th>STT</th>
          
            
                    <th> Tên sản phẩm</th>
                    <th> Giá sản phẩm </th>
                    <th> Số lượng  </th>
                    <th> Thành tiền </th>
                    <th> Ngày nhập </th>
               </tr>';
       
         $id=1;
          while($row1 = $res1->fetch_assoc()){
               $tong = $row1['giasp'] * $row1['soluong'];
               $tongFormat = number_format($tong);
               $total += $tong;

                echo '<tr>
                <td>'.$id++.'</td>
           
                <td>'.$row1['tensp'].'</td>
                <td>'.$row1['giasp'].'</td>
                <td>'.$row1['soluong'].'</td>
                <td><span>'.$tongFormat.'</span><sup>đ</sup></td>
                <td>'.$row1['ngaymua'].'</td>
                </tr>';
          }

          $totalFormat = number_format($total);
          echo '</table>
   
          </div>
          <div class="total-in-day">
                <p> Tổng tiền: <span>'.$totalFormat.'</span><sup>đ</sup></p>
           </div>';
       }
          ?>
    
      
         <!-- <tr>
              <td>1</td>
         
              <td> xúc xích</td>
              <td> 40000</td>
              <td> 2</td>
              <td><span> 80000 </span><a href="" class="update-btn">update</a></td>
              <td>2023/4/4</td>
         </tr>
         <tr>
              <td>2</td>
         
              <td> xúc xích</td>
              <td> 40000</td>
              <td> 2</td>
              <td><span> 80000 </span><a href="" class="update-btn">update</a></td>
              <td>2023/4/4</td>
         </tr>
         <tr>
              <td>3</td>
            
              <td> xúc xích</td>
              <td> 40000</td>
              <td> 2</td>
              <td><span> 80000 </span><a href="" class="update-btn">update</a></td>
              <td>2023/4/4</td>
         </tr>
         <tr>
              <td>3</td>
         
              <td> xúc xích</td>
              <td> 40000</td>
              <td> 2</td>
              <td><span> 80000 </span><a href="" class="update-btn">update</a></td>
              <td>2023/4/4</td>
         </tr>
         <tr>
              <td>3</td>
          
              <td> xúc xích</td>
              <td> 40000</td>
              <td> 2</td>
              <td><span> 80000 </span><a href="" class="update-btn">update</a></td>
              <td>2023/4/4</td>
         </tr>
         <tr>
              <td>3</td>
         
              <td> xúc xích</td>
              <td> 40000</td>
              <td> 2</td>
              <td><span> 80000 </span><a href="" class="update-btn">update</a></td>
              <td>2023/4/4</td>
         </tr>
          -->

 
</section>
</div>
</body>
</html>