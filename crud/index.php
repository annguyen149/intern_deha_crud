<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD user</title>
    <link rel="stylesheet" href="des.css" />
</head>
<body>
  <?php 
  
  session_start();

  if(!isset($_SESSION['mySession'])) {
    header('location:login.php');
  }
  require_once 'ketnoi.php' 
  
  ?>
  <?php
    if(isset($_POST['submit'])) {
      $name = $_POST['name'];
      $price = $_POST['price'];
      $detail = $_POST['detail'];
      $color = $_POST['color'];

      if($conn->query("INSERT INTO product(name,price,detail,color) VALUES (N'$name', N'$price', N'$detail', N'$color')")) {
          echo "<script>alert('thêm thành công');</script>";
      } else {
          echo "<script>alert('thêm ko thành công');</script>";
      }
    }

    // $conn->close();
  ?>
    <main>
        <h1 class="crud">CRUD Page Product</h1>
  
        <form action="" method="post">
          <div>
            <label for="name">Name:</label>
            <input type="text " name="name" id="name" placeholder="Enter name please"/>
            <!-- <p class="loi error er-name"></p> -->
          </div>
          <div>
            <label for="price">Price:</label>
            <input type="text " name="price" id="price" placeholder="Enter price please"/>
            <!-- <p class="loi error er-price"></p> -->
          </div>
          <div>
            <label for="detail">Detail:</label>
            <input type="text " name="detail" id="detail" placeholder="Enter detail please"/>
            <!-- <p class="loi error er-detail"></p> -->
          </div>
          <div>
            <label for="color">Color:</label>
            <input type="text " name="color" id="color" placeholder="Enter color please"/>
            <!-- <p class="loi error er-color"></p> -->
          </div>
        <button style="margin: 20px 35%;" type="submit" class="btn" name="submit">Submit</button>
        <a style="margin: 20px 35%;" href="list.php" target="_blank" class="btn" >Xem</a>
        </form>
    </main>

    <main>
      <h1 class="crud">Tìm kiếm tại đây</h1>

        <form method="post">
            <input type="text" name="noidung">
            <button style="margin: 20px 35%;" type="submit" class="btn" name="se">Tìm kiếm</button>
        </form>
        <?php

      if(isset($_POST['se'])) {
        $noidung = $_POST['noidung'];

      }
      else {
        echo $noidung = false;
      }

      $sql = "SELECT * FROM product WHERE detail LIKE '%$noidung%' ";
      $result = mysqli_query($conn, $sql);

      while($row=mysqli_fetch_array($result)) {

        echo $row['detail'];

      }
    ?>
    </main>
    <a href="logout.php">
        <button style="background-color: orangered; float:inline-end" type="submit" class="btn" name="submit">Đăng xuất</button>
    </a>
</body>
</html>