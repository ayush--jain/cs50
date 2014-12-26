<?php
    
    require("../includes/config.php");    
    
    //if GET request is made
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        $rows = query("SELECT symbol FROM portfolio WHERE id = ?", $_SESSION["id"]);
        // else render form
        render("sell_form.php", ["title" => "Sell", "rows" => $rows]);
    }
    
     else if ($_SERVER["REQUEST_METHOD"] == "POST")
     {
        
        if (empty($_POST["symbol"]))
        {
            apologize("Please choose an option");
        }
        
        else
        {
            //lookup stock
            $stock = lookup($_POST["symbol"]);
            
            //lookup value of shares from table
            $shares = query("SELECT shares FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
            
                //update users table
            $update = $stock["price"] * $shares[0]["shares"];
            query("UPDATE users SET cash = cash + ? WHERE id = ?", $update, $_SESSION["id"]);
            
            //delete from portfolio table
            query("DELETE FROM portfolio WHERE id = ? AND symbol = ?", $_SESSION["id"], $_POST["symbol"]);
            
            //update history
            query("INSERT INTO history (transaction, symbol, shares, price) VALUES('SELL', ?, ?, ?)", $_POST["symbol"], $shares[0]["shares"], $stock["price"]);
            
            redirect("index.php");
        }
     }
    
?>
