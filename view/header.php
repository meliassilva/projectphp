<img id="site-logo" alt="logo" src="/acme/images/site/logo.gif">
<p id="site-brand"></p>


<?php if(isset($cookieFirstname)){
 echo "<span>Welcome $cookieFirstname</span>";
} ?>


<div class="rightLink">
<?php
if (isset($_SESSION['loggedin'])) {
    echo "Welcome " . $_SESSION['clientData']['clientFirstname'].",  " .
    "<a href='/acme/accounts/?action=myAccount'><img id='folder' alt='My Account' src='/acme/images/site/account.gif'/> My Account</a>\n\t\t". " / " .
    "<a href='/acme/accounts/?action=Logout'>Logout</a>";
} else {
    
    echo "<img id='folder' alt='My Account' src='/acme/images/site/account.gif'/>";
    echo "<a href='/acme/accounts/?action=Login'>My Account</a>";
}
?>

<!-- <span id="myAccount">   
<a href='/acme/accounts/index.php?action=login'>
<img id="folder" src='/acme/images/site/account.gif' alt='My Account'> My Account</a>
</span> -->

</div>



