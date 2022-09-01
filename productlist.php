<?php
include('head.php');
include('database.php');
$mg ='';
$sql2 = mysqli_query($conn, "select * from products");
if(!$_SESSION['USER_ID']){
    header("location:config.php");
    die();
}
if(isset($_GET['success'])){
    $mg = $_GET['success'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="mycss.css">
</head>
<body>
<div class="producttable">
    <?php echo $mg;?>
<h2>Products availabe</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Product Id</th>
                            <th >Product name</th>
                            <th >price</th>
                            <th >quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        while($product=$sql2->fetch_assoc()):?>
                        <tr>
                            <td><?php echo $product['id']?></td>
                            <td><?php echo $product['productname']?></td>
                            <td><?php echo $product['price']?></td>
                            <td><?php echo $product['quantity']?></td>
                            <td>
                            <a href="index.php?edit=<?php echo $product['id']; ?> && message=Update">Update</a>
                            <a href="process.php?delete=<?php echo $product['id'];?>">Delete</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
</div>  
</body>
</html>