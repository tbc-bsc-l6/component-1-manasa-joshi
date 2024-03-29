<?php


namespace awe;

//creating CdProduct class that inherits ShopProduct class
class CdProduct extends ShopProduct
{
    // declaring variable
    private $playLength;

    //constructor function
    public function __construct(
        string $id,
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $playLength
    )
    {
        //calling parent constructor
        parent::__construct(
            $id,
            $title,
            $firstName,
            $mainName,
            $price
        );
        $this->playLength = $playLength;
    }

    //function to return duration
    public function getPlayLength()
    {
        return $this->playLength;
    }
}
?>