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

<script type="text/javascript">

    function checkForm(form)
    {
        if(form.name.value == "") {
            alert("Error: Username cannot be blank!");
            form.name.focus();
            return false;
        }
        if(form.name.value == "admin") {
            alert("this name is restricted");
            form.name.focus();
            return false;
        }
        var re = /^\w+$/;
        if(!re.test(form.name.value)) {
            alert("Error: Username must contain only letters, numbers and underscores!");
            form.name.focus();
            return false;
        }

        if(form.password.value != "" && form.password.value == form.password.value) {
            if(form.password.value.length < 6) {
                alert("Error: Password must contain at least six characters!");
                form.password.focus();
                return false;
            }
            if(form.password.value == form.name.value) {
                alert("Error: Password must be different from Username!");
                form.password.focus();
                return false;
            }
            var re = /[0-9]/;
            if(!re.test(form.password.value)) {
                alert("Error: password must contain at least one number (0-9)!");
                form.password.focus();
                return false;
            }
            var re = /[a-z]/;
            if(!re.test(form.password.value)) {
                alert("Error: password must contain at least one lowercase letter (a-z)!");
                form.password.focus();
                return false;
            }
            var re = /[A-Z]/;
            if(!re.test(form.password.value)) {
                alert("Error: password must contain at least one uppercase letter (A-Z)!");
                form.password.focus();
                return false;
            }
        } else {
            alert("Error: Please check that you've entered and confirmed your password!");
            form.password.focus();
            return false;
        }
        return true;
    }
//comment
</script>

<form id="register" action="register-submit.php" method="post" onsubmit="return checkForm(this);">
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
