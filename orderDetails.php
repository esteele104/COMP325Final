<?php
    include_once ".\connect.php"
?>
<script src="scripts.js"></script>
<!DOCTYPE html>
<html>
    <head>
        <title>Group 5's Recipe Shop - Grocery List</title>
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
        <h1><center>Order Details: </center></h1>
        <script>
            var userInfo = JSON.parse(localStorage.getItem('userInfo'));
            console.log(userInfo);
            var total=0;
            var cart = JSON.parse(localStorage.getItem('orderedItems')); 
            var i;
            document.write('<div class ="row">');
            for (i = 1; i < cart.length; i++) {
              var str = cart[i].Name;
              var pric = cart[i].Price;
                var pic = cart[i].img;
                total+=pric;
                document.write('<div class ="column">');
              document.write('<img src='+pic+' height = "80" width = "80">');
                document.write("<br>");
                document.write("<a>"+str+' : $'+pric+"</a>");
                document.write("<br>");
              document.write("<br>");
                document.write('</div>');

            }
            document.write('</div>');
            if(cart.length>1){
                document.write("<br>");
                document.write("<a><b>Total is: $"+total+"</b></a>");
            }
            document.write("<br>");
            document.write("<br>");
            document.write("<br>");
            document.write('<a> Confirmation will be sent to: '+userInfo.Email+'</a>');
            localStorage.setItem('userInfo','');
    
        </script>
    </body>
</html>