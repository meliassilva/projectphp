<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | Acme, Inc.</title>
    <meta name="author" content="Lucas Mayer de Freitas">
    <link rel="stylesheet" href="/acme/css/screen.css" media="screen" type="text/css">
</head>
<body>
<div id="content-area">

<header id="page-header">

<?php include $_SERVER['DOCUMENT_ROOT'].'/acme/view/header.php'; ?>

<!-- <img id="site-logo" alt="logo" src="/acme/images/site/logo.gif">
<p id="site-brand"></p>

<span id="myAccount">   
<a href='/acme/accounts/index.php?action=login'>
<img id="folder" src='/acme/images/site/account.gif' alt='My Account'> My Account</a>
</span> -->

</header>

<nav id="page-nav"> 
<!--    <?php include('snippets/navigation.php'); ?> -->
    <?php echo $navList; ?>


</nav>

<main>

<h1>Acme Registration</h1>
<p>All fields are required.</p>


<?php
if (isset($message)) {
 echo $message;
}
?>

<!-- post means write, while get means read -->
<form action='/acme/accounts/index.php' method="post">

<fieldset>
  <label for="clientFirstname">First name</label><br>
  <input type="text" name="clientFirstname" id="clientFirstname" <?php if(isset($clientFirstname)){echo "value='$clientFirstname'";} ?> required><br>
  
  <label for="clientLastname">Last name</label><br>
  <input type="text" name="clientLastname" id="clientLastname" required><br>

  <label for="clientEmail">Email Address</label><br>
  <input type="email" name="clientEmail" id="clientEmail" required placeholder="Enter a valid email address"><br>

  <label for="clientPassword">Password</label><br>

  <span id="password-phrase">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>

  <input type="password" name="clientPassword" id="clientPassword" 
  required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">

<br>

<input type="submit" name="submit" id="register-button" value="Register">

<!-- Add the action name - value pair -->
<input type="hidden" name="action" value="register">

</fieldset>
</form>
<br>
<br>


</main>
<footer id="page-footer">
            &copy;2019 ACME Inc. All Rights Reserved<br>
            All images are believed to be in "Fair Use". Please notify the author if any are not and they will be removed.
    </footer>
</div>
</body>
</html>

<!--
id = used once per page
class = repeatable as many times
-->
