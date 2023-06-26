<?php

class CartsController{
    private $cartManager;

    public function __construct(){
        $this->cartManager = new CartManager;
        $this->cartManager->loadCarts();
    }

    public function addtoCartValidation(){
        // $file = $_FILES['image'];
        // $directory = 'webfiles/img/shop/';
        // $imageName = $this->addImage($file, $directory);
        // $this->cartManager->addtoCartDb($imageName, $_POST['name'], $_POST['description'], $_POST['price']);
        
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Produit ajouté",
        ];
        
        header('Location: '.URL.'user/p');
    }
}