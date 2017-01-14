<?php
if(!isset($_SESSION))
{
    session_start();
}
$name = $_SESSION["name"];

?>

<ul class="topnav" id="myTopnav">
    <li><a href="start.php">Home</a></li>
    <li><a href="login.php">Login</a></li>
    <li><a href="profile.php"><?php echo $name;?></a></li>
    <li><a href="grades.php">Grades</a></li>
    <li><a href="settings.php">Settings</a></li>
    <li><a href="snippets.php">Public Snippets</a></li>
    <li class="icon">
        <a href="javascript:void(0);" onclick="myFunction()">&#9776;</a>
    </li>
</ul>

<script>
    function myFunction() {
        var x = document.getElementById("myTopnav");
        if (x.className === "topnav") {
            x.className += " responsive";
        } else {
            x.className = "topnav";
        }
    }
</script>