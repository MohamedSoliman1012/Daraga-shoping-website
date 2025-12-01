// --- Authentication & User Flow ---

function login() {

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





function Signup() {

    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;


    if (username.trim() === "") {
        alert("Username is required.");
    } 
    
    else if (email.trim() === "") {
        alert("Email is required");
    }

    else if (password === "") {
        alert("Password is required");
    }

    else if (password !== confirmPassword) {
        alert("Passwords do not match");
    } else {

        alert("Sign Up Successfully");
        window.location.href = '../user-panel/home.html';
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


// check out 

function placeOrder() {

    let name = document.getElementById("checkname").value;
    let email = document.getElementById("checkemail").value;
    let phone = document.getElementById("checkphone").value;
    let address = document.getElementById("checkaddress").value;
    let city = document.getElementById("checkcity").value;



    if (name.trim() === "") {
        alert("Please enter your Full Name");
    } else if (email.trim() === "") {
        alert("Please enter your Email");
    }  else if (phone.trim() === "") {
        alert("Please enter your Phone Number");
    } else if (address.trim() === "") {
        alert("Please enter your Address");
    } else if (city.trim() === "") {
        alert("Please enter your City");
    } else {
        alert("Thank you! Your order has been placed successfully");

        document.getElementById("checkname").value = "";
        document.getElementById("checkemail").value = "";
        document.getElementById("checkphone").value = "";
        document.getElementById("checkaddress").value = "";
        document.getElementById("checkcity").value = "";
 
    }
}