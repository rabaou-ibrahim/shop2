<?php

class CartItemsManager {
    private $cart_id;
    private $username_id;

    public function __construct($cart_id, $username_id){
        $this->cart_id = $cart_id;
        $this->username_id = $username_id;
    }

    public function addToCart($product_id){
        $query = "INSERT INTO items_panier (item_panier_id, panier_id, produit_id, quantité) values (:, :prenom, :pseudo, :email, :password)";
        $passwordhash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->getDb()->prepare($query); 
        $stmt->bindValue(":nom", $lastname, PDO::PARAM_STR);
        $stmt->bindValue(":prenom", $firstname, PDO::PARAM_STR);
        $stmt->bindValue(":pseudo", $cartname, PDO::PARAM_STR);
        $stmt->bindValue(":email", $email, PDO::PARAM_STR);
        $stmt->bindValue(":password", $passwordhash, PDO::PARAM_STR);
        $result = $stmt->execute();

        if ($result > 0){
            $cart = new Cart($this->getDb()->lastInsertId(), $lastname, $firstname, $cartname, $email, $passwordhash);
            $this->addCart($cart);
        }
    }

}