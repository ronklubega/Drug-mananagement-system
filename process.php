<?php

include('database.php');
if(!$_SESSION['USER_ID']){
    header("location:config.php");
    die();

}
if(isset($_GET['delete'])){
$id =$_GET['delete'];
mysqli_query($conn, "delete from products where id =$id");
header("location:productlist.php");
}
?>