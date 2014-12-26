<?php

    require("../includes/config.php");  
    
    //if GET request is made
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("buy_form.php", ["title" => "Buy"]);
    }
    
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $_POST["symbol"] = strtoupper($_POST["symbol"]);
        $stock = lookup($_POST["symbol"]);
        
        $cash = query("SELECT cash FROM users WHERE id = ?", $_SESSION["id"]);
        $update = $_POST["shares"] * $stock["price"];
        
        if($stock === false)
        {
            apologize("Symbol not found");
        }
        
        else if(preg_match("/^\d+$/", $_POST["shares"]) === false)
        {
            apologize("Invalid shares!");
        }
        
        else if($update > $cash["0"]["cash"])
        {
            apologize("You do not have sufficient funds");
        }
        
        else
        {
            query("INSERT INTO portfolio (id, symbol, shares) VALUES(?, ?, ?) ON DUPLICATE KEY UPDATE shares = shares + VALUES(shares)", $_SESSION["id"], $_POST["symbol"], $_POST["shares"] );
            query("UPDATE users SET cash = cash - ? WHERE id = ?", $update, $_SESSION["id"]);
            //update history
            query("INSERT INTO history (transaction, symbol, shares, price) VALUES('BUY', ?, ?, ?)", $_POST["symbol"], $_POST["shares"], $stock["price"]);
            redirect("index.php");
        }
    }

?>
