<?php
include('database.php');
?>
<?php
if(isset($_POST['register'])){
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);
$users = mysqli_query($conn, "select * from login where username='$name' and email='$email'");
$availble = mysqli_num_rows($users);
$message ="User exists";
if($availble>0){
    header("location:dashlane.php?message='username already exists'");
}else{
    $sql = mysqli_query($conn, "insert into login(username,email,password) VALUES('$name','$email','$password');");
 header("location:index.php");
}

}if(isset($_POST['login'])){
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $userpassword = mysqli_real_escape_string($conn, $_POST['userpassword']);
    $sql1 = mysqli_query($conn, "select *from login where username='$username' and password='$userpassword'");
    $row = mysqli_num_rows($sql1);
   if($row>0){
    // echo "Login successful ";
    $USER = mysqli_fetch_assoc($sql1);
    $_SESSION['USER_ID'] =$USER['id'];
    $_SESSION['USER_NAME']=$USER['username'];
    header("location:index.php"); 
} else{
    header("Location: config.php?message=Invalid details, Try again!!!");
    exit();
   }
}
if(isset($_POST['registerproducts'])){
    $productname = mysqli_real_escape_string($conn, $_POST['productname']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $quantity = mysqli_real_escape_string($conn, $_POST['quantity']);
    $sql1=mysqli_query($conn, "select * from products where productname='$productname'");
    $row=mysqli_num_rows($sql1);
    if($row>0){
        echo "Product name already exists";
    }else{
        $sql = mysqli_query($conn, "insert into products (productname, price, quantity) values('$productname','$price','$quantity');");
        header("location: productlist.php");
    }
}

?>