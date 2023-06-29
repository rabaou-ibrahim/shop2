<?php

require_once "./models/User/UserManager.class.php";
require_once "./models/Product/ProductManager.class.php";
require_once "./controllers/UsersController.controller.php";
class CartsController{
    private $cartManager;
    private $userManager;
    private $productManager;
    private $cartItemsManager;

    public function __construct(){
        $this->cartManager = new CartManager;
        $this->cartManager->loadCarts();

        $this->userManager = new UserManager;
        $this->userManager->loadUsers();

        $this->productManager = new ProductManager;
        $this->productManager->loadProducts();

        $this->cartItemsManager = new CartItemsManager;
        $this->cartItemsManager->loadCartItems();
    }

    public function getUserCart() {
        if (!empty($_SESSION['username'])) {
    
            $userCart = $this->cartManager->getCartByUserId($_SESSION['id']);
    
            $cartItems = $this->cartItemsManager->getCartItemsByCartId($userCart->getCartId()); // Assuming you have a method to retrieve cart items by cart_id
            $products = [];
    
            foreach ($cartItems as $cartItem) {
                $product = $this->productManager->getProductById($cartItem->getProductId());
    
                if ($product) {
                    $productData = [
                        'productId' => $product->getId(),
                        'quantity' => $cartItem->getQuantity()
                    ];
    
                    $products[] = $productData;
                }
            }
    
            $responseData2 = [
                'userCart' => $userCart,
                'products' => $products
            ];
    
            header('Content-Type: application/json');
            echo json_encode($responseData2);
            exit();
        }
    }
    public function getUserCartData() {
        if (!empty($_SESSION['username'])) {
            $userCart = $this->cartManager->getCartByUserId($_SESSION['id']);
            $cartItems = $this->cartItemsManager->getCartItemsByCartId($userCart->getCartId());
            $products = [];
    
            foreach ($cartItems as $cartItem) {
                $product = $this->productManager->getProductById($cartItem->getProductId());
    
                if ($product) {
                    $productData = [
                        'productId' => $product->getId(),
                        'name' => $product->getName(),
                        'description' => $product->getDescription(),
                        'image' => $product->getImage(),
                        'price' => $product->getPrice(),
                        'quantity' => $cartItem->getQuantity()
                    ];
    
                    $products[] = $productData;
                }
            }
    
            return [
                'userCart' => $userCart,
                'products' => $products
            ];
        }
    
        return null;
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