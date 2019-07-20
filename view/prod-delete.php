<?php

// if($_SESSION['clientData']['clientLevel'] < 2 {
//     header('location:/acme/');
//     exit;
// }


//Build the categories option list
$catList = '<select name="categoryId" id="categoryId">';
$catList .= "<option>Choose a Category</option>";
foreach ($categories as $category) {
 $catList .= "<option value='$category[categoryId]'";
 if(isset($categoryId)){
  if($category['categoryId'] === $categoryId){
   $catList .= ' selected ';
  }
 } elseif(isset($prodInfo['categoryId'])){
  if($category['categoryId'] === $prodInfo['categoryId']){
   $catList .= ' selected ';
  }
 }
$catList .= ">$category[categoryName]</option>";
}
$catList .= '</select>';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?> | Acme, Inc.</title>

    <!-- <title>Product Registration | Acme, Inc.</title> -->
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

<h1>Add Product</h1>
<p>Add a new product below.</p>


<?php
if (isset($messageNewProduct)) {
 echo $messageNewProduct;
}
?>

<!-- post means write, while get means read -->


<h1><?php if(isset($prodInfo['invName'])){ echo "Delete $prodInfo[invName]";} ?></h1>

<p>Confirm Product Deletion. The delete is permanent.</p>

<form method="post" action="/acme/products/">
 <fieldset>
 <label for="categoryId">Category</label><br>
 <?php
echo $catList;
?>
<br>


  <label for="invName">Product Name</label><br>
  <input type="text" readonly name="invName" id="invName" 
   <?php if(isset($prodInfo['invName'])) {echo "value='$prodInfo[invName]'"; }?>><br>
  <label for="invDescription">Product Description</label><br>
  <textarea rows="5" cols="40" name="invDescription" readonly id="invDescription"><?php if(isset($prodInfo['invDescription'])) {echo $prodInfo['invDescription']; } ?></textarea>
  <label>&nbsp;</label><br>
  <input type="submit" id="register-button1" class="regbtn" name="submit" value="Delete Product">
  <input type="hidden" name="action" value="deleteProd">
  <input type="hidden" name="invId" value="
   <?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} ?>">
 </fieldset>
 </form>

<br>
<!--
<button id="register-button" type="button" onclick="window.location.href='/acme/products/index.php?action=register'">Register</button>
-->
<!-- <input id="register-button" type="submit" name="submit" value="Update Product"> -->
<!-- id="regbtn" -->

<!-- Add the action name - value pair -->
<!-- <input type="hidden" name="action" value="deleteProd">
<input type="hidden" name="invId" 
 value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} 
 elseif(isset($invId)){ echo $invId; } ?>"> -->


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
