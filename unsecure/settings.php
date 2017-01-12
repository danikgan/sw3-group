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
<?php $message='';?>

<!--change username form -->
<h3 style="text-align: center">Change Username</h3>
<form method="post" action="changeUsername.php">
    New Username: <input type='text' name='newUserName'>

    <input type='submit' name='change' value='Change Username'>
    <input type='reset' name='reset' value='Reset'>
</form>
<br><br>
<!--change password form -->
<h3 style="text-align: center">Change Password</h3>
<form method="post" action="changePassword.php">
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

<br><br>
<h3 style="text-align: center">Input File</h3>
<form action="changeFile.php">
    <input type="file" name="pic" accept="image/*">
    <input type="submit">
</form>

<br><br>
<h3 style="text-align: center">Change Image</h3>
<form method="post" action="changeImage.php">
    New Image: <input type='text' name='newUserImage'>

    <input type='submit' name='change' value='Change Image'>
    <input type='reset' name='reset' value='Reset'>
</form>

<br><br>
<h3 style="text-align: center">Change Snippet</h3>
<form method="post" action="changeSnippet.php" id="snippetForm">

    <textarea rows="4" cols="50" name="snippet" form="snippetForm">Enter snippet...</textarea>
    <input type='submit' name='change' value='Change Snippet'>
    <input type='reset' name='reset' value='Reset'>
</form>

<p><strong><?php
        echo $message;
        ?></strong></p>

</body>
</html>