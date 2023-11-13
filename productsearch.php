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
if(isset($_POST['searchprdt'])){
    $date= $_POST['date'];
    $sql = mysqli_query($conn, "select  productname,price, quantity ,expdate from products where expdate='$date'");
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
    <h3>Search Products</h3>
   <form action="productsearch.php" method="POST">
        <table>
            <tr>
                <td>Select Date:</td>
            </tr>
            <tr>
                <td><input type="date"  name="date" placeholder="Select date" style="padding:5px;" required></td>
            </tr>
            <tr>

                <td><button type="submit" name="searchprdt" style="padding:8px;">
                    Search Products</button></td> 
            </tr>  
        </table>
</form> 
    </div>
<div class="producttable">
    <h2>Search result</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th >quantity</th>
                            <th >expirely date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($sql):
                            
                        
                        while($srch =$sql->fetch_assoc()):
                        ?>
                        <tr>
                            <td><?php echo $srch['productname']?></td>
                            <td><?php echo $srch['price']?></td>
                            <td><?php echo $srch['quantity']?></td>
                            <td><?php echo $srch['expdate']?></td>
                        </tr>
                        <?php  endwhile; 
                        endif;?>
                    </tbody>
                </table>
                        </div>
    </body>
</html>
<?php $conn->close();?>