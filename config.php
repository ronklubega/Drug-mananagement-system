<?php
include('head.php');
?>

<div class="register">
<form action="register.php" method="POST">
<h1>Login To Continue</h1>
    <table>
        <tr>
            <td>Name:</td>
            <td><input type="text" placeholder="username" name="username" required size="40" style="padding:8px;"></td>
        </tr>
        <tr>
            <td>password:</td>
            <td><input type="password" placeholder="password" name="userpassword" required size="40" style="padding:8px;"></td>
        </tr>
        <tr  >
            <!-- <td><input type="submit" placeholder="Register" name ="register" style="padding:8px;"></td> -->
            <td><button type="submit" name="login" style="padding:8px;"> Login</button></td>
            <td style="padding-left:5px;"><a href="dashlane.php">Click here to Register</a></td>
        </tr>
    </table>
</form>
</div>
