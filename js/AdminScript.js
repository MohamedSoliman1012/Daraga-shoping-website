// =========================
// AUTHENTICATION FUNCTIONS
// =========================

// Logout function - ask for confirmation and redirect to login page
function logout() {
    let checklogout = confirm('Are you sure you want to log out?');

    if (checklogout) {
        window.location.href = '../user-validation/index.php';
    }
}

// =========================
// DELETION FUNCTIONS
// =========================

// Delete a user - ask for confirmation first
function deluser(userId) {
   if(confirm('Delete this user?')){
    window.location.href = '../BackEnd/admin.php?delete_user_id='+userId;
   }
}

// Delete a product - ask for confirmation first
function delproduct() {
    if(confirm('Delete this product?')){
    alert("item deleted successfully")
   }
}

// =========================
// PRODUCT MANAGEMENT
// =========================

// Validate and add a new product to the inventory
function addproduct() {
    // Get the form input values
    let name=document.getElementById("addname").value;
    let price=document.getElementById("addprice").value;
    let details=document.getElementById("adddetails").value;
    let imageInput=document.getElementById("addimage");

    // Check if all required fields are filled
    if(name.trim() === ""){
        alert("Enter product name")
    }else if(price.trim() === ""){
        alert("Enter product price")
    }else if(details.trim() === ""){
        alert("Enter product details")

    }else if(imageInput.files.length === 0){
        alert("Enter product image")

    }else{
    // All validations passed - tell user and clear the form
    alert("product added completed")

    document.getElementById("addname").value = "";
    document.getElementById("addprice").value = "";
    document.getElementById("adddetails").value = "";
    document.getElementById("addimage").value = "";
    }

}

// Redirect to products page after successfully adding a product
function addedproduct() {
    window.location.href = 'adminProducts.php#Added-product';
}

// =========================
// NAVIGATION FUNCTIONS
// =========================

// Navigate to the user management page
function userspage() {
    // Redirect to the User Administration page
    window.location.href = 'adminUsers.php';
}

// Navigate to the order management page
function orderspage() {
    // Redirect to the Order Administration page
    window.location.href = 'adminOrders.php';
}