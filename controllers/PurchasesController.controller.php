<?php

require_once "./models/Purchase/PurchaseManager.class.php";
class PurchasesController{
    private $purchaseManager;
    public function __construct(){
        $this->purchaseManager = new PurchaseManager;
        $this->purchaseManager->loadPurchases();
    }
    public function displayProducts(){
        $purchases = $this->purchaseManager->getPurchases();
        require "views/admin/purchaseUser.view.php";
    }
    public function loadNbPurchases($id){
        
    }
}