<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/User.php';

class ProductRepository extends Repository
{

    public function getProduct(int $id): ?Product
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.products u
            WHERE id = :id;
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $product = $stmt->fetch(PDO::FETCH_ASSOC);


        if($product == false){
            return null;
        }

        return new Product(
            $product['title'],
            $product['$description'],
            $product['image_title'],
            $product['link']
        );
    }

    public function addProject(Product $product): void {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO products(title, description, link, image_title, user_id)
            VALUES (?, ?, ?, ?, ?);
        ');

        //!!!!!!!!!!!
        //https://youtu.be/pJhTeQtdSHE?t=1536
        $user_id = 1;

        $stmt->execute([
            $product->getTitle(),
            $product->getDescription(),
            $product->getLink(),
            $product->getImage(),
            $user_id
        ]);
    }

}