// =========================
// AUTHENTICATION & USER FLOW
// =========================

// Alert if user passwords don't match during signup
function passdontmatch() {
    alert("Passwords do not match");
}

// Logout function - ask for confirmation and redirect to login
function logout() {
    let checklogout = confirm('Are you sure you want to log out?');
    if (checklogout) {
        // Redirect to login page
        window.location.href = '../user-validation/index.php';
    }
}

// Validate and process user signup
function Signup() {
    // Get form input values
    const username = document.getElementById("username").value;
    const email = document.getElementById("email").value;
    const password = document.getElementById("password").value;
    const confirmPassword = document.getElementById("confirmPassword").value;
    // Email regex pattern for validation
    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    // Validate each field
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
        // All validations passed!
        alert("Sign Up Successfully!");
        window.location.href = '../user-panel/home.php';
    }
}

// =========================
// NAVIGATION BUTTONS
// =========================

// Navigate to bicycles/bikes category page
function bicyclespage() {
    window.location.href = 'bicycles.php';
}

// Navigate to repair tools page
function repairpage() {
    window.location.href = 'repair.php';
}

// Navigate to accessories page
function accessoriespage() {
    window.location.href = 'accessories.php';
}

// Go back to home page
function continueBtn() {
    window.location.href = 'home.php';
}

// Navigate to checkout page
function checkout() {
    window.location.href = 'checkout.php';
}

// Go to a specific product's detail page
function itempage(productId) {
    window.location.href = 'itemPage.php?id=' + productId;
}

// =========================
// SHOPPING ACTIONS
// =========================

// Redirect to checkout when user clicks 'buy now'
function buynow(productId) {
    // Takes you straight to checkout for the product
    window.location.href = 'checkout.php';
}

// Add an item to the shopping cart
function addtocart(productId) {
    alert("Item " + productId + " added to cart!");
}

// =========================
// CHECKOUT & ORDER
// =========================

// Validate checkout form and place the order
function placeOrder() {
    // Get all the shipping info from the form
    let name = document.getElementById("checkname").value;
    let email = document.getElementById("checkemail").value;
    let phone = document.getElementById("checkphone").value;
    let address = document.getElementById("checkaddress").value;
    let city = document.getElementById("checkcity").value;

    // Make sure all fields are filled out
    if (name.trim() === "" || email.trim() === "" || phone.trim() === "" || address.trim() === "" || city.trim() === "") {
        alert("Please fill in all required fields");
    } else {
        // Order placed successfully!
        alert("Thank you! Your order has been placed successfully");
        // Clear the form
        document.getElementById("loginForm").reset();
    }
}