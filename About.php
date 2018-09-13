<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="resources/css/ionicons.min.css">
    <link rel="stylesheet" href="resources/css/style.css">
    <title>Fishing Unlimited</title>
    <link rel="icon" type="image/gif/png" href="resources/images/title.jpg">
</head>



<body>

    <!--LOG IN CODE-->

    <div id="signIn-wrapper" class="signIn">
        <form method = "POST" class="signIn-content animate" action="login.php">
            <div class="imgctn">
                <span onclick="document.getElementById('signIn-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
                <img src="resources/Images/user.png" alt="Avatar" class="avatar">
                <?php if(!empty($msg)) echo "$msg"?>
            </div>
            <div class="signIn-ctn">
                <input type="text" placeholder="Enter Username" name= "username">
                <input type="password" placeholder="Enter Password" name= "password">
                <button type= "submit">Sign in</button>
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
                        <a href='Index.php'>Home</a>
                    </li>
                    <li>
                        <a href='Cart.php'>Cart</a>
                    </li>
                    <li>
                        <a href='About.php'>About</a>
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
                        <a href='Index.php'>Home</a>
                    </li>
                    <li>
                        <a href=''>Products</a>
                    </li>
                    <li>
                        <a href='About.php'>About</a>
                    </li>
                    <li>
                        <a href='#' id='signIn-pop'>Sign In</a>
                    </li>
                </ul>
            </div>
        </nav>
            ";
        }
    ?>

    <header></header>

    <!-------CONTENT CODE-------->
    <div class="content">
        <div class="abt">
            <p>about</p>
        </div>
    </div>


    <!--FOOTER CODE-->
    <footer>
        <p>&copy; Etienne Daniells</p>
    </footer>

</body>

<script type="text/javascript" src="resources/js/script.js"></script>

</html>