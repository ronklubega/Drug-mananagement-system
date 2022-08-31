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

if($availble>0){
    echo "Username already taken";
}else{
    $sql = mysqli_query($conn, "insert into login(username,email,password) VALUES('$name','$email','$password');");
 echo"Registration successful";
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
    $msg ="Please enter valid details";
    header("Location: config.php?message=$msg");
    exit();
   }
}

?>