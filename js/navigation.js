// --- Authentication & User Flow ---

function login() {

    const userRadio = document.getElementById("user");
    const adminRadio = document.getElementById("admin");
    var password = document.getElementById("logpassword").value;
    var email = document.getElementById("logemail").value;
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


    if (email === "" || password === "") {
        alert("Please enter both email and password!");
    }

    else if (!emailPattern.test(email)) {
        alert("Please enter a valid email address (e.g., user@example.com)");
    }
    else if (userRadio.checked) {
        window.location.href = '../user-panel/home.php';
    }
    else if (adminRadio.checked) {
        window.location.href = '../admin-panel/adminHome.php';
    }
    else {
        alert("Please select a login type!");
    }
}

function logout() {

    let checklogout = confirm('Are you sure you want to log out?');

    if (checklogout) {
        window.location.href = '../user-validation/index.php';
    }
}





function Signup() {

    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;


    if (username.trim() === "") {
        alert("Username is required.");
    }

    else if (email.trim() === "") {
        alert("Email is required");
    }

     else if (!emailPattern.test(email)) {
        alert("Please enter a valid email address (e.g., user@example.com)");
    }
    
    else if (password === "") {
        alert("Password is required");
    }

    else if (password !== confirmPassword) {
        alert("Passwords do not match");
    } else {

        alert("Sign Up Successfully!");
        window.location.href = '../user-panel/home.php';
    }

}

// --- Navigation Buttons ---

function bicyclespage() {
    window.location.href = 'bicycles.php';
}
function repairpage() {
    window.location.href = 'repair.php';
}
function accessoriespage() {
    window.location.href = 'accessories.php';
}
function continueBtn() {
    window.location.href = 'home.php';
}

function checkout() {
    window.location.href = 'checkout.php';
}

function itempage() {
    window.location.href = 'itempage.php';
}

// --- Shopping Actions ---

function buynow() {
    window.location.href = 'checkout.php';
}

function addtocart() {
    alert("Item added to cart!");
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
    } else if (phone.trim() === "") {
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