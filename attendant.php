<?php
include('database.php');
if(!$_SESSION['USER_ID']){
    header("location:config.php");
    die();

}
if(isset($_GET['msgsuccess'])){
    $msgsuccess =$_GET['msgsuccess'];  
}
include('variables.php');
if(isset($_GET['message'])){
$msg=$_GET['message'];
}
if(isset($_GET['msgsuccess'])){
    $msgsc=$_GET['msgsuccess'];
}
if(isset($_GET['edit'])){
    $prdt = $_GET['edit'];
    $msql3 = mysqli_query($conn, "select * from products where id ='$prdt'");
    $ptd = mysqli_fetch_assoc($msql3);
    $ptdname = $ptd['productname'];
    $ptdprice =$ptd['price'];
    $ptdquantity =$ptd['quantity'];
}
if(isset($_GET['failed'])){
$failed =$_GET['failed'];
}
?>
<html>
    <head>
    <link rel="stylesheet" href="mycss.css">

    </head>
    <body>
<div class="mynav">
        <div class="header">
        <p>DashLane</p>
        </div>
        <div class="form1">
<ul>
    <li><a href="attendant.php" style="text-decoration: none; color:white;">Home</a></li>
    <li><a href="attendantproductpage.php" style="text-decoration: none; color:white;">Reports</a></li>
    <li><a href="attendantproductpage.php" style="text-decoration: none; color:white;">Search drugs</a></li>
    <li><a href="welcomepage.php" style="text-decoration: none; color:white;">About Us</a></li>
    <li><a href="logout.php" style="text-decoration: none; color:white;">Logout</a></li>
</ul>
        </div>
        </div>
        <div>
        <h2 style="color:red; text-align:center; ">Welcome To the sales page <span style="color:rgb(21, 10, 66);"><?php echo $_SESSION['USER_NAME']; ?></span></h2>
    </div>
<div style="padding-top:20px; padding-left:500px;">
    <h3>Sale product</h3>
    <form action="register.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $prdt?>">
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
                <td>Quantity:</td>
            </tr>
            <tr>
                <td><input type="number" name="quantity" placeholder="Product quantitiy" size="50" style="padding:5px;" required value="<?php echo $ptdquantity;?>"></td>
            </tr>
            <tr>

                <td><button type="submit" name="Register" style="padding:8px;">
                    Sale Product</button></td> 
            </tr>
        </table>
</form>    
    </div>
    </body>
</html>