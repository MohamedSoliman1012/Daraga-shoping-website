// --- Authentication Functions ---
function logout() {
    
    let checklogout = confirm('Are you sure you want to log out?');

    if (checklogout) {
        window.location.href = '../user-validation/index.php';
    }
}

// --- Deletion Functions ---
function deluser(userId) {
   if(confirm('Delete this user?')){
    window.location.href = '../BackEnd/admin.php?delete_user_id='+userId;
   }
}

function delproduct() {
    if(confirm('Delete this product?')){
    alert("item deleted successfully")
   }
}

// --- Product Management Functions ---

function addproduct() {
    let name=document.getElementById("addname").value;
    let price=document.getElementById("addprice").value;
    let details=document.getElementById("adddetails").value;
    let imageInput=document.getElementById("addimage");

    if(name.trim() === ""){
        alert("Enter product name")
    }else if(price.trim() === ""){
        alert("Enter product price")
    }else if(details.trim() === ""){
        alert("Enter product details")

    }else if(imageInput.files.length === 0){
        alert("Enter product image")

    }else{
    alert("product addeed completed")

    document.getElementById("addname").value = "";
    document.getElementById("addprice").value = "";
    document.getElementById("adddetails").value = "";
    document.getElementById("addimage").value = "";
    }

}

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