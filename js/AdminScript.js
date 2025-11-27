window.onload = function() {
    var adminLogoutLink = document.getElementById('adminLogoutLink');

    if (adminLogoutLink) {
        adminLogoutLink.onclick = function(e) {
            e.preventDefault();

            var confirmLogout = confirm('Are you sure you want to log out?');

            if (confirmLogout) {
                window.location.href = '../index.html';
            }
        };
    }
};