<?php
	session_start();

	if(isset($_SESSION['id'])){
		header("LOCATION: ../view/WelcomePage.php");
	} 
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/reglogin.css">
    <script src="js/login.js"></script>
</head>
<body>
<div class="main">
<div class="form">
<form name="form2" id="form2" action="../controller/loginAction.php" method="post" onsubmit="return validation(this);" novalidate>
	<!--<fieldset>-->
		<h2>Login Form</h2>

		<table>

			<tr height="40px">

                    <td width="180px">
                        <label for="uName">User Name*:</label>
                    </td>
                    <td>
                        <input type="text" name="uName" id="uName" value="<?php if(isset($_COOKIE["uName"])) { echo $_COOKIE["uName"]; } ?>">
                         <span id="err1"></span>
                        <br><br>
                    </td>
            </tr>

            <tr height="40px">

                    <td width="180px">
                        <label for="pass">Password*:</label>
                    </td>
                    <td>
                        <input type="text" name="pass" id="pass" value="<?php if(isset($_COOKIE["pass"])) { echo $_COOKIE["pass"]; } ?>">
                         <span id="err2"></span>
                        <br><br>
                    </td>
            </tr>

            <tr height="40px">

                    <td width="180px">
                    	<input type="checkbox" name="rememberMe" id="rememberMe"> Remember me
            </tr>

            <tr height="40px">

                    <td width="180px">
                        <a href="../view/ForgottenPassword.php" class="link">Forgotten Password?</a>
                    </td>
            </tr>

            <tr height="40px">

                    <td width="180px">
                        <input type="submit" name="login">
                    </td>
            </tr>

            <tr height="40px">

                    <td width="180px">
                        <label>Don't have an account?</label>
                    </td>
                    <td>
                        <a href="../view/registration.html" class="link">Sign-up</a>
                    </td>
            </tr>
        </table>

		
	<!--</fieldset>-->

</form>
</div><!--end of register-->
   </div><!--end of main-->

<p id="msg"></p>

</body>
</html>