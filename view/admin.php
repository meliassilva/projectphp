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

<?php
if($_SESSION['clientData']['clientLevel'] > 1){
    echo "<h1>Admin User</h1>"
    ."<ul><li>First Name: " . $_SESSION['clientData']['clientFirstname'] . "</li>" 
    ."<li>Last Name: " . $_SESSION['clientData']['clientLastname'] . "</li>"
    ."<li>Email: " . $_SESSION['clientData']['clientEmail'] . "</li></ul>"
    . "<a href='/acme/accounts/index.php?action=modClient'>Update Account Information</a>"
    . "<h1>Administrative Functions</h1>"
    . "<p>Use the link below to manage products</p>"
    . "<a href='/acme/products/index.php?action=prod-mgmt'>Products</a>";
} else {
    echo "<h1>". $_SESSION['clientData']['clientFirstname'] . " " . $_SESSION['clientData']['clientLastname'] . "</h1>"
    ."<p>You are Logged in.</p>"
    ."<ul><li>First Name: " . $_SESSION['clientData']['clientFirstname'] . "</li>" 
."<li>Last Name: " . $_SESSION['clientData']['clientLastname'] . "</li>"
."<li>Email: " . $_SESSION['clientData']['clientEmail'] . "</li></ul>"
. "<a href='/acme/accounts/index.php?action=modClient'>Update Account Information</a>";
}
?>

<?php
if (isset($message)) {
 echo $message;
}
?>


<!-- 
    <ul>
    <?php
echo "<li>First Name: " . $_SESSION['clientData']['clientFirstname'] . "</li>" 
."<li>Last Name: " . $_SESSION['clientData']['clientLastname'] . "</li>"
."<li>Email: " . $_SESSION['clientData']['clientEmail'] . "</li>";
?>
</ul>

<a href='/acme/accounts/index.php?action=modClient'>Update Account Information</a>
<h1>Administrative Functions</h1>
<p>Use the link below to manage products</p>

<?php
if($_SESSION['clientData']['clientLevel'] > 1){
    echo '<p><a href="/acme/products/">Products</a></p>';
}

?> -->


<br>
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
