<?php


namespace awe;

//creating ShopProduct class
class ShopProduct
{
    // declaring variables
    private $id;
    private $title;
    private $mainName;
    private $firstName;
    protected $price;

    //constructor function
    public function __construct(
        string $id,
        string $title,
        string $firstName,
        string $mainName,
        float $price
    )
    {
        $this->id = $id;
        $this->title = $title;
        $this->firstName = $firstName;
        $this->mainName = $mainName;
        $this->price = $price;
    }

    //function to return id
    public function getId()
    {
        return $this->id;
    }

    //function to return first name
    public function getFirstName()
    {
        return $this->firstName;
    }

    //function to return surname/mainnamw
    public function getMainName()
    {
        return $this->mainName;
    }

    //function to return title
    public function getTitle()
    {
        return $this->title;
    }

    //function to return price
    public function getPrice()
    {
        return ($this->price);
    }

    //function to return full name
    public function getFullName()
    {
        return $this->firstName . " " . $this->mainName;
    }
}
?>