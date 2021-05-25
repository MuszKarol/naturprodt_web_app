<?php


class Recipe {
    private $title;
    private $recipe;
    private $image;


    public function __construct($title, $recipe, $image)
    {
        $this->title = $title;
        $this->recipe = $recipe;
        $this->image = $image;
    }


    public function getTitle(): string
    {
        return $this->title;
    }


    public function setTitle(string $title)
    {
        $this->title = $title;
    }


    public function getRecipe(): string
    {
        return $this->recipe;
    }


    public function setRecipe(string $recipe)
    {
        $this->recipe = $recipe;
    }


    public function getImage(): string
    {
        return $this->image;
    }


    public function setImage(string $image)
    {
        $this->image = $image;
    }
}