<?php

require_once "./models/Product/ProductManager.class.php";

class ProductsController{
    private $productManager;

    public function __construct(){
        $this->productManager = new ProductManager;
        $this->productManager->loadProducts();
    }

    public function displayProducts(){
        $products = $this->productManager->getProducts();
        require "views/admin/products.view.php";
    }

    public function displayProduct($id){
       $product = $this->productManager->getProductById($id);
        require "views/admin/displayProduct.view.php";
    }

    public function addProduct(){
        require "views/admin/addProduct.view.php";
    }
    public function addProductValidation(){
        $file = $_FILES['image'];
        $directory = 'webfiles/img/shop/';
        $imageName = $this->addImage($file, $directory);
        $this->productManager->addProductDb($imageName, $_POST['name'], $_POST['description'], $_POST['price']);
        
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Produit ajouté",
        ];
        
        header('Location: '.URL.'admin');
    }
    private function addImage($file, $dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Indiquez une image");
    
        if(!file_exists($dir)) mkdir($dir, 0777);

        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];

        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file["tmp_name"], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }
    public function getRandomImage(){
        $products = $this->productManager->getProducts();

        if (!empty($products)) {
            $randomProduct = $products[array_rand($products)];
            $randomImage = $randomProduct->getImage();

            echo '<img src="../webfiles/img/shop/' . $randomImage . '" width="100px" height="100px">';
        } else {
            echo 'Pas de produits en stock.';
        }
    }

    public function editProduct($id){
        $product = $this->productManager->getProductbyId($id);
        require "views/admin/editProduct.view.php";
    }
    public function editProductValidation(){
        $currentImage = $this->productManager->getProductById($_POST["identifier"])->getImage();
        $file = $_FILES['image'];

        if ($file > 0){
            unlink("webfiles/img/shop/".$currentImage);
            $directory = "webfiles/img/shop/";
            $imageToAddName = $this->addImage($file, $directory);
        } else {
            $imageToAddName = $currentImage;
        }
        $this->productManager->editProductDb($_POST["identifier"], $imageToAddName, $_POST["name"], $_POST["description"], $_POST["price"]);
        
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Produit modifié",
        ];

        header('Location: '.URL.'admin');
    }

    public function deleteProduct($id){
        $imageName = $this->productManager->getProductbyId($id)->getImage();
        unlink("webfiles/img/shop/".$imageName);
        $this->productManager->deleteProductDb($id);
        
        $_SESSION['alert'] = [
            "type" => "success",
            "msg" => "Produit supprimé",
        ];
        
        header('Location: '.URL.'admin');
    }
}