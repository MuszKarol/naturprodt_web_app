<?php

require_once 'Repository.php';
require_once __DIR__.'/../models/Recipe.php';

class RecipeRepository extends Repository
{

    public function getRecipe(int $id): ?Recipe
    {
        $stmt = $this->database->connect()->prepare('
            SELECT * FROM public.recipes u
            WHERE id = :id;
        ');

        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $recipe = $stmt->fetch(PDO::FETCH_ASSOC);


        if($recipe == false){
            return null;
        }

        return new Recipe(
            $recipe['title'],
            $recipe['content'],
            $recipe['image_title']
        );
    }

    public function getRecipesByTitleAndDescription(string $searchString): array
    {
        $searchString = '%'.strtolower($searchString).'%';

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM recipes
            WHERE LOWER(title) LIKE :search OR LOWER(content) LIKE :search;
        ');

        $stmt->bindParam(':search', $searchString, PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getRecipes(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM recipes;
        ');

        $stmt->execute();
        $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recipes as $recipe)
        {
            $result[] = new Recipe(
                $recipe['title'],
                $recipe['content'],
                $recipe['image_title']
            );
        }

        return $result;
    }

    public function addRecipe(Recipe $recipe): void
    {
        $pdo = $this->database->connect();
        $stmt = $pdo->prepare('
            INSERT INTO recipes(title, content, image_title, id_user)
            VALUES (?, ?, ?, ?);
        ');

        $pdo->beginTransaction();

        try
        {
            $stmt->execute([
                $recipe->getTitle(),
                $recipe->getRecipe(),
                $recipe->getImage(),
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