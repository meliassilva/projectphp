<?php
 
   // if (empty ($_SESSION['clientData']['clientLevel']) || 
    //           $_SESSION['clientData']['clientLevel'] < 2){
                                  
    //header("Location: http://localhost/ACME");
                                    
    //} 
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
}    
    
?>
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
    <?php echo $navList; ?>
</nav>

<main>


<?php
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
   }
?>


<h2>Add New Product Image</h2>
<?php
 if (isset($message)) {
  echo $message;
 } ?>

<form action="/acme/uploads/" method="post" enctype="multipart/form-data">
 <label for="invItem">Product</label><br>
 <?php echo $prodSelect; ?><br><br>
 <label>Upload Image: </label><input type="file" name="file1"><br><br>

 <input type="submit" id="register-button1" value="Upload">
 <input type="hidden" name="action" value="upload">
</form>

<hr>

<h2>Existing Images</h2>
<p class="notice">If deleting an image, delete the thumbnail too and vice versa.</p>
<?php
 if (isset($imageDisplay)) {
  echo $imageDisplay;
 } ?>

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

<?php unset($_SESSION['message']); ?>

<!--
id = used once per page
class = repeatable as many times
-->
