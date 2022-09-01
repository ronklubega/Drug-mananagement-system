<?php
include('head.php');
include('database.php');
$ptdname='';
$ptdprice='';
$ptdquantity='';
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
        <h1>Welcome <?php echo $_SESSION['USER_NAME']; ?></h1>
        <h3 style="text-align:right; margin-top:-60px;">
        <a href="productlist.php">Products list</a>
           <a href="logout.php" > Logout</a>
        </h3>
    </div>
    <div style="padding-top:20px; padding-left:500px;">
    <h3>Register your products</h3>
    <form action="register.php" method="POST">
        <table>
            <tr>
                <td>Product Name:</td>
            </tr>
            <tr>
                <td><input type="text" name="productname" placeholder="enter product name" style="padding:5px;" required value="<?php echo $ptdname;?>"></td>
            </tr>
            <tr>
                <td>Price:</td>
            </tr>
            <tr>
                <td><input type="number" name="price" placeholder="product price" size="40" style="padding:5px;" required value="<?php echo $ptdprice;?>"></td>
            </tr>
            <tr>
                <td>Quantity</td>
            </tr>
            <tr>
                <td><input type="number" name="quantity" placeholder="Product quantitiy" size="50" style="padding:5px;" required value="<?php echo $ptdquantity;?>"></td>
            </tr>
            <tr>
                <td><button type="submit" name="registerproducts"  style="padding:8px;">Register</button></td>
            </tr>
        </table>
</form>    
    </div>
</body>
</html>
