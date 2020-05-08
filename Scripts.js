var lcart = [{Name: "test", Price: 12}];
if(localStorage.getItem('cart')== null){
    localStorage.setItem('cart', JSON.stringify(cart)); 
}


function addToCart(name,price){
    var cart = JSON.parse(localStorage.getItem('cart')); 
    var element = {Name:name, Price: price};
    cart.push(element);
    localStorage.setItem('cart', JSON.stringify(cart));
}

function displayCart(){
    var total=0;
    var cart = JSON.parse(localStorage.getItem('cart')); 
    console.log(cart);
    var i;
    for (i = 1; i < cart.length; i++) {
      var str = cart[i].Name;
      var pric = cart[i].Price;
        total+=pric;
      document.write(str+' : $'+pric+'   ');
      //document.write('<button id="mybutton" onclick="removeItem('+str+')"'+'>Remove from cart</button>');
      document.write("<br>");
        
    }
    if(cart.length>1){
        document.write("Total is: $"+total);
    }
}

function removeItem(name){
    var i;
    var indx;
    var cart = JSON.parse(localStorage.getItem('cart')); 
    for (i = 1; i < cart.length; i++) {
        if(name === cart[i].Name){
            indx=i;
            break;
        }
    }
    cart.splice(indx,1);
    console.log(cart);
    localStorage.setItem('cart', JSON.stringify(cart));
}

function clearCart(){
    localStorage.setItem('cart', JSON.stringify(lcart));
    location.reload();
}

