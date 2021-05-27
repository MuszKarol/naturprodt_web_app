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

    public function getRecipes(): array
    {
        $result = [];

        $stmt = $this->database->connect()->prepare('
            SELECT * FROM recipes;
        ');

        $stmt->execute();
        $recipes = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($recipes as $recipe){
            $result[] = new Recipe(
                $recipe['title'],
                $recipe['content'],
                $recipe['image_title']
            );
        }

        return $result;
    }

    public function addRecipe(Recipe $recipe): void {
        $stmt = $this->database->connect()->prepare('
            INSERT INTO recipes(title, content, image_title, id_user)
            VALUES (?, ?, ?, ?);
        ');

        //!!!!!!!!!!!
        //https://youtu.be/pJhTeQtdSHE?t=1536
        $user_id = 1;

        $stmt->execute([
            $recipe->getTitle(),
            $recipe->getRecipe(),
            $recipe->getImage(),
            $user_id
        ]);
    }

}