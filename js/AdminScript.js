// --- Authentication Functions ---
function logout() {
    
    let checklogout = confirm('Are you sure you want to log out?');

    if (checklogout) {
        window.location.href = '../user-validation/index.html';
    }
}

// --- Deletion Functions ---
function deluser() {

    confirm('Delete this user?');
}

function delproduct() {

    confirm('Delete this user?');
}

// --- Product Management Functions ---
function addproduct() {

    alert("product addeed completed");
}

function addedproduct() {

    window.location.href = 'adminProducts.html#Added-product';
}

// --- Navigation Functions ---

function userspage() {
    // Redirect to the User Administration page
    window.location.href = 'adminUsers.html';
}

function orderspage() {
    // Redirect to the Order Administration page
    window.location.href = 'adminOrders.html';
}