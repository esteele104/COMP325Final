var lcart = [{Name: "test", Price: 12, img:"url"}];
if(localStorage.getItem('cart')== null){
    localStorage.setItem('cart', JSON.stringify(lcart)); 
}
var allItems = [{Name:"test", Price: 10, img:"url"}];
if(localStorage.getItem('allItems')== null){
    localStorage.setItem('allItems', JSON.stringify(allItems)); 
}

var recipeItems = [{recipeName: '', items: ["items","item2"]}];
if(localStorage.getItem('recipeItems')== null){
    localStorage.setItem('recipeItems', JSON.stringify(recipeItems)); 
}

function addToAllItems(name,price,url ){
    var elementToAdd = {Name:name, Price: price, img:url};
    allItems.push(elementToAdd);
    localStorage.setItem('allItems', JSON.stringify(allItems)); 
}

function addToCart(name,price,url){
    var cart = JSON.parse(localStorage.getItem('cart')); 
    var element = {Name:name, Price: price, img:url};
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
        var pic = cart[i].img;
        total+=pric;
      document.write('<img src='+pic+' height = "80" width = "80">');
        document.write("<a>"+str+' : $'+pric+"</a>");
      document.write('<button onclick="removeItem('+"'"+str+"'"+')"'+'>Remove from cart</button>');
      document.write("<br>");
        
    }
    if(cart.length>1){
        document.write("<a>Total is: $"+total+"</a>");
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
    location.reload();
}

function clearCart(){
    localStorage.setItem('cart', JSON.stringify(lcart));
    location.reload();
}

function addRecipeToCart(recipeName){
    var allRecItems = JSON.parse(localStorage.getItem('recipeItems'));
    var allStock = JSON.parse(localStorage.getItem('allItems'));
    var cart = JSON.parse(localStorage.getItem('cart')); 
    var i;
    var items = [];
    for(i = 1; i<allRecItems.length; i++){
        if(allRecItems[i].recipeName == recipeName){
            items = allRecItems[i].items;
            break;
        }
    }
    console.log(allStock);
    var j, h;
    for(j=1; j<items.length; j++){
        for(h=1; h< allStock.length; h++){
            if(items[j] == allStock[h].Name){
                addToCart(items[j],allStock[h].Price,allStock[h].img);
            }
        }
        
    }
    console.log(JSON.parse(localStorage.getItem('cart'))); 
}

var checkoutButton = document.getElementById("checkoutButton");
var submit = document.getElementById("submit");

checkoutButton.onclick = function(){
    document.querySelector('.checkoutPopup').style.display = 'flex';
}

document.querySelector('.close').addEventListener('click', function(){
    document.querySelector('.checkoutPopup').style.display = 'none';
})

document.getElementById(form).onsumbit = function(){
    document.querySelector('.checkoutPopup').style.display = 'none';
}

