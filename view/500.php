<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Acme, Inc.</title>
    <meta name="author" content="Lucas Mayer de Freitas">
    <link rel="stylesheet" href="/css/screen.css" media="screen" type="text/css">
</head>
<body>
<div id="content-area">

<header id="page-header">

<?php include $_SERVER['DOCUMENT_ROOT'].'/acme/view/header.php'; ?>

<!-- <img id="site-logo" alt="logo" src="/acme/images/site/logo.gif">
<p id="site-brand"></p> -->
</header>

<nav id="page-nav"> 
    <?php include($_SERVER['DOCUMENT_ROOT'].'/snippets/navigation.php'); ?>
</nav>

<main>

<h1>Server Error</h1><br>
<h3>Sorry, the server experienced a problem.</h3>

</main>
<footer id="page-footer">
            &copy;2018 ACME Inc. All Rights Reserved<br>
            All images are believed to be in "Fair Use". Please notify the author if any are not and they will be removed.
    </footer>
</div>
</body>
</html>

<!--
id = used once per page
class = repeatable as many times
-->
