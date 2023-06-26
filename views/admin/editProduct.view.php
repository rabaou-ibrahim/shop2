<?php  
    if (!$_SESSION['admin-username']){
        header('location: views/admin/warningAdmin.view.php');    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produit - Modification</title>
    <link rel="stylesheet" href="http://localhost/boutique2/webfiles/Css/index2.css">
</head>
<body>
<header>
    <button class="header-round-btn"><a href="<?= URL ?>admin">TECHNO</a></button>
    <button class="header-btn"><a href="">Inscription</a></button>
    <button class="header-btn"><a href="">Connexion</a></button>
    <button class="header-btn"><a href="<?= URL ?>admin">Accueil</a></button>
</header>
<button class="display-return"><a href="<?= URL ?>admin">Retour</a></button>
    <h3>Modification du produit numéro <?= $product->getId(); ?></h3>

    <div class="form">

<form enctype="multipart/form-data" method="post" action="<?= URL ?>admin/ev">
    <div class="form-group">
        <label for="name">Nom :</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $product->getName(); ?>">
    </div>
    <div class="form-group">
        <label for="description">Description :</label>
        <input type="text" class="form-control" id="description" name="description" value="<?= $product->getDescription(); ?>">
    </div>
    <div class="form-group">
        <label for="price">Prix :</label>
        <input type="number" class="form-control" id="price" name="price" value="<?= $product->getPrice(); ?>">
    </div>
    <div class="form-group">
        <img class="img-field" src="<?= URL ?>webfiles/img/shop/<?= $product->getImage(); ?>" width="100px" height="100px">
        <label for="image" class="label-image">Changer l'image :</label>
        <input type="file" class="form-control-file" id="image" name="image">
    </div>
    <input type="hidden" name="identifier" value="<?= $product->getId(); ?>">
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

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