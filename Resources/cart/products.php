<?php
    session_start();
    $product_ids = array();    

    if(filter_input(INPUT_POST, 'add_to_cart')){
        if(isset($_SESSION['shopping_cart'])){
            
            $count = count($_SESSION['shopping_cart']);
            $product_ids = array_column($_SESSION['shopping_cart'], 'id');
            
            if (!in_array(filter_input(INPUT_GET, 'id'), $product_ids)){
            $_SESSION['shopping_cart'][$count] = array
                (
                    'id' => filter_input(INPUT_GET, 'id'),
                    'name' => filter_input(INPUT_POST, 'name'),
                    'price' => filter_input(INPUT_POST, 'price'),
                    'quantity' => filter_input(INPUT_POST, 'quantity')
                );   
            }
            else { 
                for ($i = 0; $i < count($product_ids); $i++){
                    if ($product_ids[$i] == filter_input(INPUT_GET, 'id')){
                        $_SESSION['shopping_cart'][$i]['quantity'] += filter_input(INPUT_POST, 'quantity');
                    }
                }
            }
            
        }
        else { 
            $_SESSION['shopping_cart'][0] = array
            (
                'id' => filter_input(INPUT_GET, 'id'),
                'name' => filter_input(INPUT_POST, 'name'),
                'price' => filter_input(INPUT_POST, 'price'),
                'quantity' => filter_input(INPUT_POST, 'quantity')
            );
        }
    }
    
    if(filter_input(INPUT_GET, 'action') == 'delete'){
        foreach($_SESSION['shopping_cart'] as $key => $product){
            if ($product['id'] == filter_input(INPUT_GET, 'id')){
                unset($_SESSION['shopping_cart'][$key]);
            }
        }
        $_SESSION['shopping_cart'] = array_values($_SESSION['shopping_cart']);
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <title>Fishing Unlimited</title>
    <link rel="icon" type="image/gif/png" href="../images/title.jpg">
</head>



<body>
        <!--LOG IN CODE-->

    <div id="signIn-wrapper" class="signIn">
        <form method = "POST" class="signIn-content animate" action="../../login.php">
            <div class="imgctn">
                <span onclick="document.getElementById('signIn-wrapper').style.display='none'" class="close" title="Close PopUp">&times;</span>
                <img src="../Images/user.png" alt="Avatar" class="avatar">
                <?php if(!empty($msg)) echo "$msg"; ?>
            </div>
            <div class="signIn-ctn">
                <input type="text" placeholder="Enter Username" name= "username">
                <input type="password" placeholder="Enter Password" name= "password">
                <button type= "submit" value = "submit" onsubmit= "validate()" >Sign in</button>
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
                        <a href='../../index.php'>Home</a>
                    </li>
                    <li>
                        <a href='products.php'>Products</a>
                    </li>
                    <li>
                        <a href='cart.php'>Cart</a>
                    </li>
                    <li>
                        <a href='../../logout.php'>Sign out</a>
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
                        <a href='../../index.php'>Home</a>
                    </li>
                    <li>
                        <a href='products.php'>Products</a>
                    </li>
                    <li>
                        <a href='cart.php'>Cart</a>
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
        <div class="container">
            <?php
                $user = "root";
                $pass = "";
                $db = "fishing_unlimited";    
                $db_connect = new mysqli('localhost', $user, $pass, $db);
                        
                if(!$db_connect){
                die("Connection failed: ".mysqli_connect_error());
                }

                $sql = "SELECT * FROM stock ORDER BY id ASC"; 
                
                $result = mysqli_query($db_connect, $sql);


                if($result):
                    if(mysqli_num_rows($result)>0):
                        while($product = mysqli_fetch_assoc($result)):
            ?>

                <div class="col-sm-4 col-md-3">
                    <form method="post" action="products.php?action=add&id=<?php echo $product['id'];?>">
                        <div class = "products">
                            <img src="<?php echo $product['image']; ?>" class = "img-responsive"/>
                            <h4 class= "text-info"> <?php echo $product['name']; ?></h4>
                            <h4>R <?php echo $product['price']; ?></h4>
                            <input type="text" name="quantity" class="form-control" value= "1" />
                            <input type="hidden" name="name" value="<?php echo $product['name']; ?>" />
                            <input type="hidden" name="price" value="<?php echo $product['price']; ?>" />
                            <input type="submit" name="add_to_cart" class="btn btn-info" style="margin-top:5px;" value= "Add to Cart" />
                        </div>                    
                    </form>
                </div>
            <?php
                        endwhile;
                    endif;
                endif;
            ?>
         </div>


    <!--FOOTER CODE-->
    <footer>
        <p>&copy; Etienne Daniells</p>
    </footer>

</body>
<script type="text/javascript" src="../js/script.js"></script>

</html>