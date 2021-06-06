<?php


class Product
{
    private $id;
    private $title;
    private $description;
    private $image;
    private $link;
    private $like;
    private $dislike;

    public function __construct($title, $description, $image, $link, $like = 0, $dislike = 0, $id = null)
    {
        $this->title = $title;
        $this->description = $description;
        $this->image = $image;
        $this->link = $link;
        $this->like = $like;
        $this->dislike = $dislike;
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getLike()
    {
        return $this->like;
    }

    public function setLike($like): void
    {
        $this->like = $like;
    }

    public function getDislike()
    {
        return $this->dislike;
    }

    public function setDislike($dislike): void
    {
        $this->dislike = $dislike;
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