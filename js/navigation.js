// --- Authentication & User Flow ---

function login(event) {
    event.preventDefault();

    const userRadio = document.getElementById("user");
    const adminRadio = document.getElementById("admin");

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

function logout() {

    let checklogout = confirm('Are you sure you want to log out?');
    
    if (checklogout) {
        window.location.href = '../user-validation/index.html';
    }
}

// --- Navigation Buttons ---

function bicyclespage() {
    window.location.href = 'bicycles.html';
}
function repairpage() {
    window.location.href = 'repair.html';
}
function accessoriespage() {
    window.location.href = 'accessories.html';
}
function continueBtn() {
    window.location.href = 'home.html';
}

function checkout() {
    window.location.href = 'checkout.html';
}

function itempage() {
    window.location.href = 'itempage.html';
}

// --- Shopping Actions ---

function buynow() {
    window.location.href = 'checkout.html';
}

function addtocart() {
    window.location.href = 'shopping-cart.html';
}