<div>
    <table class="table table-striped">

    <thead>
        <tr>
            <th>Transaction</th>
            <th>Date/Time</th>
            <th>Symbol</th>
            <th>Shares</th>
            <th>Price</th>
        </tr>
    </thead>
    
    <?php

        foreach ($positions as $position)
        {
            print("<tr>");
            print("<td style='text-align: left'>{$position["transaction"]}</td>");
            print("<td style='text-align: left'>{$position["datetime"]}</td>");
            print("<td style='text-align: left'>{$position["symbol"]}</td>");
            print("<td style='text-align: left'>{$position["shares"]}</td>");
            print("<td style='text-align: left'>\${$position["price"]}</td>");
            print("</tr>");
        }

    ?>
    
    </table>
</div>
