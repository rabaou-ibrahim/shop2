<?php

class CartsItemsController{
    private $cartItemsManager;

    public function __construct(){
        $this->cartItemsManager = new CartItemsManager;
        $this->cartItemsManager->loadCartItems();
    }
}