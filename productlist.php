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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css"
 rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbC
 x/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>
<body>
<div class="producttable">
   <script>alert("<?php echo $mg;?>");</script> 
<h2 >Products availabe</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Product Id</th>
                            <th >Product name</th>
                            <th >price@</th>
                            <th >quantity(pack)</th>
                            <th>Date of registration</th>
                            <th>ExpirelyDate</th>
                            <th>operation</th>
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
                            <td><?php echo $product['regdate']?></td>
                            <td><?php echo $product['expdate']?></td>
                            <td>
                        
                            <a href="index.php?edit=<?php echo $product['id']; ?> && message=Update">
                            <box-icon name='edit-alt' type='solid' animation='flashing' color='#61da15' >

                            </box-icon></a>
                            <a href="process.php?delete=<?php echo $product['id'];?>">
                            <box-icon name='trash' animation='flashing' color='#bd1a11' ></box-icon></a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
                <!-- the sales talble -->
<h2 >Products sold</h2>
                <table>
                    <thead > 
                        <tr >
                            <th>Product Name</th>
                            <th>Sold By</th>
                            <th >Sales(SHS)</th>
                            <th >Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sales = mysqli_query($conn, "select * from sales");
                        
                        while($mysales =$sales->fetch_assoc()):
                        if($mysales['saleamount']>0){
                        ?>
                        <tr>
                            <td><?php echo $mysales['productname']?></td>
                            <td><?php echo $mysales['user']?></td>
                            <td><?php echo $mysales['saleamount']?></td>
                            <td><?php echo $mysales['sellsdate']?></td> 
                        </tr>
                        <?php } endwhile; ?>
                    </tbody>
                </table>
</div>  
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+
RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>

<script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>
</body>
</html>