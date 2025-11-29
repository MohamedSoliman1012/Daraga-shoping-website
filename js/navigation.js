function login(event) {
    event.preventDefault();

    var userRadio = document.getElementById("user");
    var adminRadio = document.getElementById("admin");

    if (userRadio.checked) {
               window.location.href = '../user-panel/home.html';

    } 
    else if (adminRadio.checked) {
        window.location.href = '../admin-panel/adminHome.html';
    } 
    else {
    
        alert("Please select a login type!");
    }
}




function logout(){
            checklogout = confirm('Are you sure you want to log out?');
             if (checklogout) {
                window.location.href = '../user-validation/index.html';
            }
}

function continueBtn(){
    window.location.href = '../user-panel/home.html';

}
function checkout(){
    window.location.href = '../user-panel/checkout.html';

}


function buynow(){
    window.location.href = 'checkout.html';
}
function addtocart(){
    window.location.href = 'shopping-cart.html';
}
