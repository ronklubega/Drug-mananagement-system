<?php
include('head.php');
include('database.php');
if(!$_SESSION['USER_ID']){
    header("location:config.php");
    die();

}
?>
<div class="index">
    <div>
        <h1>Welcome <?php echo $_SESSION['USER_NAME']; ?></h1>
    </div>
    <div>
        <h3>
           <a href="logout.php"> Logout</a>
        </h3>
    </div>
</div>