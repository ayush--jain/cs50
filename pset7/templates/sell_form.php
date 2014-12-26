<form action="sell.php" method="post">
    <fieldset>
        <div class="form-group">
            <select class="form-control" name="symbol">
                <option value=""></option>
                <?php 
                    foreach ($rows as $row)
                    { 
                    print("<option value='{$row["symbol"]}'>{$row["symbol"]}</option>\n");                    
                    } 
                 ?>
            </select>        
        </div>
        
        <div class="form-group">
            <button type="submit" class="btn btn-default">Sell</button>
        </div>
    </fielset>
</form>
