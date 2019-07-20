<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home | Acme, Inc.</title>
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

<section id="home" class="show">
<h1>Welcome to Acme</h1>

<div id="rocket-img">
            <ul id="rocket-feat">
                <li><h2>Acme Rocket</h2></li>
                <li class="feature">Quick lighting fuse</li>
                <li class="feature">NHTSA approved seat belts</li>
                <li class="feature">Mobile launch stand included</li>
                <li><img id="actionbtn"
                 alt="Add to cart button" src="/acme/images/site/iwantit.gif">
            </ul>
</div>

<div id="bottom-content">
            <div id="recipes">
            <h3>Featured Recipes</h3>
            <img src="/acme/images/recipes/bbqsand.jpg" alt="bbqsand">
            <img src="/acme/images/recipes/potpie.jpg" alt="potpie">
            <img src="/acme/images/recipes/soup.jpg" alt="soup">
            <img src="/acme/images/recipes/taco.jpg" alt="taco">
            </div>

        <div id="rocket-reviews">

        <h3>Acme Rocket Reviews</h3>
            <ul>
                <li>"I don't know how I ever caught roadrunners before this." (9/10)</li>
                <li>"That thing was fast!" (4/5)</li>
                <li>"Talk about fast delivery." (5/5)</li>
                <li>"I didn't even have to pull the meat apart." (4.5/5)</li>
                <li>"I'm on my thirtieth one. I love these things!" (5/5)</li>
            </ul>
        </div>
        </div>
</section>

<section id="product" class="hide">
            <h1 id="prod-name">All Purpose Trap</h1>
            <div id="prod-container">
            <img id="prod-img" src="#" alt="null">
            <div id="prod-desc"><p><span id="description">This all purpose trap comes in a variety of colors and sizes. Great for road runners, rabbits, mice and all other tasty morsels. Made of non-rusting metal alloy, it will last for years. You won't be disappointed.</span></p>
            <p class="no-space"><strong>Made by: </strong><span id="manufacturer">Placeholder Name</span></p>
            <p class="no-space"><strong>Reviews: </strong><span id="reviews">4.6/5 stars</span></p>
            <p><span id="price">Price: $20.00</span></p>
        
        </div></div>
            


        </section>

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
