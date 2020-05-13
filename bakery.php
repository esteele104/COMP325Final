<?php
    include_once ".\connect.php"
?>
<script src="scripts.js"></script>
<script src="https://kit.fontawesome.com/a076d05399.js"></script>

<!DOCTYPE html>
<html>
    <script>
        console.log(localStorage.getItem("cart"));
    </script>
    <head>
        <title>Group 5's Recipe Shop - Bakery</title>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Permanent+Marker&display=swap" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css.css" />
    </head>
    <body>
        <div id="top">
            <a class="title" href="index.php">Group 5's Recipe Shop</a>
             <a class="icon" href="recipes.php"  style = "position:absolute; left: 900px; top: 20px"><img src="recipes.png" width="30px" height="30px"></a>
            <a class="icon" href="list.html" style = "position:absolute; left: 1000px; top: 20px"><img src="list.png" width="30px" height="30px"></a>      
            <a class="icon" href="cart.html" style = "position:absolute; left: 1100px; top: 20px"><img src="cart.png" width="30px" height="30px"></a>
        </div>
        <div id="cart-num" class = "cart-pos" style = "font-family: 'Open Sans', sans-serif;color:#b31111;font-weight: bold;"></div>
        <script>
            var cart = JSON.parse(localStorage.getItem('cart'));
            var numToDisaply = cart.length;
            document.getElementById("cart-num").innerHTML = numToDisaply;
        </script>
        <div id="search">
            <input id="textbox" type="text" placeholder="Search...">      
        </div>
        <div class="tab">
            <button class="section" onclick="window.location.href ='produce.php'">Produce</button>
            <button class="section" onclick="window.location.href = 'meat.php'">Meat</button>
            <button class="section" onclick="window.location.href = 'dairy.php'">Dairy</button>
            <button class="section active" onclick="window.location.href = 'bakery.php'">Bakery</button>
            <button class="section" onclick="window.location.href = 'beverages.php'">Beverages</button>
            <button class="section" onclick="window.location.href = 'more.php'">More</button>   
        </div>
        <?php
        
        $sql = "SELECT * FROM items where productType = 'Bakery';";

    $result = $conn->query($sql);
    $records = array();


if($result->num_rows > 0){
   //Loop through all our records and add them to our array
    while($r = $result->fetch_assoc())
    {
        echo '<img src=',$r["Image"],' height = "80" width = "80">';
        echo "<a>",$r["Name"]," | Price: $",$r["Price"],"</a>";
        echo '<button class = "btn" onclick="addToCart(',"'",$r["Name"],"'",",",$r["Price"],",","'",$r["Image"],"'",')"><i class="fas fa-plus" style="font-size:15px;"></i> Add to Cart </button>';
        echo "<br>";
    }
}
    $conn->close();
    ?>
        
    </body>
</html>