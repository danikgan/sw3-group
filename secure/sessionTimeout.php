<?php
if (isset($_SESSION['LAST_ACTIVITY']) && (time() - $_SESSION['LAST_ACTIVITY'] > 10)) {

    session_unset();
    session_destroy();
    header("Location: start.php");
}
$_SESSION['LAST_ACTIVITY'] = time();
