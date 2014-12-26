<?php

    //configuration
    require("../includes/config.php");
    
    //if GET request is made
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("quote_form.php", ["title" => "Enter Quote"]);
    }
    
    //else if POST request is made
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $_POST["symbol"] = strtoupper($_POST["symbol"]);
        $stock = lookup($_POST["symbol"]);
        
        //check if symbol is valid
        if ($stock === false)
        {
            apologize("The symbol you entered isn't valid");
        }
        
        //otherwise lookup symbol
        else
        {
             $x = number_format ($stock["price"], 2, ".", ", ");
             render("quote_output.php", ["price" => "$x", "symbol" => "{$_POST["symbol"]}"]);
        }
    }    
    
?>
