// --- Authentication & User Flow ---
function logout() {
    let checklogout = confirm('Are you sure you want to log out?');
    if (checklogout) {
        // Call server-side logout to destroy session, then redirect
        window.location.href = '../BackEnd/logout.php';
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