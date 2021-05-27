<?php


class Product {
    private $title;
    private $description;
    private $image;
    private $link;


    public function __construct($title, $description, $image, $link)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->link = $link;
    }

    public function getTitle(): string
    {
        return $this->title;
    }


    public function setTitle(string $title)
    {
        $this->title = $title;
    }


    public function getDescription(): string
    {
        return $this->description;
    }


    public function setDescription(string $description)
    {
        $this->description = $description;
    }


    public function getImage(): string
    {
        return $this->image;
    }


    public function setImage(string $image)
    {
        $this->image = $image;
    }


    public function getLink()
    {
        return $this->link;
    }


    public function setLink($link): void
    {
        $this->link = $link;
    }
}