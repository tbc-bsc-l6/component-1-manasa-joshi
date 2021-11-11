<?php


namespace awe;

//creating JsonProductWriter class that inherits ShopProductWriter class
class JsonProductWriter extends ShopProductWriter
{
    //implementing abstract function write from ShopProducWriter
    public function write()
    {
        //creating array and adding value using for each loop
        $json_str = '[';
        foreach ($this->products as $product) {
          $json_str .= $this->addEachProductAsJSON($product).',';
        }
        $json_str = rtrim($json_str, ","); //remove final ',' from outputted json string

        $json_str .= "]";

        //displaying array.
        echo $json_str;
    }

    //function to add product to jason file
    private function addEachProductAsJSON($product){
        $json_product = [];
        $json_product['id'] = $product->getId();
        $json_product['title'] = $product->getTitle();
        $json_product['firstname'] = $product->getFirstName();
        $json_product['mainname'] = $product->getMainName();
        $json_product['price'] = $product->getPrice();

        if($product instanceof BookProduct) {
            $json_product['numpages'] = $product->getNumberOfPages();
            $json_product['type'] = "book";
        }
        if($product instanceof CDProduct) {
            $json_product['playlength'] = $product->getPlayLength();
            $json_product['type'] = "cd";
        }
        if($product instanceof GameProduct) { 
            $json_product['totalPegi'] = $product->getTotalPegi();
            $json_product['type'] = "game";
        }  

        //returning JASON representation of value 
        return json_encode($json_product);
    }
}
?>