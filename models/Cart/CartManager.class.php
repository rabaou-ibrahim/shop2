<?php

class CartManager extends Model{
    private $carts;
    private $products;

    public function addCart($cart){
        $this->carts[] = $cart;
    }

    public function getCarts(){
        return $this->carts;
    }

    public function loadCarts(){
        $query = $this->getDb()->prepare("SELECT * FROM utilisateurs");
        $query->execute();
        $myCarts = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();

        foreach($myCarts as $cart){
            $c = new Cart($cart['id_panier'], $cart['id_utilisateur']);
            $this->addCart($c);
        }
    }
    public function getCartbyId($id){
        for($i=0; count($this->carts); $i++){
            if($this->carts[$i]->getId() === $id){
                return $this->carts[$i];
            }
        }
    }
    
}