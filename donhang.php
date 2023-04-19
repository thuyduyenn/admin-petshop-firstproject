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
//     echo '<script>alert("kết nối thành công");</script>';
//  }

if((isset($_POST['update']))&&($_POST['update'])){
    $option = $_POST['trangthai'];
    $updateid = $_POST['updateid'];
    $update = "UPDATE tbl_thontinkh SET trangthai='$option' WHERE id='$updateid'";
    $resupdate = mysqli_query($conn,$update);
    
 
}
if((isset($_GET['deleteid']))&&($_GET['deleteid'] > 0)){
       $deleteid = $_GET['deleteid'];
       $delete = "DELETE FROM tbl_thontinkh WHERE id='$deleteid'";
       $delete1 = "DELETE FROM tbl_thongtindonhang WHERE idbill='$deleteid'";
       $resdel = mysqli_query($conn,$delete);
       $resdel1 = mysqli_query($conn,$delete1);
}

?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đơn hàng</title>
    <link rel="stylesheet" href="./style5.css">

</head>
<body>
      <header>
        <ul class="nav-menu">
           
             <a href="index.php"> Hôm nay</a>
             <a href="data.php"> Đã lưu </a>
             <a href="nhaphang.php">Nhập hàng </a>
             <a href="donhang.php">Đơn hàng online </a>
        </ul>
      </header>
      <section class="detail">
        <?php
        if((isset($_GET['detail']))&&($_GET['detail'] > 0)){
               echo ' <h1>Thông tin đơn hàng</h1>';
        }
        ?>   
         
          <div class="detail-container">
              <?php
                    if((isset($_GET['detail']))&&($_GET['detail'] > 0)){
                        $idbill = $_GET['detail'];

                        $sql2 ="SELECT * FROM tbl_thongtindonhang WHERE idbill='$idbill'";
                        $res2 = mysqli_query($conn,$sql2);
                        $count2 = mysqli_num_rows($res2);
                        $sql3 = "SELECT * FROM tbl_thontinkh WHERE id='$idbill'";
                        $res3 = mysqli_query($conn,$sql3);
                        $row3 = mysqli_fetch_assoc($res3);
                        if($count2 > 0 ){
                              echo ' <div  class="thongtinkh">
                              <p> Tên khách hàng : <span>'.$row3['tenkh'].'</span></p>
                              <p> Số điện thoai : <span>'.$row3['phone'].'</span></p>
                              <p> Địa chỉ nhận hàng : <span>'.$row3['address'].'</span></p>
                       </div>
                       <div class="thongtindonhang">
                               <div class="thongtindonhang-table">
                                   
                                   <table>
                                        
                                         <tr>
                                               <th> Ảnh </th>
                                               <th> Tên </th>
                                               <th> Gía/sp</th>
                                               <th> Số lượng</th>
                                               <th> Thành tiền</th>
                                               <th> Ngày mua </th>
         
                                         </tr>';

                    }
                    while($row2 = $res2->fetch_assoc()){
                        $tong2 += $row2['thanhtien'];
                        echo '<tr>
                        <td> <div class="image"> <img src="'.$row2['hinhsp'].'"></div></td>
                        <td>'.$row2['tensp'].'</td>
                        <td>'.$row2['giasp'].'<sup>đ</sup></td>
                        <td>'.$row2['soluong'].'</td>
                        <td>'.$row2['thanhtien'].'<sup>đ</sup></td>
                        <td>'.$row3['ngaymua'].'</td>
                    </tr>';
                    }
                    $tong2Filter = number_format($tong2) ;
                    echo '</table>
                    </div>
                    <div class="thongtindonhang-total">
                          <p>Tổng hết : <span>'.$tong2Filter.'<sup>đ</sup></span></p>
                    </div>
                   </div>';



                   }
                ?>
              <!-- <div  class="thongtinkh">
                     <p> Tên khách hàng : <span>Lê Nguyễn Hùng </span></p>
                     <p> Số điện thoai : <span> 0866070204</span></p>
                     <p> Địa chỉ nhận hàng : <span> 1E 182 Tăng Nhơn Phú A Quận 9 </span></p>
              </div>
              <div class="thongtindonhang">
                      <div class="thongtindonhang-table">
                          
                          <table>
                               
                                <tr>
                                      <th> Ảnh </th>
                                      <th> Tên </th>
                                      <th> Gía/sp</th>
                                      <th> Số lượng</th>
                                      <th> Thành tiền</th>
                                      <th> Ngày mua </th>

                                </tr> -->
                                <!-- <tr>
                                    <td> <div class="image"> <img src="./image/bunrieu.jpg"></div></td>
                                    <td> Bún riêu</td>
                                    <td> 250000 <sup>đ</sup></td>
                                    <td> 3 </td>
                                    <td>75000 <sup>đ</sup></td>
                                    <td> 14/3/2022</td>
                                </tr>
                                <tr>
                                    <td> <div class="image"> <img src="./image/bunrieu.jpg"></div></td>
                                    <td> Bún riêu</td>
                                    <td> 250000 <sup>đ</sup></td>
                                    <td> 3 </td>
                                    <td>75000 <sup>đ</sup></td>
                                    <td> 14/3/2022</td>
                                </tr>
                                <tr>
                                    <td> <div class="image"> <img src="./image/bunrieu.jpg"></div></td>
                                    <td> Bún riêu</td>
                                    <td> 250000 <sup>đ</sup></td>
                                    <td> 3 </td>
                                    <td>75000 <sup>đ</sup></td>
                                    <td> 14/3/2022</td>
                                </tr>
                                <tr>
                                    <td> <div class="image"> <img src="./image/bunrieu.jpg"></div></td>
                                    <td> Bún riêu</td>
                                    <td> 250000 <sup>đ</sup></td>
                                    <td> 3 </td>
                                    <td>75000 <sup>đ</sup></td>
                                    <td> 14/3/2022</td>
                                </tr>
                                <tr>
                                    <td> <div class="image"> <img src="./image/bunrieu.jpg"></div></td>
                                    <td> Bún riêu</td>
                                    <td> 250000 <sup>đ</sup></td>
                                    <td> 3 </td>
                                    <td>75000 <sup>đ</sup></td>
                                    <td> 14/3/2022</td>
                                </tr> -->

                          <!-- </table>
                      </div>
                      <div class="thongtindonhang-total">
                            <p>Tổng hết : <span>255000 <sup>đ</sup></span></p>
                      </div>
              </div> -->
                
          </div>
      </section>
      <section class="online">
           <div>
                <table>
                <?php
                            $sql = "SELECT * FROM tbl_thontinkh ";
                            $res = mysqli_query($conn,$sql);
                            $row = mysqli_fetch_assoc($res);
                            $count = mysqli_num_rows($res);
                            if($count > 0){
                                echo '<tr>
                                <th>idbill</th>
                                <th>Tên khách hàng</th>
                            
                                 <th> Tổng tiền</th>
                                 <th> Đia chỉ nhận hàng</th>
                                 <th> Ngày mua</th> 
                                 <th> Trạng thái</th>
                                 <th> Tác vụ</th>
                           </tr>';
                            }
                            while($row = $res->fetch_assoc()) {
                                $id = $row['id'];
                             
                                 $sql1 = "SELECT * FROM tbl_thongtindonhang WHERE idbill = '$id'";
                                 $res1 = mysqli_query($conn,$sql1);
                                 $count1 = mysqli_num_rows($res1);
                                 $tong = 0;
                                 while($row1 = $res1->fetch_assoc()){
                                    $tong += $row1['thanhtien'];
                                   
                                 }
                                 $tongFilter = number_format($tong);
                                      echo '<tr>
                                      <td>'.$id.'</td>
                                      <td>'.$row['tenkh'].'</td>
                              
                                      <td>'.$tongFilter.' <sup> đ </sup></td>
                                      <td> '.$row['address'].'</td>
                                      <td> '.$row['ngaymua'].'</td>
                                       ';
                                       if((isset($_GET['updateimage']))&&($_GET['updateimage'] > 0)){
                                               echo '
                                               <td>
                                               <form action="donhang.php" method="post">
                                               <select name="trangthai" id="trangthai">
                                                    <option value="chờ">Chờ xử lí</option>
                                                    <option value="Đang">Đang xử lí</option>
                                                    <option value="Đã">Đã xử lí</option>
                                                    
                                              </select>
                                              <input type="submit" name="update" value="update">
                                              <input type="hidden" name="updateid" value="'.$id.'">
                                           </form>
                                             </td>
                                        

                                               ';

                                       }else {
                                        if($row['trangthai'] == 'chờ'){
                                            echo '  
                                            <td class="update-box"> 
                                             <div class="update-data-cho">
                                                      chờ xử lí
                                                    </div>
                                                   <a href="donhang.php?updateimage='.$id.'">update</a>
                                                   </td>';
                                       } else if($row['trangthai'] == 'Đang'){
                                           echo '
                                           <td class="update-box"> 
                                            <div class="update-data-dang">
                                                     Đang xử lí
                                                   </div>
                                                  <a href="donhang.php?updateimage='.$id.'">update</a>
                                                  </td>';
                                       } else  if($row['trangthai'] == 'Đã'){
                                           echo '  
                                           <td class="update-box"> 
                                            <div class="update-data-da">
                                                     Đã xử lí
                                                   </div>
                                                  <a href="donhang.php?updateimage='.$id.'">update</a>
                                           </td>';
                                       }
                                       }
                                    
                               
                                         
                                echo '<td> <a href="donhang.php?detail='.$id.'" id="btna">chi tiết</a> <a href="donhang.php?deleteid='.$id.'" id="btna">xoá</a></td>
                                    
                                </tr>';
                            
                                 }
                      
                            ?>
                    <!-- <tr>
                         <th>STT</th>
                         <th>Tên khách hàng</th>
                          <th> Sản phẩm </th>
                          <th> Tổng tiền</th>
                          <th> Đia chỉ nhận hàng</th>
                          <th> Ngày mua</th> 
                          <th> Trạng thái</th>
                          <th> Tác vụ</th>
                    </tr>
                    <tr>
                         <td>1</td>
                         <td> Lê Nguyên Hùng </td>
                         <td> Bún riêu </td>
                         <td> 100000 <sup> đ </sup></td>
                         <td> Thủ Đức</td>
                         <td> 14/3/2022</td>
                         <td > 
                         <div class="update-data-cho">
                                chờ xử lí
                        </div>
                        <a href="donhang.php">update</a>
                            <form action="" method="post">
                                <select name="trangthai" id="trangthai">
                                     <option value="Chờ">Chờ xử lí</option>
                                     <option value="Đang">Đang xử lí</option>
                                     <option value="Đã">Đã xử lí</option>
                                     
                               </select>
                               <button type="submit" name="update" >Update</button>
                            </form>
                         </td>
                         <td> <a href="" id="btna">chi tiết</a> <a href="" id="btna">xoá</a></td>
                       
                    </tr>
                    <tr>
                         <td>1</td>
                         <td> Lê Nguyên Hùng </td>
                         <td> Bún riêu </td>
                         <td> 100000 <sup> đ </sup></td>
                         <td> Thủ Đức</td>
                         <td> 14/3/2022</td>
                         <td class="update-box"> 
                         <div class="update-data-da">
                                chờ xử lí
                            </div>
                        <a href="donhang.php">update</a>
                            <form action="" method="post">
                                <select name="trangthai" id="trangthai">
                                     <option value="Chờ">Chờ xử lí</option>
                                     <option value="Đang">Đang xử lí</option>
                                     <option value="Đã">Đã xử lí</option>
                                     
                               </select>
                               <button type="submit" name="update" >Update</button>
                            </form>
                         </td>
                         <td> <a href="" id="btna">chi tiết</a> <a href="" id="btna">xoá</a></td>
                       
                    </tr>
                    <tr>
                         <td>1</td>
                         <td> Lê Nguyên Hùng </td>
                         <td> Bún riêu </td>
                         <td> 100000 <sup> đ </sup></td>
                         <td> Thủ Đức</td>
                         <td> 14/3/2022</td>
                         <td class="update-box"> 
                         <div class="update-data-cho">
                                chờ xử lí
                            </div>
                            <a href="donhang.php">update</a>
                            <form action="" method="post">
                                <select name="trangthai" id="trangthai">
                                     <option value="Chờ">Chờ xử lí</option>
                                     <option value="Đang">Đang xử lí</option>
                                     <option value="Đã">Đã xử lí</option>
                                     
                               </select>
                               <button type="submit" name="update" >Update</button>
                            </form>
                         </td>
                         <td> <a href="" id="btna">chi tiết</a> <a href="" id="btna">xoá</a></td>
                       
                    </tr><tr>
                         <td>1</td>
                         <td> Lê Nguyên Hùng </td>
                         <td> Bún riêu </td>
                         <td> 100000 <sup> đ </sup></td>
                         <td> Thủ Đức</td>
                         <td> 14/3/2022</td>
                         <td class="update-box"> 
                         <div class="update-data-dang">
                                chờ xử lí
                            </div>
                            <a href="donhang.php">update</a>
                            <form action="" method="post">
                                <select name="trangthai" id="trangthai">
                                     <option value="Chờ">Chờ xử lí</option>
                                     <option value="Đang">Đang xử lí</option>
                                     <option value="Đã">Đã xử lí</option>
                                     
                               </select>
                               <button type="submit" name="update" >Update</button>
                            </form>
                         </td>
                         <td> <a href="" id="btna">chi tiết</a> <a href="" id="btna">xoá</a></td>
                       
                    </tr> -->
                </table>
            </div>
      </section>
 </body>   
 
