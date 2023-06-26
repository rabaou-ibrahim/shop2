<?php
    require_once "./models/Product/ProductManager.class.php";
    $productManager = new ProductManager;
    $productManager->loadProducts();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="http://localhost/boutique2/webfiles/Css/index3.css">
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
    <div class="container">

        <section>
            <div class="items">
                <h3 class="items-number-shirt">T-shirts <?= $productManager->loadOccurences("T-shirt"); ?> </h3>
                <h3 class="items-number-jean">Jeans <?= $productManager->loadOccurences("Jean"); ?> </h3>
                <h3 class="items-number-veste">Vestes <?= $productManager->loadOccurences("Veste"); ?> </h3>
            </div>
            <div class="bar">
                <p>Data Set</p>
                <input type="text" placeholder="Recherche...">
            </div>
            <?php 
            $products = $productManager->getProducts();
            for($i=0; $i < count($products); $i++) : ?>
            <table class="table">
                <tr class="table-content">
                    <div class="table-content-text">
                    <td><img src = 'http://localhost/boutique2/webfiles/img/shop/<?= $products[$i]->getImage() ?>' width="80px"></td>
                    <td><?= $products[$i]->getName() ?></td>
                    <td><?= $products[$i]->getPrice() ?>€</td>
                    </div>
                    <div class="table-options">
                        <td><a href="<?= URL ?>user/v/<?= $products[$i]->getId() ?>"><button class="view-btn">Détails</button></td></a>
                    </div>
                </tr>
                <?php endfor; ?>
            </table>
            <!-- <div class="pagination">
                <a href="#">&laquo;</a>
                <a href="" class="active">1</a>
                <a href="">2</a>
                <a href="#">&raquo;</a>
            </div> -->
        </section>
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