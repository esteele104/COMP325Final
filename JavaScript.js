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