<?php    
    if (!$_SESSION['username']){
        header('location: ../home');   
    }
    require_once "./models/User/UserManager.class.php";
    $userManager = new UserManager;
    $userManager->loadUsers();

    require_once "./models/Product/ProductManager.class.php";
    $productManager = new ProductManager;
    $productManager->loadProducts();

    require_once "./models/Cart/CartManager.class.php";
    $cartManager = new CartManager;
    $cartManager->loadCarts();

    require_once "./models/CartItems/CartItemsManager.class.php";
    $cartItemsManager = new CartItemsManager;
    $cartItemsManager->loadCartItems();

    require_once "./controllers/CartsController.controller.php";
    $cartController = new CartsController;
    $userCartData = $cartController->getUserCartData();

    if ($userCartData) {
        $userCart = $userCartData['userCart'];
        $products = $userCartData['products'];
    } else {
        echo ('Pas de produit ajouté');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/boutique2/webfiles/Css/cart.css">
    <title>Boutique</title> 
</head>
<body>
    <header>
        <button class="profile-btn"><a href="h"><img src = 'http://localhost/boutique2/webfiles/img/user/user.png' width="40px" height="40px"><span class="tooltip-text">Mon profil</span></a></button>
        <button class="cart-btn"><a href=""><img src = 'http://localhost/boutique2/webfiles/img/user/shopping-cart.png' width="40px" height="40px"><span class="tooltip-text">Mon panier</span><span class="round-btn" id="round-btn"></span><span class="item-count" id="item-count">0</span></a></button>
        <button class="shop-btn"><a href="http://localhost/boutique2/user/s"><img src = 'http://localhost/boutique2/webfiles/img/user/shop.png' width="40px" height="40px"><span class="tooltip-text">Boutique</span></a></button>
        <button class="clock-btn"><a href="h"><img src = 'http://localhost/boutique2/webfiles/img/user/time.png' width="40px" height="40px"><span class="tooltip-text">Mon historique</span></a></button>
        <button class="logout-btn"><a href="http://localhost/boutique2/user/lo"><img src = 'http://localhost/boutique2/webfiles/img/user/power-on.png' width="40px" height="40px"><span class="tooltip-text">Me déconnecter</span></a></button>
    </header>
    <button class="display-return"><a href="<?= URL ?>user/s">Retour</a></button>
    <h3>Mon panier</h3>
    
        <?php 
            foreach ($products as $product) : 
        ?>
        <div class="horizontal-line"></div>
        <table class="table" id="product-table">
            <h3>Nom : <?= $product['name'] ?></h3>
            <h3>Total : <?= $product['price'] ?>€</h3>
            <tr class="table-content">
                <td>
                <p>Quantité : <?= $product['quantity']; ?> </p>
                    <div class="tooltip">
                        <img src="http://localhost/boutique2/webfiles/img/shop/<?= $product['image'] ?>" width="150px">
                        <span class="tooltip-text">
                            <strong class="product-name">Nom:</strong> <?= $product['name'] ?><br>
                            <strong class="product-description">Description:</strong> <?= $product['description'] ?><br>
                            <strong class="product-price">Prix:</strong> <?= $product['price'] ?>€
                        </span>
                    </div>
                </td>
                <td>
                    <form method="POST" onSubmit = "return confirm('Confirmer achat ?');">
                        <input type="hidden" name="quantity" class="quantity-input" value="<?= $product['quantity']; ?>">
                        <input type="hidden" name="productId" value="<?= $product['productId']; ?>">
                        <input type="hidden" name="price" value="<?= $product['price']; ?>">
                        <button class="buy-btn" id="buy-btn">Acheter</button>
                    </form>
                </td>
                <td>
                    <form method="POST" onSubmit = "return confirm('Confirmer suppression ?');">
                        <button class="buy-btn" type="submit">Supprimer</button>
                    </form>
                </td>
            </tr>
        </table>
    <?php endforeach; ?>
    <script src="/boutique2/Js/user/cart.js"></script>
</body>