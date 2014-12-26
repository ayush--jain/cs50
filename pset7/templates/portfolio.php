<div style="width: 350px; margin: 0 auto;">
    <ul class="nav nav-pills">
        <li><a href="quote.php">Quote</a></li>
        <li><a href="buy.php">Buy</a></li>
        <li><a href="sell.php">Sell</a></li>
        <li><a href="history.php">History</a></li>
        <li><a href="logout.php"><strong>Log Out</strong></a></li>
    </ul>
</div>

<div>
    <table class="table table-striped">

    <thead>
        <tr>
            <th>Name</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
            <th>TOTAL</th>
        </tr>
    </thead>
    
    <?php

        foreach ($positions as $position)
        {
            print("<tr>");
            print("<td style='text-align: left'>{$position["name"]}</td>");
            print("<td style='text-align: left'>{$position["symbol"]}</td>");
            print("<td style='text-align: left'>{$position["shares"]}</td>");
            print("<td style='text-align: left'>\${$position["price"]}</td>");
            print("<td style='text-align: left'>\${$position["total"]}</td>");
            print("</tr>");
        }

    ?>
    
    <tr>
    <th><?= print ("CASH"); ?></th>
   <th> = $<?= print ("$sum_total"); ?></th>
    </tr>
    
    </table>
</div>

<div>
    <a href="reset.php">Reset your password</a>
</div>

<div>
    <a href="logout.php">Log Out</a>
</div>
