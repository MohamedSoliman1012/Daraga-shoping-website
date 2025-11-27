
window.onload = function() {
    
    

    
    // Menu Button
    var menuBtn = document.getElementById('menuToggle');
    var menu = document.getElementById('navMenu');
    var overlay = document.getElementById('navOverlay');
    
    if (menuBtn) {
        menuBtn.onclick = function() {
            if (menu) menu.classList.toggle('active');
            if (overlay) overlay.classList.toggle('active');
        };
    }
    
    if (overlay) {
        overlay.onclick = function() {
            if (menu) menu.classList.remove('active');
            overlay.classList.remove('active');
        };
    }
    
    // Profile Button
    var profileBtn = document.getElementById('profileIcon');
    var profileMenu = document.getElementById('profileDropdown');
    
    if (profileBtn && profileMenu) {
        profileBtn.onclick = function(e) {
            e.preventDefault();
            profileMenu.classList.toggle('active');
        };
    }
    
    // Close profile when clicking outside
    document.onclick = function(e) {
        if (profileBtn && profileMenu) {
            if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
                profileMenu.classList.remove('active');
            }
        }
    };
    
    // Login Button
    var loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();
            // look for radio inside the form with value "admin"
            var adminRadio = loginForm.querySelector('input[type="radio"][value="admin"]');
            if (adminRadio && adminRadio.checked) {
                window.location.href = '../admin-panel/adminHome.html';
            } else {
                // go to home by default
                window.location.href = 'home.html';
            }
        });
    }
    
    // Signup Button
    var signupForm = document.querySelector('form[name="signupForm"]');
    if (signupForm) {
        signupForm.addEventListener('submit', function(e) {
            e.preventDefault();
            var pass1 = signupForm.querySelector('input[name="password"]');
            var pass2 = signupForm.querySelector('input[name="confirmPassword"]');
            if (!pass1 || !pass2) {
                alert('Please enter password and confirmation.');
                return;
            }
            if (pass1.value !== pass2.value) {
                alert('Passwords do not match!');
                pass1.focus();
                return;
            }
            // simple success action
            window.location.href = 'home.html';
        });
    }
    
    // Cart Icon
    var cartIcon = document.getElementById('cartIcon');
    if (cartIcon && !cartIcon.getAttribute('href') || cartIcon.getAttribute('href') === '#') {
        cartIcon.onclick = function(e) {
            e.preventDefault();
            window.location.href = 'shopping-cart.html';
        };
    }
    
    // Notification Icon
    var notifIcon = document.getElementById('notificationIcon');
    if (notifIcon) {
        notifIcon.onclick = function(e) {
            e.preventDefault();
            alert('No new notifications');
        };
    }
  
    
    
    

    
  

    
   
  
    
 
    
   
   
    
};
