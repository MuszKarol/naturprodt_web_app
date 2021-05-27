<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/Product.php';
require_once __DIR__.'/../repository/ProductRepository.php';

class ProductController extends AppController {

    const MAX_FILE_SIZE = 1024*1024;
    const SUPPORTED_TYPES = ['image/png', 'image/jpeg'];
    const UPLOAD_DIRECTORY = '/../public/uploads/';

    private $messages = [];
    private  $productRepository;


    public function __construct()
    {
        parent::__construct();
        $this->productRepository = new ProductRepository();
    }

    public function products()
    {
        $this->render('products', ['messages'=> $this->messages,
                                            'products'=> $this->productRepository->getProducts()]);
    }

    public function addProduct() {

        if($this->isPost() && is_uploaded_file($_FILES['file']['tmp_name']) && $this->validate($_FILES['file'])) {

            move_uploaded_file(
                $_FILES['file']['tmp_name'],
                dirname(__DIR__).self::UPLOAD_DIRECTORY.$_FILES['file']['name']
            );


            $product = new Product($_POST['title'], $_POST['description'], $_FILES['file']['name'], $_POST['link']);
            $this->productRepository->addProduct($product);

            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/products");
        }

        $this->render('productForm', ['messages'=> $this->messages]);
    }


    private function validate(array $file): bool {
        if($file['size'] > self::MAX_FILE_SIZE) {
            $this->messages[] = 'File is too large for destination file system.';
            return false;
        }

        if(!isset($file['type']) && !in_array($file['type'], self::SUPPORTED_TYPES)) {
            $this->messages[] = 'File type is not supported!';
            return false;
        }

        return true;
    }


}