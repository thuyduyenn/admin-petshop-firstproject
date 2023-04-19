



<?php

session_start();
if(isset($_SESSION['checkadmin'])&&($_SESSION['checkadmin']==0)){
     header('location: http://localhost/four-project/ ');
}


if(!isset($_SESSION['giohang1'])){
     $_SESSION['giohang1']=array();
}
 if((isset($_GET['delall']))&&($_GET['delall']=="del")){
    unset($_SESSION['giohang1']);

}
if((isset($_POST['submit']))&&($_POST['submit'])){
     $name = $_POST['name'];
     $phone = $_POST['phone'];
     $product= $_POST['product'];
     $price = $_POST['price'];
     $soluong = $_POST['soluong'];
     $datetime = date("Y-m-d");
     
     $giohang = array($name,$phone,$product,$price,$soluong,$datetime);
     $_SESSION['giohang1'][]=$giohang ;

     
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage</title>
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


<div class="container">
<section class="index-form">
       <form action="index.php" method="post">
             <h1>Thêm đơn hàng</h1>
             <label for="name">Tên khách hàng</label>
             <input type="text" id="name" name="name" placeholder="nhập tên người mua...">
             <label for="phone"> Số điện thoại</label>
             <input type="text" name="phone" id="phone" placeholder="nhập số điện thoại khách hàng..."
             <label for="product">Tên sản phẩm</label>
             <input type="text" id="product" name="product" placeholder=" nhập tên sản phẩm ">
             <label for="price">Giá một sản phẩm</label>
             <input type="text" name="price" id="price" placeholder="giá sản phẩm.....">

             <input type="number"  name="soluong" min="1" value="1">
             <input type="submit" name="submit" value="submit">

      </form>
</section>
<section class="index-table"> 
        <h1>Đơn hàng đã mua trong ngày hôm nay</h1>
<?php
//  echo print_r($_SESSION['giohang']);

// $num = 1000000;
// $numberFor = number_format($num);
// echo $numberFor;
if((isset($_POST['change']))&&($_POST['change'])&&((isset($_GET['changeid']))&&($_GET['changeid'] >= 0))){
     $changeid=$_GET['changeid'];
     $nameupdate=$_POST['nameupdate'];
     $phoneupdate=$_POST['phoneupdate'];
     $productupdate=$_POST['productupdate'];
     $priceupdate=$_POST['priceupdate'];
     $soluongupdate=$_POST['soluongupdate'];
     $_SESSION['giohang1'][$changeid][0]=$nameupdate;
     $_SESSION['giohang1'][$changeid][1]=$phoneupdate;
     $_SESSION['giohang1'][$changeid][2]=$productupdate;
     $_SESSION['giohang1'][$changeid][3]=$priceupdate;
     $_SESSION['giohang1'][$changeid][4]=$soluongupdate;
     

}
?>
        <div class="scrollbar">
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
         <?php
         function total(){
            if((isset($_SESSION['giohang1']))&&(count($_SESSION['giohang1']) > 0)){
                        $tong=0;
                       for($i = 0;$i < count($_SESSION['giohang1']);$i++){
                             $tong1= $_SESSION['giohang1'][$i][3] * $_SESSION['giohang1'][$i][4];
                             $tong+=$tong1;
                       }
                       return $tong;
             }
         }
         $total=total();
         $totalFormat = number_format($total);
        
             if((isset($_SESSION['giohang1']))&&(count($_SESSION['giohang1']) > 0)){
                  $id=1;
                   for($i = 0; $i < count($_SESSION['giohang1']);$i++){
                          $num = $_SESSION['giohang1'][$i][3] * $_SESSION['giohang1'][$i][4];
                          $numberFormat = number_format($num);
                           echo '<tr>
                           <td>'.$id++.'</td>
                           <td>'.$_SESSION['giohang1'][$i][0].'</td>
                           <td>'.$_SESSION['giohang1'][$i][1].'</td>
                           <td>'.$_SESSION['giohang1'][$i][2].'</td>
                           <td>'.$_SESSION['giohang1'][$i][3].'</td>
                           <td>'.$_SESSION['giohang1'][$i][4].'</td>
                           <td><span>'.$numberFormat.'</span><sup>đ</sup><a href="update.php?sessid='.$i.'" class="update-btn"> update </a></td>
                           <td>'.$_SESSION['giohang1'][$i][5].'</td>
                      </tr>';
                   }
             }
         ?>
      <!--
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
         <tr>
              <td>3</td>
              <td>Võ Lê Duy Tường</td>
              <td>0866870204</td>
              <td> xúc xích</td>
              <td> 40000</td>
              <td> 2</td>
              <td><span> 80000 </span><a href="" class="update-btn">update</a></td>
              <td>2023/4/4</td>
         </tr>
         <tr>
              <td>3</td>
              <td>Võ Lê Duy Tường</td>
              <td>0866870204</td>
              <td> xúc xích</td>
              <td> 40000</td>
              <td> 2</td>
              <td><span> 80000 </span><a href="" class="update-btn">update</a></td>
              <td>2023/4/4</td>
         </tr>
         <tr>
              <td>3</td>
              <td>Võ Lê Duy Tường</td>
              <td>0866870204</td>
              <td> xúc xích</td>
              <td> 40000</td>
              <td> 2</td>
              <td><span> 80000 </span><a href="" class="update-btn">update</a></td>
              <td>2023/4/4</td>
         </tr>
         <tr>
              <td>3</td>
              <td>Võ Lê Duy Tường</td>
              <td>0866870204</td>
              <td> xúc xích</td>
              <td> 40000</td>
              <td> 2</td>
              <td><span> 80000 </span><a href="" class="update-btn">update</a></td>
              <td>2023/4/4</td>
         </tr> -->
         

     </table>
   
    </div>
    <?php
        if($total > 0){
             echo '
             <div class="total-in-day">
                  <p> Tổng tiền: <span>'.$totalFormat.'</span><sup>đ</sup></p>
             </div>
             ';
        }
    ?>
 
</section>
<form action="data.php" class="end-btn" method="post">
      <input type="submit" name="luudata" value="Kết thúc ngày">
      <a href="index.php?delall=del"> Xoá giỏ hàng</a>
</form>
</div>
</body>
</html>

