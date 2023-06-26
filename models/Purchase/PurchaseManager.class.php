<?php

class PurchaseManager extends Model{
    private $purchases;

    public function addPurchase($purchase){
        $this->purchases[] = $purchase;
    }

    public function getPurchases(){
        return $this->purchases;
    }

    public function loadPurchases(){
        $query = $this->getDb()->prepare("SELECT * FROM achats");
        $query->execute();
        $myProducts = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();

        foreach($myProducts as $product){
            $p = new Product($product['id'],  $product['image'], $product['nom'], $product['description'], $product['prix']);
            $this->addPurchase($p);
        }
    }
    public function loadNbPurchases($value){
       $query = "SELECT COUNT(*) AS count FROM achats WHERE purchase_id = :value";
       $stmt = $this->getDb()->prepare($query);
       $stmt->bindValue(':value', $value, PDO::PARAM_STR);
       $stmt->execute();

       $result = $stmt->fetch(PDO::FETCH_ASSOC);
       $count = $result['count'];
       return $count;
    }
}