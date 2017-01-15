<!DOCTYPE html>
<html>
<!--
CSE 190 M, Spring 2012
This page shows a login form for the student to log in to the system.
Once the student logs in, a PHP session is created so that the other pages
remember the student and can show that student's grades.
-->
<head>
    <title>Springfield Elementary School</title>
    <link href="simpsons.css" type="text/css" rel="stylesheet" />
</head>

<body>
<div id="logoarea">
    <img src="simpsons.png" alt="logo" />
</div>

<h1>Springfield Elementary Web Site</h1>

<h2>Register</h2>

<form id="register" action="register-submit.php" method="post">
    <fieldset>
        <legend>Register</legend>
        <dl><!--comment-->
            <dt>Name</dt>
            <dd>
                <input type="text" name="name" />
            </dd>
            <dt>Password</dt>
            <dd>
                <input type="password" name="password" />
            </dd>
        </dl>
        <input type="submit" value="Register" />
    </fieldset>
</form>
</body>
</html>
