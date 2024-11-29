<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Danh sách</title>
</head>
<style> 
    .btn_list {
  display: inline-block;
  text-decoration: none;
  background-color: transparent;
  border: none;
  outline: none;
  color: #fff;
  padding: 15px;
  border-radius: 10px;
  cursor: pointer;
  transition: opacity .2s linear;
  background-color: orangered;
}
</style>
<body>
<?php require_once 'ketnoi.php' ?>
<?php
 if(isset($_GET['page'])) {
    $page = $_GET['page'];
}
else {
    $page=1;
}

$rowPerpage = 4;
$perRow=$page*$rowPerpage - $rowPerpage;

$totalRow = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM product"));

$totalPage=ceil($totalRow/$rowPerpage);

$listPage="";
for($i=1; $i<=$totalPage;$i++) {
    if($page==$i) {
        $listPage.='<li class="page-item"><a class="page-link" href="list.php">'.$i.'</a></li>';
    }
    else {
        $listPage.='<li><a class="page-link" href="list.php">'.$i.'</a></li>';
    }
}

    $result = $conn->query("SELECT * FROM product LIMIT $perRow,$rowPerpage ");    

?>
    <div class="container"> 
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Price</th>
                <th scope="col">Detail</th>
                <th scope="col">Color</th>
                <th scope="col">Điều hướng</th>
                </tr>
            </thead>
            <tbody>
            <?php while($row = mysqli_fetch_assoc($result)): ?>
                <tr>
                <td> <?php echo $row['name']; ?></td>
                <td> <?php echo $row['price']; ?></td>
                <td> <?php echo $row['detail']; ?></td>
                <td> <?php echo $row['color']; ?></td>
                <td > 
                    <a class="btn_list" href ="ketnoi.php?delete=<?php echo $row['name']; ?>"> Xóa </a>
                    <a class="btn_list" href ="sua.php?name=<?php echo $row['name']; ?>"> Sửa </a>
                </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <nav aria-label="Page navigation example" class="container">
  <ul class="pagination">
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <?php
        echo $listPage;
    ?>
    <li class="page-item">
      <a class="page-link" href="#" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>

</body>
</html>