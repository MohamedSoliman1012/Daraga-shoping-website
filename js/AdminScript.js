window.onload = function() {
    var logout = document.getElementById('logout-icon');

    if (logout) {
        logout.onclick = function(e) {
            e.preventDefault();

            var confirmLogout = confirm('Are you sure you want to log out?');

            if (confirmLogout) {
                window.location.href = '../index.html';
            }
        };
    }
};