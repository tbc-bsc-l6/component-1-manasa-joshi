<?php


namespace awe;

//creating HtmlProductWriter class that inherits ShopWriter class
class HtmlProductWriter extends ShopProductWriter
{
    //implementing abstract function write from ShopProducWriter
    public function write()
    {   
        //calling functions and displaying them on screen.
        echo $this->htmlHeader();
        echo $this->htmlBody();
        echo '</html>';
    }
    //function  for HTML head
    private function htmlHeader()
    {
        return
            '<!DOCTYPE html>
            <html>
            <head>
                <title>AWE Product List</title>
                <link rel="stylesheet" href="./css/styles.css">
            </head>';
    }

    //function  for HTML body
    private function htmlBody()
    {   
        //creating empty arrays
        $bookproducts = [];
        $cdproducts = [];
        $gameproducts = [];

        //using foreach loop to access products from arrays
        foreach ($this->products as $product) {
         if($product instanceof BookProduct) $bookproducts[] = $product;
         if($product instanceof CdProduct) $cdproducts[] = $product;
         if($product instanceof GameProduct) $gameproducts[] = $product;
        }

        //setting function call to variables
        $booktable = $this->generateBookTable($bookproducts);
        $cdtable = $this->generateCdTable($cdproducts);
        $gametable = $this->generateGameTable($gameproducts);

        $addProduct = $this->generateAddProductForm();


        // calling functions to return tables and form using variables
        return
            '<body>'
            . $booktable .
            '<br />'
            .$cdtable.
            '<br />'
             .$gametable.
            '<br />'
            .$addProduct .
            '</body>';
    }

    //function that returns books table
    private function generateBookTable($bookproducts)
    {
        $contents = '';
        //using foreach loop to access products from bookproducts array and setting it to contents variable
        foreach ($bookproducts as $book) {
            $contents .= '<tr>
                  <td>'.$book->getFullName().'</td>'
                .'<td>'.$book->getTitle().'</td>'
                .'<td>'.$book->getNumberOfPages().'</td>'
                .'<td>'.$book->getPrice().'</td>'
                .'<td>'.'<a href="./index.php?delete='.$book->getId().'">X</a>'.'</td>
                </tr>';
        }
        return
            '
            <h3>BOOKS</h3>
            <table class="paleBlueRows equal-width">
                <thead>
                    <tr>
                        <th>AUTHOR</th>
                        <th>TITLE</th>
                        <th>PAGES</th>
                        <th>PRICE</th>
                        <th>DELETE</th>
                    </tr>
                    </thead>
                    <tbody>'
            .$contents.
                '</tbody>
            </table>';
    }

    //function that returns CDs table
    private function generateCdTable($cdproducts)
    {
        $contents = '';
        //using foreach loop to access products from cdproducts array and setting it to contents variable
        foreach ($cdproducts as $cd) {
            $contents .= '<tr>
                  <td>'.$cd->getFullName().'</td>'
                .'<td>'.$cd->getTitle().'</td>'
                .'<td>'.$cd->getPlayLength().'</td>'
                .'<td>'.$cd->getPrice().'</td>'
                .'<td>'.'<a href="./index.php?delete='.$cd->getId().'">X</a>'.'</td>
                </tr>';
        }
        return
            '
            <h3>CDs</h3>
            <table class="paleBlueRows equal-width">
                 <thead>
                    <tr>                    
                        <th>ARTIST</th>
                        <th>TITLE</th>
                        <th>DURATION</th>
                        <th>PRICE</th>
                        <th>DELETE</th>
                    </tr>
                    </thead>
                    <tbody>'
            .$contents.
            '</tbody>
            </table>';
    }
    //function that returns games table
    private function generateGameTable($gameproducts)
    {
        $contents = '';
        //using foreach loop to access products from gameproducts array and setting it to contents variable
        foreach ($gameproducts as $game) {
            $contents .= '<tr>
                  <td>'.$game->getFullName().'</td>'
                .'<td>'.$game->getTitle().'</td>'
                .'<td>'.$game->getTotalPegi().'</td>'
                .'<td>'.$game->getPrice().'</td>'
                .'<td>'.'<a href="./index.php?delete='.$game->getId().'">X</a>'.'</td>
                </tr>';
        }
        return
            '
            <h3>GAMES</h3>
            <table class="paleBlueRows equal-width">
                <thead>
                    <tr>
                        <th>CONSOLE</th>
                        <th>TITLE</th>
                        <th>PEGI</th>
                        <th>PRICE</th>
                        <th>DELETE</th>
                    </tr>
                    </thead>
                    <tbody>'
            .$contents.
                '</tbody>
            </table>';
    }

    //function to return add product form
    private function generateAddProductForm()
    {
        return '
      
        <form action="./index.php" method="post">
          <fieldset>
            <legend><h2>ADD NEW PRODUCT</h2></legend>
            <label for="producttype">Product Type:</label><br />
            <select id="producttype" name="producttype">
                  <option value="cd">CD</option>
                  <option value="book">Book</option>
                  <option value="game">Game</option>
            </select> 
            <br />
            <br />
            <label for="name"><B>Author / Artist/ Console:</B></label><br />
            <label for="fname">First Name:</label><br />
             <input type="text" id="fname" name="fname">
             <br />
            <label for="sname">Main Name/Surname:</label><br />
             <input type="text" id="sname" name="sname">
             <br />
             <br />
           <label for="title">Title:</label><br />
             <input type="text" id="title" name="title">
             <br />
             <br />
           <label for="pages">Pages/Duration/Pegi:</label><br />
             <input type="text" id="pages" name="pages">
             <br />
             <br />
            <label for="price">Price:</label><br />
             <input type="text" id="price" name="price">
             <br />
             <br /> 
             <input type="submit" value="Submit">
            </fieldset>
        </form> 
        ';
    }
}
?>