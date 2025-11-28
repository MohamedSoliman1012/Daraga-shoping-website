
window.onload = function() {
    // Login Button
    var loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var adminRadio = loginForm.querySelector('input[type="radio"][value="admin"]');
            if (adminRadio && adminRadio.checked) {
                window.location.href = '../admin-panel/adminHome.html';
            } else {  
                window.location.href = '../user-panel/home.html';
            }
        });
    }
};

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
    alert("Coming soon")
}
function addtocart(){
    alert("Coming soon")
}
