
function isUserLoggedIn() {
    return sessionStorage.getItem('user_id') !== null;
}

function isCurrentUserAdmin() {
    return sessionStorage.getItem('isAdmin') === 'true';
}

function getCurrentUserId() {
    return sessionStorage.getItem('user_id');
}


function getCurrentUsername() {
    return sessionStorage.getItem('username');
}


function storeUserSession(userId, username, email, isAdmin = false) {
    sessionStorage.setItem('user_id', userId);
    sessionStorage.setItem('username', username);
    sessionStorage.setItem('email', email);
    sessionStorage.setItem('isAdmin', isAdmin);
}


function clearUserSession() {
    sessionStorage.clear();
}


function requireLogin() {
    if (!isUserLoggedIn()) {
        alert('Please log in first');
        window.location.href = '../../user-validation/index.html';
    }
}


function requireAdmin() {
    if (!isCurrentUserAdmin()) {
        alert('Admin access required');
        window.location.href = '../../user-validation/index.html';
    }
}


