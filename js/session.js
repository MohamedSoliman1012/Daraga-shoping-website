// =========================
// SESSION MANAGEMENT
// =========================
// Functions to check user login status and store/retrieve user info

// Check if a user is currently logged in
function isUserLoggedIn() {
    return sessionStorage.getItem('user_id') !== null;
}

// Check if the current user is an admin
function isCurrentUserAdmin() {
    return sessionStorage.getItem('isAdmin') === 'true';
}

// Get the current user's ID from session storage
function getCurrentUserId() {
    return sessionStorage.getItem('user_id');
}

// Get the current user's username from session storage
function getCurrentUsername() {
    return sessionStorage.getItem('username');
}

// Save user info to session storage when they log in
function storeUserSession(userId, username, email, isAdmin = false) {
    sessionStorage.setItem('user_id', userId);
    sessionStorage.setItem('username', username);
    sessionStorage.setItem('email', email);
    sessionStorage.setItem('isAdmin', isAdmin);
}

// Clear all user data from session (used on logout)
function clearUserSession() {
    sessionStorage.clear();
}

// Check if user is logged in, redirect to login if not
function requireLogin() {
    if (!isUserLoggedIn()) {
        alert('Please log in first');
        window.location.href = '../../user-validation/index.html';
    }
}

// Check if user is an admin, redirect if not
function requireAdmin() {
    if (!isCurrentUserAdmin()) {
        alert('Admin access required');
        window.location.href = '../../user-validation/index.html';
    }
}


