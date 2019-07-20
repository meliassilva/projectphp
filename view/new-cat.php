<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Category Registration | Acme, Inc.</title>
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

<h1>Add Category</h1>
<p>Add a new category of products below.</p>


<?php
if (isset($message)) {
 echo $message;
}
?>

<!-- post means write, while get means read -->
<form action='/acme/products/index.php' method="post">

  <label for="newCategoryName">New Category Name</label><br>
  <input type="text" name="newCategoryName" id="newCategoryName" required><br>  

<br>
<!--
<button id="register-button" type="button" onclick="window.location.href='/acme/accounts/index.php?action=register'">Register</button>
-->

<input id="register-button" type="submit" name="submit" value="Register">
<!-- id="regbtn" -->
 

<!-- Add the action name - value pair -->
<input type="hidden" name="action" value="addCategory">

<p>Return to <a href='/acme/products/'>Product Management</a></p>

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
