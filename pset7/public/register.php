<?php

    // configuration
    require("../includes/config.php");

    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render("register_form.php", ["title" => "Register"]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // TODO
        //error if username/password is empty, or passwords do not match
        if(empty($_POST["username"]))
        {
            apologize("Username is a required field");
        }
        
        else if (empty($_POST["password"]))
        {
            apologize("Password is a required field");
        }
        
        else if ($_POST["password"] != $_POST["confirmation"])
        {
            apologize("Passwords do not match");
        }
        
        //add user to DB and give em $10, 000
        else
        {
            $result = query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"]));
            
            //check if username is already in use or not by checking value of INSERT
            if ($result === false)
            {
                apologize("Username already exists");
            }
            
            else
            {
                $rows = query("SELECT LAST_INSERT_ID() AS id");
                $id = $rows[0]["id"];
                print("Registration successful");
                $_SESSION ["id"] = $id;
                redirect("index.php");
            }
        }
    }

?>
