<?php

// if($_SESSION['clientData']['clientLevel'] < 2{
//     header('location:/acme/');
//     exit;
// }


// Build the categories option list
$catList = '<select name="categoryId" id="categoryId">';
$catList .= "<option>Choose a Category</option>";
foreach ($categories as $category) {
 $catList .= "<option value='$category[categoryId]'";
 if(isset($categoryId)){
  if($category['categoryId'] === $categoryIdu){
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
    <title><?php if(isset($prodInfo['invName'])){ 
       echo "Modify $prodInfo[invName] ";} 
       elseif(isset($invName)) { echo $invName; }?> 
       | Acme, Inc</title>
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
<form action='/acme/products/index.php' method="post">

<p>Category <br>
 <?php
echo $catList;
?>
<br>

  <label for="invName">Product Name</label><br>
  <input type="text" name="invName" id="invName" 
  <?php if(isset($invName)){ echo "value='$invName'"; } 
  elseif(isset($prodInfo['invName'])) {
   echo "value='$prodInfo[invName]'"; }?> required><br>
  
  <label for="invDescription">Product Description</label><br>
  <textarea  rows="5" cols="40" name="invDescription" id="invDescription" required><?php if(isset($invDescription)){ echo $invDescription; }
  elseif(isset($prodInfo['invDescription'])) {
   echo $prodInfo['invDescription']; } ?></textarea><br>

  <label for="invImage">Product Image (path to image)</label><br>
  
  <input type="text" name="invImg" id="invImage" value='
  <?php if(isset($prodInfo['invImage'])){ 
      echo $prodInfo['invImage'];} 
      elseif(isset($invImg)) { echo $invImg; }?>' required><br>

  <label for="invThumbnail">Product Thumbnail (path to thumbnail)</label><br>
  <input type="text" name="invThumb" id="invThumbnail" 
  <?php if(isset($invThumb)){ echo "value='$invThumb'"; } 
  elseif(isset($prodInfo['invThumbnail'])) {
   echo "value='$prodInfo[invThumbnail]'"; }?> required><br>

  <label for="invPrice">Product Price</label><br>
  <input type="number" name="invPrice" id="invPrice" 
  <?php if(isset($invPrice)){ echo "value='$invPrice'"; } 
  elseif(isset($prodInfo['invPrice'])) {
   echo "value='$prodInfo[invPrice]'"; }?> required><br>

  <label for="invStock"># in Stock</label><br>
  <input type="number" name="invStock" id="invStock" 
  <?php if(isset($invStock)){ echo "value='$invStock'"; } 
  elseif(isset($prodInfo['invStock'])) {
   echo "value='$prodInfo[invStock]'"; }?> required><br>

  <label for="invSize">Shipping Size (W x H x L in inches)</label><br>
  <input type="number" name="invSize" id="invSize" 
  <?php if(isset($invSize)){ echo "value='$invSize'"; } 
  elseif(isset($prodInfo['invSize'])) {
   echo "value='$prodInfo[invSize]'"; }?> required><br>

  <label for="invWeight">Weight (lbs.)</label><br>
  <input type="number" name="invWeight" id="invWeight" 
  <?php if(isset($invWeight)){ echo "value='$invWeight'"; } 
  elseif(isset($prodInfo['invWeight'])) {
   echo "value='$prodInfo[invWeight]'"; }?> required><br>

  <label for="invLocation">Location (city name)</label><br>
  <input type="text" name="invLocation" id="invLocation" 
  <?php if(isset($invLocation)){ echo "value='$invLocation'"; } 
  elseif(isset($prodInfo['invLocation'])) {
   echo "value='$prodInfo[invLocation]'"; }?> required><br>

  <label for="invVendor">Vendor Name</label><br>
  <input type="text" name="invVendor" id="invVendor" 
  <?php if(isset($invVendor)){ echo "value='$invVendor'"; } 
  elseif(isset($prodInfo['invVendor'])) {
   echo "value='$prodInfo[invVendor]'"; }?> required><br>

  <label for="invStyle">Primary Material</label><br>
  <input type="text" name="invStyle" id="invStyle" 
  <?php if(isset($invStyle)){ echo "value='$invStyle'"; } 
  elseif(isset($prodInfo['invStyle'])) {
   echo "value='$prodInfo[invStyle]'"; }?> required><br>

<br>
<!--
<button id="register-button" type="button" onclick="window.location.href='/acme/products/index.php?action=register'">Register</button>
-->
<input id="register-button1" type="submit" name="submit" value="Update Product">
<!-- id="regbtn" -->

<!-- Add the action name - value pair -->
<input type="hidden" name="action" value="updateProd">
<input type="hidden" name="invId" 
 value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} 
 elseif(isset($invId)){ echo $invId; } ?>">

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
