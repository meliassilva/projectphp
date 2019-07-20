<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Acme, Inc.</title>
    <meta name="author" content="Lucas Mayer de Freitas">
    <link rel="stylesheet" href="/acme/css/screen.css" media="screen" type="text/css">
</head>
<body>
<div id="content-area">

<header id="page-header">

<?php include $_SERVER['DOCUMENT_ROOT'].'/acme/view/header.php'; ?>

</header>

<nav id="page-nav"> 
<!--    <?php include('snippets/navigation.php'); ?> -->
    <?php echo $navList; ?>


</nav>

<main>

<h1>Acme Login</h1>
<?php
if (isset($message)) {
 echo $message;
}
?>


<form action='/acme/accounts/index.php' method="post">
<label for="clientEmail">Email Address</label><br>
<input type="email" name="clientEmail" id="clientEmail" required placeholder="Enter a valid email address"><br>

<label for="clientPassword">Password</label><br>
<span id="password-phrase">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>

<input type="password" name="clientPassword" id="clientPassword" required><br>

<br>

<input type="submit" name="submit" id="register-button" value="Login">

<!-- Add the action name - value pair -->
<input type="hidden" name="action" value="Login">
</form>

<br>

<h3>Not a member?</h3>
<p>
<button id="create-account-button" class="button" type="button" onclick="window.location.href='/acme/accounts/index.php?action=registration'">Create an Account</button>
</p>
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
