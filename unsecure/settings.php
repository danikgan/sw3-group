<!DOCTYPE html>
<html>
<head>
    <title>Springfield Elementary School</title>
    <style>
        <?php include 'simpsons.css';?>
    </style>
</head>

<body>
<?php include 'navigationBar.php';?>
<div id="logoarea">
    <img src="simpsons.png" alt="logo" />
</div>

<h1>Springfield Elementary Web Site</h1>


<!--change username form -->
<h3 style="text-align: center">Change Username</h3>
<form method="post" action="changepassword.php">
    Current Username: <input type='username' name='username'>
    <br>
    <br>
    New Username: <input type='username' name='newusername'>
    <br>
    <br>
    Repeat New Username: <input type='username' name='repeatusername'>

    <input type='submit' name='change' value='Change Username'>
    <input type='reset' name='reset' value='Reset'>
</form>
<br><br>
<!--change password form -->
<h3 style="text-align: center">Change Password</h3>
<form method="post" action="changepassword.php">
    Current password: <input type='password' name='password'>
    <br>
    <br>
    New Password: <input type='password' name='newpassword'>
    <br>
    <br>
    Repeat New Password: <input type='password' name='repeatpassword'>

    <input type='submit' name='submit' value='Change Password'>
    <input type='reset' name='reset' value='Reset'>
</form>


</body>
</html>