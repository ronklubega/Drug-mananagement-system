<?php
include('database.php');
include('head.php');
include('variables.php');
include('back.php');
if(isset($_GET['message'])){
$msg=$_GET['message'];
}
if(isset($_GET['msgsuccess'])){
    $msgsc=$_GET['msgsuccess'];
}
if(!$_SESSION['USER_ID']){
    header("location:config.php");
    die();

}
if(isset($_GET['edit'])){
    $prdt = $_GET['edit'];
    $msql3 = mysqli_query($conn, "select * from products where id ='$prdt'");
    $ptd = mysqli_fetch_assoc($msql3);
    $ptdname = $ptd['productname'];
    $ptdprice =$ptd['price'];
    $ptdquantity =$ptd['quantity'];
    $ptdregistration=$ptd['regdate'];
    $ptdexpirly=$ptd['expdate'];
}
if(isset($_GET['failed'])){
$failed =$_GET['failed'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h3>ADMIN USER: <span style="color:red;"><?php echo $_SESSION['USER_NAME']; ?></span></h3>
        <script> alert("<?php echo $msgsc?>");</script>
    </div>
    <div style="padding-top:20px; padding-left:500px;">
    <h3><?php echo $msg?> product details</h3>
    <form action="register.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $prdt?>"/>
        <table >
            <tr>
                <td >Product Name:</td>
            </tr>
            <tr>
                <td><input type="text" name="productname"  placeholder="enter product name" style="padding:5px;" required value="<?php echo $ptdname;?>"></td>
            </tr>
            <tr>
                <td >Price:</td>
            </tr>
            <tr>
                <td><input type="number" name="price"   placeholder="product price"  style="padding:5px;" required value="<?php echo $ptdprice;?>"></td>
            </tr>
            <tr>
                <td >Quantity</td>
            </tr>
            <tr>
                <td><input type="number" name="quantity" placeholder="Product quantitiy"  style="padding:5px;" required value="<?php echo $ptdquantity;?>"></td>
            </tr>
            <tr>
                <td >Date of registration</td>
            </tr>
            <tr>
                <td><input type="date" name="regdate" placeholder="date of registration"  style="padding:5px;" required value="<?php echo $ptdregistration;?>"> </td>
            </tr>
            <tr>
                <td>ExpirelyDate</td>
            </tr>
            <tr>
                <td><input type="date" name="expdate" placeholder="date of expirely"  style="padding:5px;" required value="<?php echo $ptdexpirly;?>"> </td>
            </tr>
           
            <tr>
                <?php 
                if($msg == "Register"):
                ?>
                <td><button type="submit" name="Register" style="padding:8px;"><?php 
                    echo "Register";?></button></td>
                <?php else: ?>
                <td><button type="submit" name="update"  style="padding:8px;">
                   <?php echo $msg;
                ?>
                <?php endif?></button></td> 
            </tr>
        </table>
        <p style="color:red;  font-size:20px;"><?php echo $failed ?></p>
</form>    
    </div>
</body>
</html>
