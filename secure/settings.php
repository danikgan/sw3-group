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

    <?php 
        if($_SESSION['is_admin'] == 1){
            echo 'Student Name: <input type="text" name="studentName"><br>';
        }
    ?>

    New Username: <input type='text' name='newUserName'>

    <input type='submit' name='change' value='Change Username'>
    <input type='reset' name='reset' value='Reset'>
</form>
<br><br>
<!--change password form -->
<h3 style="text-align: center">Change Password</h3>
<form method="post" action="changePassword.php">

        <?php 
            if($_SESSION['is_admin'] == 1){
                echo 'Student Name: <input type="text" name="studentName"><br>';
            }
        ?>

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
<form method="post" enctype="multipart/form-data" action="upload.php">
    <table width="350" border="0" cellpadding="1" cellspacing="1" class="box">
        <tr>
            <td width="246">
                <input type="hidden" name="MAX_FILE_SIZE" value="2000000">
                <input name="userfile" type="file" id="userfile">
            </td>
            <td width="80"><input name="upload" type="submit" class="box" id="upload" value=" Upload "></td>
        </tr>
    </table>
</form>

<br><br>
<h3 style="text-align: center">Change Image</h3>
<form method="post" action="changeImage.php">

    <?php 
        if($_SESSION['is_admin'] == 1){
            echo 'Student Name: <input type="text" name="studentName"><br>';
        }
    ?>

    New Profile Image: <input type='text' name='profileImage'><br>
    New Page Image: <input type='text' name='pageImage'><br>

    <input type='submit' name='change' value='Change Image'>
    <input type='reset' name='reset' value='Reset'>
</form>


<br><br>
<h3 style="text-align: center">Change Snippet</h3>
<form method="post" action="changeSnippet.php" id="snippetForm">

    <?php 
        if($_SESSION['is_admin'] == 1){
            echo 'Student Name: <input type="text" name="studentName"><br>';
        }
    ?>

    <p>New Snippet</p><br>
    <textarea rows="4" cols="50" name="newUserSnippet" form="snippetForm"></textarea><br>
    <p>Update Private Snippet</p>
    <textarea rows="4" cols="50" name="privateSnippet" form="snippetForm"></textarea><br>
    <input type='submit' name='change' pattern="/^[a-zA-Z]+$/" value='Submit'>
    <input type='reset' name='reset' value='Reset'>
</form>

<br><br>
<h3 style="text-align: center">Change Text Color</h3>
<form method="post" action="changeTextColor.php">
    New Text Color: <input type='text' name='newUserTextColor'>

    <input type='submit' name='change' value='Change Text Color'>
    <input type='reset' name='reset' value='Reset'>
</form>

<?php 
        if($_SESSION['is_admin'] == 1){
            echo '<br><br><h3 style="text-align: center">Change Admin Right</h3>';
            echo '<form method="post" action="changeAdminRight.php">';
            echo 'Student Name (Case Sensitive): <input type="text" name="studentName"><br>';
            echo 'is_admin (1 or 0): <input type="number" name="is_admin"><br>';
            echo '<input type="submit" name="change">';
            echo '</form>';

            echo '<br><br><h3 style="text-align: center">Change Snippet Right</h3>';
            echo '<form method="post" action="changeSnippetRight.php">';
            echo 'Student Name (Case Sensitive): <input type="text" name="studentName"><br>';
            echo 'Can post snippet (1 or 0): <input type="number" name="can_create_snippet"><br>';
            echo '<input type="submit" name="change">';
            echo '</form>';

        }
    ?>

<p><strong><?php
        echo $message;
        ?></strong></p>

</body>
</html>