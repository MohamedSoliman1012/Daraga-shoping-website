// Wait for page to load
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
        loginForm.onsubmit = function(e) {
            e.preventDefault();
            var adminRadio = document.querySelector('input[value="admin"]');
            if (adminRadio && adminRadio.checked) {
                window.location.href = 'admin.html';
            } else {
                window.location.href = 'home.html';
            }
        };
    }
    
    // Signup Button
    var signupForm = document.querySelector('form[name="signupForm"]');
    if (signupForm) {
        signupForm.onsubmit = function(e) {
            e.preventDefault();
            var pass1 = signupForm.querySelector('input[name="password"]');
            var pass2 = signupForm.querySelector('input[name="confirmPassword"]');
            if (pass1.value !== pass2.value) {
                alert('Passwords do not match!');
            } else {
                window.location.href = 'home.html';
            }
        };
    }
    
    // Cart Icon
    var cartIcon = document.getElementById('cartIcon');
    if (cartIcon) {
        cartIcon.onclick = function(e) {
            e.preventDefault();
            alert('Shopping cart coming soon!');
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
    
    // Orders Link
    var ordersLink = document.getElementById('ordersLink');
    if (ordersLink) {
        ordersLink.onclick = function(e) {
            e.preventDefault();
            alert('Orders page coming soon!');
        };
    }
    
    // Cart Link
    var cartLink = document.getElementById('cartLink');
    if (cartLink) {
        cartLink.onclick = function(e) {
            e.preventDefault();
            alert('Shopping cart page coming soon!');
        };
    }
    
    // Add to Cart Buttons
    var addToCartBtns = document.querySelectorAll('.add-to-cart-btn');
    for (var i = 0; i < addToCartBtns.length; i++) {
        addToCartBtns[i].onclick = function(e) {
            e.preventDefault();
            alert('Item added to cart!');
        };
    }
    
    // Buy Now Buttons
    var buyNowBtns = document.querySelectorAll('.buy-now-btn');
    for (var i = 0; i < buyNowBtns.length; i++) {
        buyNowBtns[i].onclick = function(e) {
            e.preventDefault();
            alert('Proceeding to checkout!');
        };
    }
    
    // Save Button
    var saveBtn = document.querySelector('.save-btn');
    if (saveBtn) {
        saveBtn.onclick = function(e) {
            e.preventDefault();
            alert('Profile saved successfully!');
        };
    }
    
    // Setting Buttons
    var settingBtns = document.querySelectorAll('.setting-btn');
    for (var i = 0; i < settingBtns.length; i++) {
        settingBtns[i].onclick = function(e) {
            e.preventDefault();
            alert('Feature coming soon!');
        };
    }
    
    // Admin Buttons
    var adminBtns = document.querySelectorAll('.admin-btn');
    for (var i = 0; i < adminBtns.length; i++) {
        adminBtns[i].onclick = function(e) {
            e.preventDefault();
            alert('Feature coming soon!');
        };
    }
    
};
