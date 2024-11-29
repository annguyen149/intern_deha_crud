<?php

    $severname="localhost";
    $username="root";
    $password="";
    $database="crud";

    $conn = mysqli_connect($severname,$username,$password,$database);

    // if(!$conn){
    //     echo("kết nối ko thành công");
    // } else {
    //     echo("thành công");
    // }
    mysqli_set_charset($conn, 'UTF8');

    if(isset($_GET['delete'])) {
        $name = $_GET['delete'];
        $conn -> query("DELETE FROM product WHERE name=$name");
        header("Location: list.php");
    }
?>