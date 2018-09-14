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
    <title>Cart</title>
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
                        <a href='#p' id='signIn-pop'>Sign In</a>
                    </li>
                </ul>
            </div>
        </nav>
            ";
        }
    ?>s

    <header></header>

        <!-------CONTENT CODE-------->
        <div class="container">

        <div style="clear:both"></div>  
        <br />  
        <div class="table-responsive">  
        <table class="table">  
            <tr><th colspan="5"><h3>Order Details</h3></th></tr>   
        <tr>  
             <th width="40%">Product Name</th>  
             <th width="10%">Quantity</th>  
             <th width="20%">Price</th>  
             <th width="15%">Total</th>  
             <th width="5%">Action</th>  
        </tr>  
        <?php   
        if(!empty($_SESSION['shopping_cart'])):  
            
             $total = 0;  
        
             foreach($_SESSION['shopping_cart'] as $key => $product): 
        ?>  
        <tr>  
           <td><?php echo $product['name']; ?></td>  
           <td><?php echo $product['quantity']; ?></td>  
           <td>R <?php echo $product['price']; ?></td>  
           <td>R <?php echo number_format($product['quantity'] * $product['price'], 2); ?></td>  
           <td>
               <a href="cart.php?action=delete&id=<?php echo $product['id']; ?>">
                    <div class="btn-danger">Remove</div>
               </a>
           </td>  
        </tr>  
        <?php  
                  $total = $total + ($product['quantity'] * $product['price']);  
             endforeach;  
        ?>  
        <tr>  
             <td colspan="3" align="right">Total</td>  
             <td align="right">R <?php echo number_format($total, 2); ?></td>  
             <td></td>  
        </tr>  
        <tr>
            <td colspan="5">
             <?php 
                if (isset($_SESSION['shopping_cart'])):
                if (count($_SESSION['shopping_cart']) > 0):
             ?>
                <a href="#" class="button">Checkout</a>
             <?php endif; endif; ?>
            </td>
        </tr>
        <?php  
        endif;
        ?>  
        </table>  
         </div>
         </div>


    <!--FOOTER CODE-->
    <footer id="footer">
        <p>&copy; Etienne Daniells</p>
    </footer>
    

</body>
<script type="text/javascript" src="../js/script.js"></script>

</html>