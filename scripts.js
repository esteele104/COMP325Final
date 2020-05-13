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
    location.reload();
}
var searchStr = "";
function setSearchStr(){
    searchStr =document.getElementById('textbox').value;
    localStorage.setItem('str',searchStr);
}

function displaySearchItems() { 
    searchStr = localStorage.getItem('str');
    var items = JSON.parse(localStorage.getItem('allItems')); 
    searchStr = searchStr.toLowerCase();
    console.log(searchStr);
    document.write('<div class ="row">');
    for (i = 0; i < items.length; i++) {
        var itemStr = items[i].Name.toLowerCase();
        if(itemStr.includes(searchStr)){
            document.write('<div class ="column">');
            document.write('<img src='+'"'+items[i].img+'"'+' height = "120" width = "120">');
            document.write("<br>");
            document.write('<a>'+''+items[i].Name+' | Price: $'+''+items[i].Price+'');
            document.write("<br>");
            document.write('<button class = "btn" onclick="addToCart('+"'"+items[i].Name+"'"+","+"'"+items[i].Price+"'"+","+"'"+items[i].img+"'"+')"><i class="fas fa-plus" style="font-size:15px;"></i> Add to Cart </button>');
            document.write('</div>');
            document.write("<br>");
           
        }
    }
    document.write('</div>');
}

function displayCart(){
    var total=0;
    var cart = JSON.parse(localStorage.getItem('cart')); 
    console.log(cart);
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
      document.write('<button class = "cartBtn" onclick="removeItem('+"'"+str+"'"+')"'+'>Remove from cart</button>');
      document.write("<br>");
        document.write('</div>');
        
    }
    document.write('</div>');
    if(cart.length>1){
        document.write("<br>");
        document.write("<a>Total is: $"+total+"</a>");
    }
    document.write("<br>");
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



