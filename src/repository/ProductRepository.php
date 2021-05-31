<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Product.php';

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
            $product['description'],
            $product['image_title'],
            $product['link']
        );
    }

    public function getProductsByTitleAndDescription(string $searchString): array
    {
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM products
            WHERE LOWER(title) LIKE :search OR LOWER(description) LIKE :search;
        ');

        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function getProducts(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM products;
        ');

        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($products as $product){
            $result[] = new Product(
                $product['title'],
                $product['description'],
                $product['image_title'],
                $product['link']
            );
        }

        return $result;
    }

    public function addProduct(Product $product): void
    {
        $pdo = $this->database->connect();
        $stmt = $pdo->prepare('
            INSERT INTO products(title, description, link, image_title, user_id)
            VALUES (?, ?, ?, ?, ?);
        ');

        $pdo->beginTransaction();

        try
        {
            $stmt->execute([
                $product->getTitle(),
                $product->getDescription(),
                $product->getLink(),
                $product->getImage(),
                $this->getIdUser($_SESSION['user']->getEmail())
            ]);

            $pdo->commit();
        }
        catch (Exception $e)
        {
            $pdo->rollBack();
        }
    }

}