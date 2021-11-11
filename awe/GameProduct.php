<?php


namespace awe;

//creating GameProduct class that inherits ShopProduct class
class GameProduct extends ShopProduct
{
    // declaring variable
    private $totalPegi;

    //constructor function
    public function __construct(
        string $id,
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $totalPegi
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
        $this->totalPegi = $totalPegi;
    }

    //function to return Pegi
    public function getTotalPegi()
    {
        return $this->totalPegi;
    }
}
?>