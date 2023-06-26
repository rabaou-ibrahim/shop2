<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Utilisateur - Modification</title>
    <link rel="stylesheet" href="http://localhost/boutique2/webfiles/Css/index2.css">
</head>
<body>
<header>
    <button class="header-round-btn"><a href="<?= URL ?>user-products">Produits</a></button>
    <button class="header-btn"><a href="<?= URL ?>user-home">Accueil</a></button>
    <button class="header-btn"><a href="">Déconnexion</a></button>
</header>
<button class="display-return"><a href="<?= URL ?>user-profile">Retour</a></button>
    <h3>Numéro utilisateur <?= $user->getId(); ?></h3>

    <div class="form">

<form enctype="multipart/form-data" method="post" action="<?= URL ?>user-profile/ev">
    <div class="form-group">
        <label for="lastname">Nom (de famille):</label>
        <input type="text" class="form-control" id="lastname" name="lastname" value="<?= $user->getFirstname(); ?>">
    </div>
    <div class="form-group">
        <label for="firstname">Prénom :</label>
        <input type="text" class="form-control" id="firstname" name="firstname" value="<?= $user->getLastname(); ?>">
    </div>
    <div class="form-group">
        <label for="email">Email :</label>
        <input type="text" class="form-control" id="email" name="email" value="<?= $user->getEmail(); ?>">
    </div>
    <div class="form-group">
        <label for="password">Mot de passe :</label>
        <input type="password" class="form-control" id="password" name="password" value="<?= $user->getPassword(); ?>">
    </div>
    <input type="hidden" name="identifier" value="<?= $user->getId(); ?>">
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