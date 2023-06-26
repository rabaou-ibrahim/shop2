<?php    
    if (!$_SESSION['username']){
        header('location: warning.view.php');   
    }
    require_once "../boutique2/controllers/ProductsController.controller.php";
    $productController = new ProductsController;

    require_once "../boutique2/controllers/PurchasesController.controller.php";
    $purchaseController = new PurchasesController;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/boutique2/webfiles/Css/index4.css">
    <title>Accueil</title>
</head>
<body>
    <header>
        <button class="profile-btn"><a href="h"><img src = 'http://localhost/boutique2/webfiles/img/user/user.png' width="40px" height="40px"><span class="tooltip-text">Mon profil</span></a></button>
        <button class="cart-btn"><a href="h"><img src = 'http://localhost/boutique2/webfiles/img/user/shopping-cart.png' width="40px" height="40px"><span class="tooltip-text">Mon panier</span></a></button>
        <button class="shop-btn"><a href="http://localhost/boutique2/user/s"><img src = 'http://localhost/boutique2/webfiles/img/user/shop.png' width="40px" height="40px"><span class="tooltip-text">Boutique</span></a></button>
        <button class="clock-btn"><a href="h"><img src = 'http://localhost/boutique2/webfiles/img/user/time.png' width="40px" height="40px"><span class="tooltip-text">Mon historique</span></a></button>
        <button class="logout-btn"><a href="http://localhost/boutique2/user/lo"><img src = 'http://localhost/boutique2/webfiles/img/user/power-on.png' width="40px" height="40px"><span class="tooltip-text">Me déconnecter</span></a></button>
    </header>

        <div class="welcome-msg"> <h2>Bienvenue <?= $_SESSION['username'] ?></h2> </div>
    
    <div class="container">
        <div class="shop-block">
            <div class="image-preview">
                <?= $productController->getRandomImage(); ?>
            </div>

            <div class="text-articles">
                Découvrez ici nos derniers articles !
            </div>
            

            <button class="btn-shop">Boutique</button>
        </div>
        <div class="purchases-block">
            <div class="purchases">
                Vous avez effectué achats.
            </div>

            <div class="text-purchases">
                Voir mes achats
            </div>

            <button><a href="user/h">Mes achats</a></button>
        </div>
    </div>
    
    <footer>
        <ul>
            <li>contacts</li>
            <li>service client</li>
            <li>newsletter</li>
            <li>résaux</li>
        </ul>
    </footer>

</body>
</html>