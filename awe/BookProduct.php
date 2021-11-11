<?php


namespace awe;

//creating BookProduct class that inherits ShopProduct class
class BookProduct extends ShopProduct
{
	// declaring variable
    private $numPages;

    //constructor function
    public function __construct(
        string $id,
        string $title,
        string $firstName,
        string $mainName,
        float $price,
        int $numPages
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
        $this->numPages = $numPages;
    }

    //function to return number of pages
    public function getNumberOfPages()
    {
        return $this->numPages;
    }
}
?>