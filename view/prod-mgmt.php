<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Management | Acme, Inc.</title>
    <meta name="author" content="Lucas Mayer de Freitas">
    <link rel="stylesheet" href="/acme/css/screen.css" media="screen" type="text/css">
</head>
<body>
<div id="content-area">

<header id="page-header">
<!-- <img id="site-logo" alt="logo" src="/acme/images/site/logo.gif">
<p id="site-brand"></p>

<span id="myAccount">    -->


<?php include $_SERVER['DOCUMENT_ROOT'].'/acme/view/header.php'; ?>

</header>

<nav id="page-nav"> 
    <?php echo $navList; ?>
</nav>

<main>

<h1>Product Management</h1>
<p>Welcome to the product management page. Please choose an option below:</p>
<ul>
<li><a href="/acme/products/index.php?action=newCat">Add a New Category</a></li>
<li><a href="/acme/products/index.php?action=newProd">Add a New Product</a></li>


</ul>

<?php
if (isset($_SESSION['message'])) {
 echo $_SESSION['message'];
}
?>
<h1>Products By Category </h1>
<p>Choose a category to see those products</p>
<?php
echo $catList
?>

<table id="productsDisplay"></table>

<br>
<br>


</main>
<footer id="page-footer">
            &copy;2019 ACME Inc. All Rights Reserved<br>
            All images are believed to be in "Fair Use". Please notify the author if any are not and they will be removed.
    </footer>
</div>
<script src="../js/products.js"></script>
</body>
</html>

<!--
id = used once per page
class = repeatable as many times
-->
