// --- Authentication Functions ---
function logout() {
    let checklogout = confirm('Are you sure you want to log out?');

    if (checklogout) {
        // Use server-side logout so session is properly cleared
        window.location.href = '../BackEnd/logout.php';
    }
}
// Page-specific deletion and product helper functions are defined
// inside individual admin pages where they're used (e.g. adminUsers.php,
// adminProducts.php). Removed duplicated helpers from this central file.

function addedproduct() {
    window.location.href = 'adminProducts.php#Added-product';
}

// --- Navigation Functions ---

function userspage() {
    // Redirect to the User Administration page
    window.location.href = 'adminUsers.php';
}

function orderspage() {
    // Redirect to the Order Administration page
    window.location.href = 'adminOrders.php';
}