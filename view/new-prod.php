<?php
$catList = "<select id='categoryId' name='categoryId'>";
$catList .= "<option value='0'>Choose the Category</option>";
foreach ($categories as $category) {
    $catList .= "<option value='$category[categoryId]'";
    if(isset($categoryId)){
        if($category['categoryId'] === $categoryId){
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
    <title>Product Registration | Acme, Inc.</title>
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

<h1>Add Product</h1>
<p>Add a new product below.</p>


<?php
if (isset($messageNewProduct)) {
 echo $messageNewProduct;
}
?>

<!-- post means write, while get means read -->
<form action='/acme/products/index.php' method="post">

<p>Category <br>
 <?php
echo $catList;
?>
<br>

  <label for="invName">Product Name</label><br>
  <input type="text" name="invName" id="invName" <?php if(isset($invName)){echo "value='$invName'";} ?> required><br>
  
  <label for="invDescription">Product Description</label><br>
  <textarea  rows="5" cols="40" name="invDescription" id="invDescription" required><?php if(isset($invDescription)){echo "$invDescription";} ?></textarea><br>

  <label for="invImage">Product Image (path to image)</label><br>
  <input type="text" name="invImage" id="invImage" <?php if(isset($invImage)){echo "value='$invImage'";} ?> required><br>

  <label for="invThumbnail">Product Thumbnail (path to thumbnail)</label><br>
  <input type="text" name="invThumbnail" id="invThumbnail" <?php if(isset($invThumbnail)){echo "value='$invThumbnail'";} ?> required><br>

  <label for="invPrice">Product Price</label><br>
  <input type="number" name="invPrice" id="invPrice" <?php if(isset($invPrice)){echo "value='$invPrice'";} ?> required><br>

  <label for="invStock"># in Stock</label><br>
  <input type="number" name="invStock" id="invStock" <?php if(isset($invStock)){echo "value='$invStock'";} ?> required><br>

  <label for="invSize">Shipping Size (W x H x L in inches)</label><br>
  <input type="number" name="invSize" id="invSize" <?php if(isset($invSize)){echo "value='$invSize'";} ?> required><br>

  <label for="invWeight">Weight (lbs.)</label><br>
  <input type="number" name="invWeight" id="invWeight" <?php if(isset($invWeight)){echo "value='$invWeight'";} ?> required><br>

  <label for="invLocation">Location (city name)</label><br>
  <input type="text" name="invLocation" id="invLocation" <?php if(isset($invLocation)){echo "value='$invLocation'";} ?> required><br>

  <label for="invVendor">Vendor Name</label><br>
  <input type="text" name="invVendor" id="invVendor" <?php if(isset($invVendor)){echo "value='$invVendor'";} ?> required><br>

  <label for="invStyle">Primary Material</label><br>
  <input type="text" name="invStyle" id="invStyle" <?php if(isset($invStyle)){echo "value='$invStyle'";} ?> required><br>

<br>
<!--
<button id="register-button" type="button" onclick="window.location.href='/acme/products/index.php?action=register'">Register</button>
-->
<input id="register-button" type="submit" name="submit" value="Register">
<!-- id="regbtn" -->

<!-- Add the action name - value pair -->
<input type="hidden" name="action" value="addProduct">

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
