   
<?php 
 
    if (empty ($_SESSION['clientData']['clientLevel'])){
                                  
    header("Location: http://localhost/ACME");
                                    
    } 
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

<h1>Update Account</h1>
<p>Use this form to update your name or email information.</p>


<?php
if (isset($messageNewProduct)) {
 echo $messageNewProduct;
}
?>

<!-- post means write, while get means read -->
<form action='/acme/accounts/index.php' method="post">
<fieldset>
  <label for="clientFirstname">First Name:</label><br>
  <input type="text" name="clientFirstname" id="clientFirstname" 

  <?php if(isset($clientFirstname)){ echo "value='$clientFirstname'"; } 
  elseif(isset($clientInfo['clientFirstname'])) {
   echo "value='$clientInfo[clientFirstname]'"; }?> required><br>

<label for="clientLastname">Last Name:</label><br>
  <input type="text" name="clientLastname" id="clientLastname" 
  <?php if(isset($clientLastname)){ echo "value='$clientLastname'"; } 
  elseif(isset($clientInfo['clientLastname'])) {
   echo "value='$clientInfo[clientLastname]'"; }?> required><br>

<label for="clientEmail">Email Address:</label><br>
  <input type="text" name="clientEmail" id="clientEmail" 
  <?php if(isset($clientEmail)){ echo "value='$clientEmail'"; } 
  elseif(isset($clientInfo['clientEmail'])) {
   echo "value='$clientInfo[clientEmail]'"; }?> required><br>



<br>
<!--
<button id="register-button" type="button" onclick="window.location.href='/acme/products/index.php?action=register'">Register</button>
-->
<input id="register-button1" type="submit" name="submit" value="Update Account">
<!-- id="regbtn" -->

<!-- Add the action name - value pair -->
<input type="hidden" name="action" value="updateAccount">
<input type="hidden" name="invId" 
 value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} 
 elseif(isset($invId)){ echo $invId; } ?>">
</fieldset>
</form>
<br>
<br>


<h1>Password Change</h1>
<p>Use this form to change your password.</p>



<form action='/acme/accounts/index.php' method="post">
<fieldset>

<label for="clientPassword">Password</label><br>

<span id="password-phrase">Passwords must be at least 8 characters and contain at least 1 number, 1 capital letter and 1 special character</span><br>

<input type="password" name="clientPassword" id="clientPassword" required pattern="(?=^.{8,}$)(?=.*\d)(?=.*\W+)(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$">



<br>
<!--
<button id="register-button" type="button" onclick="window.location.href='/acme/products/index.php?action=register'">Register</button>
-->
<input id="register-button2" type="submit" name="submit" value="Update Password">
<!-- id="regbtn" -->

<!-- Add the action name - value pair -->
<input type="hidden" name="action" value="updatePassword">
<input type="hidden" name="invId" 
 value="<?php if(isset($prodInfo['invId'])){ echo $prodInfo['invId'];} 
 elseif(isset($invId)){ echo $invId; } ?>">
</fieldset>
</form>


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
