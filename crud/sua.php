<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="des.css" />
    <title>Update</title>
</head>
<body>
<?php
    // require_once 'ketnoi.php';
    // if(isset($_GET['name'])) {
    //     $nam = $_GET['name'];
    //     $query = "SELECT * FROM product WHERE name = $nam";
    //     $result = mysqli_query($conn,$query);
    //         if(count($result)==1) {
    //             $row = $result->fetch_array();
    //             $name = $row['name'];
    //             $price = $row['price'];
    //             $detail = $row['detail'];
    //             $color = $row['color'];
    //         }
    // }

    // if(isset($_POST['edit'])) {
    //     $nameup = $_POST['name'];
    //     $priceup = $_POST['price'];
    //     $detailup = $_POST['detail'];
    //     $colorup = $_POST['color'];

    //     $sql = "UPDATE product SET name='$nameup', price='$priceup', detail='$detailup', color='colorup' WHERE name=$name";
    //         if(mysqli_query($conn,$sql)) {
    //             echo"<script>alert('sửa thành công'); window.location='list.php'</script>";
    //         }
    //         else {
    //             echo "<script>alert('sửa không thành công');</script>";
    //         }
    // }
    require_once 'ketnoi.php' ;
    $name = $_GET['name'];
    $sqlSelect = "SELECT * FROM product WHERE name=$name;";
    $result = mysqli_query($conn, $sqlSelect);
    $row = mysqli_fetch_assoc($result);
                $name = $row['name'];
                $price = $row['price'];
                $detail = $row['detail'];
                $color = $row['color'];    
    
?>
<main>
        <h1 class="crud">Update Page Product</h1>
  
        <form action="" id="form" method="post">
          <div>
            <label for="name">Name:</label>
            <input type="text " name="nameup" id="name" value="<?php echo $name?>" />
            <!-- <p class="loi error er-name"></p> -->
          </div>
          <div>
            <label for="price">Price:</label>
            <input type="text " name="priceup" id="price" value="<?php echo $price?>" />
            <!-- <p class="loi error er-price"></p> -->
          </div>
          <div>
            <label for="detail">Detail:</label>
            <input type="text " name="detailup" id="detail" value="<?php echo $detail?>" />
            <!-- <p class="loi error er-detail"></p> -->
          </div>
          <div>
            <label for="color">Color:</label>
            <input type="text " name="colorup" id="color" value="<?php echo $color?>"/>
            <!-- <p class="loi error er-color"></p> -->
          </div>
        <button style="margin: 20px 35%;" type="submit" class="btn" name="edit">Sửa</button>
        </form>
</main>

<?php
    if (isset($_POST['edit'])) {
        $nameup = $_GET['name'] ;
        $priceup = $_POST['priceup'];
            $detailup = $_POST['detailup'];
            $colorup = $_POST['colorup'];

        // Câu lệnh UPDATE
        $sql = "UPDATE product SET `name`='$nameup', `price`='$priceup', `detail`='$detailup', `color`='$colorup'  WHERE name = $nameup";

        // Thực thi UPDATE
        mysqli_query($conn, $sql);
        if (mysqli_query($conn, $sql)) {
            header("location:list.php");
        }

        // Đóng kết nối
        mysqli_close($conn);
        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
    }
    ?>

</body>
</html>

<?php ob_end_flush(); ?>