<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en" class="no-scroll">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="resources/css/ionicons.min.css">
    <link rel="stylesheet" href="resources/css/style.css">
    <title>Fishing Unlimited</title>
    <link rel="icon" type="image/gif/png" href="resources/images/title.jpg">    
</head>



<body class ="no-scroll">   
    

    <!--LOG IN CODE-->

    <div id="signIn-wrapper" class="signIn">
        <form method = "POST" class="signIn-content animate" action="login.php">
            <div class="imgctn">
                <span onclick="document.getElementById('signIn-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
                <img src="resources/Images/user.png" alt="Avatar" class="avatar">
                <?php if(!empty($msg)) echo "$msg"; ?>
            </div>
            <div class="signIn-ctn">
                <input type="text" placeholder="Enter Username" name= "username">
                <input type="password" placeholder="Enter Password" name= "password">
                <button type= "submit" value = "submit" onsubmit= "validate()" href ="index.php" >Sign in</button>
            </div>
        </form>
    </div>


    <!--NAVIGATION BAR CODE-->
    <?php
        if(isset($_SESSION['id'])){
            echo " 
            <nav>
            <div class='logo'>Fishing Unlimited</div>
            <div class='menu'>
                <ul>
                    <li>
                        <a href='index.php'>Home</a>
                    </li>
                    <li>
                        <a href='resources/cart/products.php'>Products</a>
                    </li>
                    <li>
                        <a href='resources/cart/cart.php'>Cart</a>
                    </li>
                    <li>
                        <a href='logout.php'>Sign out</a>
                    </li>
                </ul>
            </div>
        </nav>
            ";
        }else{
            echo " 
            <nav>
            <div class='logo'>Fishing Unlimited</div>
            <div class='menu'>
                <ul>
                    <li>
                        <a href='index.php'>Home</a>
                    </li>
                    <li>
                        <a href='resources/cart/products.php'>Products</a>
                    </li>
                    <li>
                        <a href='resources/cart/cart.php'>Cart</a>
                    </li>
                    <li>
                        <a href='#' id='signIn-pop'>Sign In</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!--LOADING SCREEN-->
        <div class='spinner-ctn'>
        <h1>Loading</h1>
        <div class ='spinner'>
        <div class='rectangle1'></div>
        <div class='rectangle2'></div>
        <div class='rectangle3'></div>
        <div class='rectangle4'></div>
        <div class='rectangle5'></div>
        </div>
        </div>
            ";
        }
    ?>

    <header></header>

    <!-------CONTENT CODE-------->
    <div class="content">
        <div class="main">
            <h1>Fishing Unlimited</h1>
            <hr>
            <p>Fishing Unlimited is an online based store, which will supply you with all your fishing needs. <br/>
               We are currently only selling a selection of fishing rods, reels and fishing line,
               although we will be expanding our product range quite frequently. <br/>
               Our selection is based of the feedback of professional anglers, to ensure we only provide you with the highest quality products. <br>
               Feel free to view our products.
                <br><br><br><br>
               <a class = "view-prod" href= "resources/cart/products.php">VIEW  PRODUCTS</a>
            </p>
            <br><br><br>
            <h1>Contact us</h1>
            <p>
                Feel free to contact us for any enquiries: <br><br>
                <ul>
                <li>e-Mail: fishingunlimited@fishza.co.za</li><br>
                <li>Tel: (0)21 316 7640</li> <br>
                <li>Postal Address: PO Box 117, Durbanville, Cape Town, 7701</li>
                </ul>
            </p>
        </div>
    </div>


    <!--FOOTER CODE-->
    <footer>
        <p>&copy; Etienne Daniells</p>
    </footer>

</body>

<script type="text/javascript" src="resources/js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="resources/js/script.js"></script>

</html>