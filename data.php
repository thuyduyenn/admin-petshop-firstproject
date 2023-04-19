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






?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đã lưu</title>
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
             <a href="donhang.php">Đơn hàng online  </a>
        </ul>
        <form action="data.php" method="get" class="search">
            <input type="search" name="search" placeholder="Bạn cần tìm gì.....">
            <label class="bx bx-search-alt-2"></label>
        </form>
    
      </header>
      <div class="data">
          <div class="data-container">
            <?php
                
 if((isset($_POST['luudata']))&&($_POST['luudata'])){
    // echo '<script> alert("đã nhận nút submit");</script>';
           if((isset($_SESSION['giohang1']))&&(count($_SESSION['giohang1']) > 0)){
                            // echo '<script> alert("'.(print_r($_SESSION['giohang'])).'");</script>';   
                 for($i = 0; $i < count($_SESSION['giohang1']);$i++){
                        $tenkh = $_SESSION['giohang1'][$i][0];
                        $sđt =  $_SESSION['giohang1'][$i][1];
                        $tensp =  $_SESSION['giohang1'][$i][2];
                        $giasp =  $_SESSION['giohang1'][$i][3];
                        $soluong =  $_SESSION['giohang1'][$i][4];
                        $thanhtien = $_SESSION['giohang1'][$i][3] * $_SESSION['giohang1'][$i][4];
                        $ngaymua = $_SESSION['giohang1'][$i][5];
                        

                       $sql = "INSERT INTO `tbl_bill` (`tenkh`,`sđt`,`tensp`,`giasp`,`soluong`,`thanhtien`,`ngaymua`) VALUES('$tenkh','$sđt','$tensp','$giasp','$soluong','$thanhtien','$ngaymua')";
                       $res = mysqli_query($conn,$sql);
                   
             
            }}}
            if((isset($_GET['search']))&&(!empty($_GET['search']))){
                $key = $_GET['search'];
                $sql1 = "SELECT * FROM tbl_bill WHERE id LIKE '%$key%' OR tenkh LIKE '%$key%' OR sđt LIKE '%$key%' OR tensp LIKE '%$key%' OR giasp LIKE '%$key%' OR soluong LIKE '%$key%' OR thanhtien LIKE '%$key%' OR ngaymua LIKE '%$key%'";
          }else if($_GET['search']=="all"|| $_GET['search']==""){
              $sql1 = "SELECT * FROM tbl_bill ";
          }
    
          
               
               $res1 = mysqli_query($conn,$sql1);
               
               if ($res1->num_rows > 0) {
                      
                
                //   echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                echo '<div class="data-box">
                <h2> Ngày :'.date("Y-m-d").'</h2>
                <table>
                <tr>
                  <th>STT</th>
                   <th>Tên khách hàng</th>
                   <th>Số điện thoại</th>
                  <th> Tên sản phẩm</th>
                  <th> Giá sản phẩm </th>
                   <th> Số lượng  </th>
                   <th> Thành tiền </th>
                   <th> Ngày mua</th>
                </tr>';
                $id=1;
                
                while($row = $res1->fetch_assoc()) {
                     $tong = $row['giasp'] * $row['soluong'];
                     $tongFormat = number_format($tong);
                     $total += $tong;

                      
                    echo '<tr>
                    <td>'.$id++.'</td>
                    <td>'.$row['tenkh'].'</td>
                    <td>'.$row['sđt'].'</td>
                    <td>'.$row['tensp'].'</td>
                    <td>'.$row['giasp'].'</td>
                    <td>'.$row['soluong'].'</td>
                    <td><span>'.$tongFormat.'</span><sup>đ</sup></sup><a href="updatedata.php?datachange='.$row['id'].'" class="update-btn">  update</a></td>
                    <td>'.$row['ngaymua'].'</td>
                    </tr>';


                };
                $totalFormat = number_format($total);   
                echo '</table>
                <div class="total">
                       <p> Tổng tiền: <span>'.$totalFormat.'</span><sup>đ</sup></p>
                </div>
                 </div>';
            }
      
           
             
            
       

            ?>
            <!-- <div class="data-box">
                <h2>Ngày 24/4/2023</h2>
                <table>
                <tr>
                  <th>STT</th>
                   <th>Tên khách hàng</th>
                   <th>Số điện thoại</th>
                  <th> Tên sản phẩm</th>
                  <th> Giá sản phẩm </th>
                   <th> Số lượng  </th>
                   <th> Thành tiền </th>
                   <th> Ngày mua</th>
                </tr>
      
                 <tr>
                     <td>1</td>
                     <td>Lê Thị Bích Ngân</td>
                     <td>0866870204</td>
                     <td> xúc xích</td>
                     <td> 40000</td>
                     <td> 2</td>
                     <td><span> 80000 </span><a href="" class="update-btn">update</a></td>
                     <td>2023/4/4</td>
                 </tr>
                 <tr>
                      <td>2</td>
                      <td>Nguyên Thị Bích Ngọc</td>
                      <td>0866870204</td>
                      <td> xúc xích</td>
                      <td> 40000</td>
                      <td> 2</td>
                      <td><span> 80000 </span><a href="" class="update-btn">update</a></td>
                      <td>2023/4/4</td>
                 </tr>
                </table>
                <div class="total">
                       <p> Tổng tiền: <span>50000</span></p>
                </div>
            </div>
            <div class="data-box">
                <h2>Ngày 25/4/2023</h2>
                <table>
                <tr>
                  <th>STT</th>
                   <th>Tên khách hàng</th>
                   <th>Số điện thoại</th>
                  <th> Tên sản phẩm</th>
                  <th> Giá sản phẩm </th>
                   <th> Số lượng  </th>
                   <th> Thành tiền </th>
                   <th> Ngày mua</th>
                </tr>
      
                 <tr>
                     <td>1</td>
                     <td>Lê Thị Bích Ngân</td>
                     <td>0866870204</td>
                     <td> xúc xích</td>
                     <td> 40000</td>
                     <td> 2</td>
                     <td><span> 80000 </span><a href="" class="update-btn">update</a></td>
                     <td>2023/4/4</td>
                 </tr>
                 <tr>
                      <td>2</td>
                      <td>Nguyên Thị Bích Ngọc</td>
                      <td>0866870204</td>
                      <td> xúc xích</td>
                      <td> 40000</td>
                      <td> 2</td>
                      <td><span> 80000 </span><a href="" class="update-btn">update</a></td>
                      <td>2023/4/4</td>
                 </tr>
                </table>
                <div class="total">
                       <p> Tổng tiền: <span>50000</span></p>
                </div>
             </div> -->
          </div>
      </div>
  
</body>
</html>