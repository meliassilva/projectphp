<?php
/*
* Products Controller
*/
// Create or access a Session 
session_start();

// Get the database connection file
   require_once '../library/connections.php';
// Get the acme model for use as needed
   require_once '../model/acme-model.php';
// Get the accounts model
   require_once '../model/product-model.php';
   //call Functions.php
  require_once '../library/functions.php';

// Get the array of categories
$categories = getCategories();


//calling Navigation List
$navList = createNav($categories);

// // Build a navigation bar using the $categories array
// $navList = '<ul>';
// $navList .= "<li><a href='/acme/index.php' title='View the Acme home page'>Home</a></li>";
// foreach ($categories as $category) {
//  $navList .= "<li><a href='/acme/index.php?action=".urlencode($category['categoryName'])."' title='View our $category[categoryName] product line'>
//  $category[categoryName]</a></li>";
// }
// $navList .= '</ul>';


//creating Categories List
// $catList = "<select id='categoryId' name='categoryId'>";
// $catList .= "<option value='0'>Choose the Category</option>";
// foreach ($categories as $category) {
//  $catList .= "<option value=$category[categoryId]>$category[categoryName]</option>";
// }
// $catList .= '</select>';

// Get the value from the action name - value pair
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {
// Code to deliver the views will be here

case 'newCat':
include '../view/new-cat.php';
break;

case 'newProd':
include '../view/new-prod.php';
break;


case 'addCategory':
// Filter and store the data
  $newCategoryName = filter_input(INPUT_POST, 'newCategoryName', FILTER_SANITIZE_STRING);

// Check for missing data
if(empty($newCategoryName)){
    $message = '<h3>Please provide information for all empty form fields.</h3>';
    include '../view/new-cat.php';
    exit;
  }

// Send the data to the model
$createCategoryOutcome = regCategory($newCategoryName);

// Check and report the result
if($createCategoryOutcome === 1){
  $message = "<h3>New category has been added.</h3>";
  header('location: index.php?action=newCat');
  //header ('../view/new-cat.php');
  exit;
} else {
  $message = "<h3>Sorry, something went wrong Please try again.</h3>";
  include '../view/new-cat.php';
  exit;
}





case 'addProduct':

// Filter and store the data
$categoryId = filter_input(INPUT_POST, 'categoryId',FILTER_SANITIZE_NUMBER_INT);
$invName = filter_input(INPUT_POST, 'invName',FILTER_SANITIZE_STRING);
$invDescription = filter_input(INPUT_POST, 'invDescription',FILTER_SANITIZE_STRING);
$invImage = filter_input(INPUT_POST, 'invImage',FILTER_SANITIZE_STRING);
$invThumbnail = filter_input(INPUT_POST, 'invThumbnail',FILTER_SANITIZE_STRING);
$invPrice = filter_input(INPUT_POST, 'invPrice',FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
$invStock = filter_input(INPUT_POST, 'invStock',FILTER_SANITIZE_NUMBER_INT);
$invSize = filter_input(INPUT_POST, 'invSize',FILTER_SANITIZE_NUMBER_INT);
$invWeight = filter_input(INPUT_POST, 'invWeight',FILTER_SANITIZE_NUMBER_INT);
$invLocation = filter_input(INPUT_POST, 'invLocation',FILTER_SANITIZE_STRING);
$invVendor = filter_input(INPUT_POST, 'invVendor',FILTER_SANITIZE_STRING);
$invStyle = filter_input(INPUT_POST, 'invStyle',FILTER_SANITIZE_STRING);

//echo "$categoryId, $invName, $invDescription, 
//$invImage, $invThumbnail, $invPrice, $invStock, $invSize, 
//$invWeight, $invLocation, $invVendor, $invStyle";

//exit;

// Check for missing data
if(empty($invName) || empty($invDescription) || empty($invImage) || 
empty($invThumbnail) || empty($invPrice) ||  empty($invStock) || 
empty($invSize) || empty($invWeight) || empty($invLocation) || 
empty($invVendor) ||  empty($invStyle) || empty($categoryId)){

    $messageNewProduct = '<h2>Please provide information for all empty form fields.</h2>';
  include '../view/new-prod.php';
  exit;
}

// Send the data to the model
$createProductOutcome = regProduct($categoryId, $invName, $invDescription, 
$invImage, $invThumbnail, $invPrice, $invStock, $invSize, 
$invWeight, $invLocation, $invVendor, $invStyle);

// Check and report the result
if($createProductOutcome === 1){
  $messageNewProduct = "<h3>New product has been added.</h3>";
  //header('location: index.php?action=newProd');
  include '../view/new-prod.php';
  exit;
} else {
  $messageNewProduct = "<h3>Sorry, but the registration failed. Please try again.</h3>";
  include '../view/new-prod.php';
  exit;
}
break;

/* * ********************************** 
* Get Inventory Items by categoryId 
* Used for starting Update & delete process 
* ********************************** */ 
case 'getInventoryItems': 
 // Get the categoryId 
 $categoryId = filter_input(INPUT_GET, 'categoryId', FILTER_SANITIZE_NUMBER_INT); 
 // Fetch the products by categoryId from the DB 
 $productsArray = getProductsByCategory($categoryId); 
 // Convert the array to a JSON object and send it back 
 echo json_encode($productsArray); 
 break;



case 'mod':
 $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
 $prodInfo = getProductInfo($invId);
 if(count($prodInfo)<1){
  $message = 'Sorry, no product information could be found.';
 }
 include '../view/prod-update.php';
 exit;
break;

case 'getInventoryItems':
//Get the categoryId
$catId = filter_input(INPUT_GET, 'catId', FILTER_SANITIZE_NUMBER_INT);
//Fetch the products by categoryId from the DB
$productsArray = getProductsByCategory($catId);
//Convert the array to a JSON object and send it back
echo json_encode($productsArray);
break; 

case 'updateProd':
 $categoryId = filter_input(INPUT_POST, 'categoryId', FILTER_SANITIZE_NUMBER_INT);
 $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
 $invDescription = filter_input(INPUT_POST, 'invDescription', FILTER_SANITIZE_STRING);
 $invImg = filter_input(INPUT_POST, 'invImg', FILTER_SANITIZE_STRING);
 $invThumb = filter_input(INPUT_POST, 'invThumb', FILTER_SANITIZE_STRING);
 $invPrice = filter_input(INPUT_POST, 'invPrice', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
 $invStock = filter_input(INPUT_POST, 'invStock', FILTER_SANITIZE_NUMBER_INT);
 $invSize = filter_input(INPUT_POST, 'invSize', FILTER_SANITIZE_NUMBER_INT);
 $invWeight = filter_input(INPUT_POST, 'invWeight', FILTER_SANITIZE_NUMBER_INT);
 $invLocation = filter_input(INPUT_POST, 'invLocation', FILTER_SANITIZE_STRING);
 $invVendor = filter_input(INPUT_POST, 'invVendor', FILTER_SANITIZE_STRING);
 $invStyle = filter_input(INPUT_POST, 'invStyle', FILTER_SANITIZE_STRING);
 $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
     
 if (empty($categoryId) || empty($invName) || empty($invDescription) || 
 empty($invImg) || empty($invThumb) || empty($invPrice) || empty($invStock) || 
 empty($invSize) || empty($invWeight) || empty($invLocation) || 
 empty($invVendor) || empty($invStyle)) {
  $message = '<p>Please complete all information for the item! Double check the category of the item.</p>';
  include '../view/prod-update.php';
  exit;
 }
 $updateResult = updateProduct($categoryId, $invName, $invDescription, 
  $invImg, $invThumb, $invPrice, $invStock, $invSize, $invWeight, 
  $invLocation, $invVendor, $invStyle, $invId);
  
  if ($updateResult) {
   $message = "<p class='notice'>Congratulations, $invName was successfully updated.</p>";
   $_SESSION['message'] = $message;
   header('location: /acme/products/');
   exit;
  } else {$message = "<p class='notice'>Error. $invName was not updated.</p>";
  include '../view/prod-update.php';
  exit;
 }
 break;

 case 'del':
 $invId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
 $prodInfo = getProductInfo($invId);
 if (count($prodInfo) < 1) {
  $message = 'Sorry, no product information could be found.';
}
 include '../view/prod-delete.php';
 exit;
 break; 

 case 'deleteProd':
 $invName = filter_input(INPUT_POST, 'invName', FILTER_SANITIZE_STRING);
 $invId = filter_input(INPUT_POST, 'invId', FILTER_SANITIZE_NUMBER_INT);
       
 $deleteResult = deleteProduct($invId);
 if ($deleteResult) {
  $message = "<p class='notice'>Congratulations, $invName was successfully deleted.</p>";
  $_SESSION['message'] = $message;
  header('location: /acme/products/');
  exit;
 } else {
  $message = "<p class='notice'>Error: $invName was not deleted.</p>";
  $_SESSION['message'] = $message;
  header('location: /acme/products/');
  exit;
 }
 break;

 case 'category':
 $categoryName = filter_input(INPUT_GET, 'categoryName', FILTER_SANITIZE_STRING);
 $products = getProductsByCategoryName($categoryName);
 if(!count($products)){
  $message = "<p class='notice'>Sorry, no $categoryName products could be found.</p>";
 } else {
  $prodDisplay = buildProductsDisplay($products);
 }
 include '../view/category.php';
 break;

 echo $prodDisplay;
 exit;

case 'details';
$invId = filter_input(INPUT_GET, 'invId', FILTER_SANITIZE_STRING);
$product = getProductsDetails($invId);
$productThumbnails = getThumbnails($invId);

//var_dump($product);
if(!count($product)){
 $message = "<p class='notice'>Sorry, there no details on that product.</p>";
} else {
  
 $prodDetails = buildProductsDetails($product);
 $prodThumbnails = buildProductsThumbnails($productThumbnails);
}
include '../view/prod-details.php';
break;


echo $prodDetails;
exit;



//  case 'prod-mgmt':
//  include '../view/prod-mgmt.php';

//  break;



default:
$catList = buildCategoryList($categories);
include '../view/prod-mgmt.php';


}