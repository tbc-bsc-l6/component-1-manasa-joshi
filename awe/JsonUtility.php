<?php


namespace awe;


class JsonUtility
{
    //stactic function read products from Jason file and return them in arrays.
    public static function makeProductArray(string $file) {
        // read contents of file in string
        $string = file_get_contents($file);

        //decodes JASONstring to php variable
        $productsJson = json_decode($string, true);

        $products = [];
        //using foreach loop to get value from array
        foreach ($productsJson as $product) {

            //using switch case to add product to specific variale
            switch($product['type']) {
                case "cd":
                    //creating new object of CdProduct class 
                    $cdproduct = new \awe\CdProduct($product['id'],$product['title'], $product['firstname'],
                        $product['mainname'],$product['price'], $product['playlength']);
                    //adding new product to array
                    $products[] = $cdproduct;
                break;

                case "book":
                    //creating new object of BookProduct class
                    $bookproduct = new \awe\BookProduct($product['id'],$product['title'], $product['firstname'],
                        $product['mainname'],$product['price'], $product['numpages']);
                    
                    //adding new product to array
                    $products[]=$bookproduct;
                break;

                case "game":
                    //creating new object of GameProduct class
                    $gameproduct = new \awe\GameProduct($product['id'],$product['title'], $product['firstname'],
                        $product['mainname'],$product['price'], $product['totalPegi']);
                    //adding new product to array
                    $products[] = $gameproduct;
                break;
            }
        }
        return $products;
    }

    //function to delete product from JASON file 
    public static function deleteProductWithId(string $file, int $id) {
        // reads contents of file in string
        $string = file_get_contents($file);

        //decodes JASON string to php variable
        $productsJson = json_decode($string, true);

        $products = [];
        //using for each loop to store product from jason file to array except the product with passed id 
        foreach ($productsJson as $product) {
            if($product['id'] != $id) {
                $products[] = $product;
            }
        }

        //returning JASON representation of value 
        $json = json_encode($products);

        //writes data to file
        file_put_contents($file, $json);
    }

    //static function to add new product in jason file
    public static function addNewProduct(string $file, string $producttype, string $fname, string $sname, string $title, int $pages, float $price)
    {   
        // reads contents of file in string
        $string = file_get_contents($file);

        //decodes JASON string to php variable
        $productsJson = json_decode($string, true);

        $ids = [];
        //using for each loop to get all the ids
        foreach ($productsJson as $product) {
             $ids[] = $product['id'];
        }

        //assigns new keys
        rsort($ids);
        //sets new id
        $newId = $ids[0] + 1;

        $products = [];

        //using for each loop to store product from jason file to array
        foreach ($productsJson as $product) {
            $products[] = $product;
        }

        //creating array with new products
        $newProduct = [];
        $newProduct['id'] = $newId;
        $newProduct['type'] = $producttype;
        $newProduct['title'] = $title;
        $newProduct['firstname'] = $fname;
        $newProduct['mainname'] = $sname;
        $newProduct['price'] = $price;

        if($producttype=='cd') $newProduct['playlength'] = $pages;
        if($producttype=='book') $newProduct['numpages'] = $pages;
        if($producttype=='game') $newProduct['totalPegi'] = $pages;


        $products[] = $newProduct;

        //returning JASON representation of value 
        $json = json_encode($products);

        //writes data to file
        file_put_contents($file, $json);
    }
}
?>