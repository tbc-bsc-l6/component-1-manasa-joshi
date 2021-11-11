<?php
namespace awe;
//declaring an abstract class called ShopProductWriter.

abstract class ShopProductWriter
{
	//creating an empty array products with protected access modifier
    protected $products = [];
    
    //creating function to add object in ShopProduct 
    public function addProduct(ShopProduct $shopProduct)
    {	
    	//using this pseudo-variable to update products array.
        $this->products[] = $shopProduct;
    }

    //creating function to set product in shop
    public function setProducts($products){
    	//using this pseudo-variable to update value of products.
        $this->products=$products;
    }

    //declaring abstract function write.
    abstract public function write();

}
?>