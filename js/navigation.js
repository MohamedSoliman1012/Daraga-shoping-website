// --- Authentication & User Flow ---
function passdontmatch() {
    alert("Passwords do not match");
}

function logout() {
    let checklogout = confirm('Are you sure you want to log out?');
    if (checklogout) {
        // Redirect to your login/index page
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
    } else if (email.trim() === "") {
        alert("Email is required");
    } else if (!emailPattern.test(email)) {
        alert("Please enter a valid email address");
    } else if (password === "") {
        alert("Password is required");
    } else if (password !== confirmPassword) {
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

// UPDATED: Dynamic Item Page Navigation
function itempage(productId) {
    window.location.href = 'itemPage.php?id=' + productId;
}

// --- Shopping Actions ---

function buynow(productId) {
    // Optionally logic to add to cart first
    window.location.href = 'checkout.php';
}

function addtocart(productId) {
    alert("Item " + productId + " added to cart!");
}

// --- Checkout ---

function placeOrder() {
    let name = document.getElementById("checkname").value;
    let email = document.getElementById("checkemail").value;
    let phone = document.getElementById("checkphone").value;
    let address = document.getElementById("checkaddress").value;
    let city = document.getElementById("checkcity").value;

    if (name.trim() === "" || email.trim() === "" || phone.trim() === "" || address.trim() === "" || city.trim() === "") {
        alert("Please fill in all required fields");
    } else {
        alert("Thank you! Your order has been placed successfully");
        // Clear form
        document.getElementById("loginForm").reset(); // If form has this ID
    }
}