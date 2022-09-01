<?php
include('database.php');
include('variables.php');
if(!$_SESSION['USER_ID']){
    header("location:config.php");
    die();

}
if(isset($_GET['msgsuccess'])){
    $msgsuccess =$_GET['msgsuccess'];  
}

if(isset($_GET['message'])){
$msg=$_GET['message'];

}
// getting data from the s
if(isset($_POST['sale'])){

$sale_prdt_name=$_POST['productname'];
$sale_prdt_price=$_POST['price'];
$sale_prdt_quantity=$_POST['quantity'];
$sale_prdt_total=($sale_prdt_price * $sale_prdt_quantity);
// echo $sale_prdt_total;
}

//getting available qunatity so that i cna compare it to the one being booked then substract and stay wi
$prdtnames=mysqli_query($conn, "select * from products;");
$prdtname =mysqli_query($conn, "select * from products;");
$prdt3 =mysqli_fetch_assoc($prdtnames);
$availableqnty =$prdt3['quantity'];


// echo $availableqnty;
if($sale_prdt_quantity<$availableqnty){
    $availableqnty = intval($availableqnty)-intval($sale_prdt_quantity);
        mysqli_query($conn, "insert into sales(productname,saleamount) values('$sale_prdt_name','$sale_prdt_total')");
        mysqli_query($conn, "update products set quantity='$availableqnty' where productname='$sale_prdt_name'");
}else{
    header("location:attendant.php");
}

?>



<!-- Html section -->
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
        <h3 style="color:rgb(21, 10, 66); text-align:left; ">Attendant: <span style="color:red;"><?php echo $_SESSION['USER_NAME']; ?></span></h3>
    </div>
<div style="padding-top:20px; padding-left:500px;">
    <h3>Sale product</h3>
    <form action="attendant.php" method="POST">

        <table>
            <tr>
                <td>Product Name:</td>
            </tr>
            <tr>
            <td>
               <select name="productname" id="productname" style="padding:8px;" width="50">
               <?php while($product=$prdtname->fetch_assoc()):?>
                <option value="<?php echo $product['productname'];?>"><?php echo $product['productname'];?></option>
                <?php endwhile?>
            </select>
        </td>  
            <!-- <td><input type="text" name="productname" placeholder="enter product name" style="padding:5px;" required value="<?php echo $ptdname;?>"></td> -->
            </tr>
            <tr>
                <td>Price:</td>
            </tr>
            <tr>
                <td><input type="number" name="price" placeholder="product price" size="40" style="padding:5px;" required></td>
            </tr>
            <tr>
                <td>Quantity:</td>
            </tr>
            <tr>
                <td><input type="number" name="quantity" placeholder="Product quantitiy" size="50" style="padding:5px;" required></td>
            </tr>
            <tr>

                <td><button type="submit" name="sale" style="padding:8px;">
                    Sale Product</button></td> 
            </tr>
        </table>
</form>    
    </div>
    </body>
</html>
<?php $conn->close();?>