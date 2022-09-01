<?php
include('defaultnav.php');
$msg='';
if(isset($_GET['message'])){
    $msg = $_GET['message'];
}
?>
<div class="register">
<form action="register.php" method="POST">
<h1>Registration form</h1>
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" placeholder="username" name="name" required size="40" style="padding:8px;"></td>
        </tr>
        <tr>
            <td>Email:</td>
            <td><input type="email" placeholder="users email" name="email" required size="40" style="padding:8px;" ></td>
        </tr>
        <tr>
            <td>password:</td>
            <td><input type="password" placeholder="password" name="password" required size="40" style="padding:8px;"></td>
        </tr>
        <tr  >
            <!-- <td><input type="submit" placeholder="Register" name ="register" style="padding:8px;"></td> -->
            <td><button type="submit" name="register" style="padding:8px;"> Register</button></td>
            <td><a href="config.php">Click here to login</a></td>
        </tr>
    </table>
    <p style="color:red;  font-size:20px;"><?php echo $msg ?></p>
</form>
</div>
