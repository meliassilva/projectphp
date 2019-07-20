<?php
/*
* Accounts Controller
*/

// Create or access a Session 
session_start();

// Get the database connection file
   require_once '../library/connections.php';
// Get the acme model for use as needed
   require_once '../model/acme-model.php';
// Get the accounts model
   require_once '../model/accounts-model.php';
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
//  $navList .= "<li><a href='/acme/index.php?action=urlencode($category[categoryName])' title='View our $category[categoryName] product line'>$category[categoryName]</a></li>";
// }
// $navList .= '</ul>';

// Get the value from the action name - value pair
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action) {

// Code to deliver the views will be here

case 'login':

include '../view/login.php';
break;

case 'Login':

 $clientEmail = filter_input(INPUT_POST, 'clientEmail', FILTER_SANITIZE_EMAIL);
 //$clientEmail = checkEmail($clientEmail);
 $clientPassword = filter_input(INPUT_POST, 'clientPassword', FILTER_SANITIZE_STRING);
 //$passwordCheck = checkPassword($clientPassword);
     
 // Run basic checks, return if errors
 if (empty($clientEmail) || empty($clientPassword)) {
  $message = '<p class="notice">Please provide a valid email address and password.</p>';
  include '../view/login.php';
  exit; 
 }

 // A valid password exists, proceed with the login process
 // Query the client data based on the email address
 $clientData = getClient($clientEmail);
 //var_dump($clientData);
 
 // Compare the password just submitted against
 // the hashed password for the matching client
 $hashCheck = password_verify($clientPassword, $clientData['clientPassword']);

 //echo $clientData['clientPassword'];

 // If the hashes don't match create an error
 // and return to the login view
 if (!$hashCheck) {
  $message = '<p class="notice">Please check your password and try again.</p>';
  include '../view/login.php';
  exit; 
 }

 // A valid user exists, log them in
 $_SESSION['loggedin'] = TRUE;
 // Remove the password from the array
 // the array_pop function removes the last
 // element from an array
 array_pop($clientData);
 // Store the array into the session
 $_SESSION['clientData'] = $clientData;
 // Send them to the admin view
 header ('location: index.php');
 exit;

 break;

case 'registration':
include '../view/registration.php';
break;

case 'register':
// Filter and store the data
  $clientFirstname = filter_input(INPUT_POST, 'clientFirstname');
  $clientLastname = filter_input(INPUT_POST, 'clientLastname');
  $clientEmail = filter_input(INPUT_POST, 'clientEmail');
  $clientPassword = filter_input(INPUT_POST, 'clientPassword');

  $existingEmail = checkExistingEmail($clientEmail);

// Check for existing email address in the table
if($existingEmail){
  $message = '<p class="notice">That email address already exists. Do you want to login instead?</p>';
  include '../view/login.php';
  exit;
 }


// Check for missing data
if(empty($clientFirstname) || empty($clientLastname) || empty($clientEmail) || empty($clientPassword)){
  $message = '<p>Please provide information for all empty form fields.</p>';
  include '../view/registration.php';
  exit;
}

$clientPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

// Send the data to the model
$regOutcome = regClient($clientFirstname, $clientLastname, $clientEmail, $clientPassword);

// Check and report the result
if($regOutcome === 1){

  setcookie('firstname', $clientFirstname, strtotime('+1 year'), '/');
  $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
  include '../view/login.php';
  exit;  

  $message = "<p>Thanks for registering $clientFirstname. Please use your email and password to login.</p>";
  include '../view/login.php';
  exit;
} else {
  $message = "<p>Sorry $clientFirstname, but the registration failed. Please try again.</p>";
  include '../view/registration.php';
  exit;
}
break;


case 'Logout':
session_unset();
session_destroy();
include '../view/login.php';

break;  


case 'myAccount':
include '../view/admin.php';

break;  


case 'modClient':
$clientInfo = getClient($_SESSION["clientData"]["clientEmail"]);
include '../view/client-update.php';
//var_dump ($clientInfo);
break;

case 'updateAccount':
// Filter and store the data
$clientFirstname = filter_input(INPUT_POST, 'clientFirstname',  FILTER_SANITIZE_STRING);
$clientLastname = filter_input(INPUT_POST, 'clientLastname',  FILTER_SANITIZE_STRING);
$clientEmail = filter_input(INPUT_POST, 'clientEmail',  FILTER_SANITIZE_EMAIL);

     
 if (empty($clientFirstname) || empty($clientLastname) || empty($clientEmail)) {
  $message = '<p>Please complete all information for the item! Double check the category of the item.</p>';
  include '../view/client-update.php';
  exit;
 }
 $updateResult = updateAccount($clientFirstname, $clientLastname, $clientEmail, $_SESSION["clientData"]["clientId"]); 
  
  if ($updateResult) {
   $message = "<p class='notice'>Congratulations, was successfully updated.</p>";
   $_SESSION['message'] = $message;
   $clientData = getClientId($_SESSION["clientData"]["clientId"]);
   $_SESSION['clientData'] = $clientData;

   header('location: index.php');
   exit;
  } else {$message = "<p class='notice'>Error.  was not updated.</p>";
  include '../view/client-update.php';
  exit;
 }
 break;


 case 'updatePassword':
 // Filter and store the data
$clientPassword = filter_input(INPUT_POST, 'clientPassword',  FILTER_SANITIZE_STRING);
$pastCheck = checkPassword($clientPassword);
    

 if (empty($pastCheck)) {
  $message = '<p>Please complete all information for the item! Double check the category of the item.</p>';
  include '../view/client-update.php';
  exit;
 }

 $clientPassword = password_hash($clientPassword, PASSWORD_DEFAULT);

 $updateResult = updatePassword($clientPassword, $_SESSION["clientData"]["clientId"]); 
  
  if ($updateResult) {
   $message = "<p class='notice'>Congratulations, was successfully updated.</p>";
   $_SESSION['message'] = $message;
   $clientData = getClientId($_SESSION["clientData"]["clientId"]);
   $_SESSION['clientData'] = $clientData;

   header('location: index.php');
   exit;
  } else {$message = "<p class='notice'>Error.  was not updated.</p>";
  include '../view/client-update.php';
  exit;
 }
 break;

default:
include '../view/admin.php';

}