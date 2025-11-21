var ROLE_KEY = 'daragaRole';
// Added: simple keyword map so the catalog search can jump to each section
var CATEGORY_KEYWORDS = {
    bicycles: [
        { keywords: ['mountain', 'trail', 'downhill'], target: 'mountain-bikes' },
        { keywords: ['road', 'race', 'speed'], target: 'road-bikes' },
        { keywords: ['city', 'urban', 'commuter', 'hybrid', 'bmx', 'kids'], target: 'city-bikes' }
    ],
    accessories: [
        { keywords: ['helmet', 'head'], target: 'helmets' },
        { keywords: ['light', 'lamp'], target: 'bike-lights' },
        { keywords: ['lock', 'security'], target: 'locks' }
    ],
    repair: [
        { keywords: ['multi', 'kit', 'tool'], target: 'multi-tools' },
        { keywords: ['tire', 'tube', 'patch'], target: 'tire-tools' },
        { keywords: ['chain', 'wrench'], target: 'chain-wrench' }
    ]
};

function findParentRow(element) {
    while (element && element.tagName !== 'TR') {
        element = element.parentElement;
    }
    return element;
}

// Added: helper returns the section id that matches the search term
function getCategoryTarget(scope, value) {
    if (!scope || !value) return null;
    var entries = CATEGORY_KEYWORDS[scope];
    if (!entries) return null;
    var term = value.toLowerCase();
    for (var i = 0; i < entries.length; i++) {
        var entry = entries[i];
        for (var j = 0; j < entry.keywords.length; j++) {
            if (term.indexOf(entry.keywords[j]) !== -1) {
                return entry.target;
            }
        }
    }
    return null;
}

// Wait for page to load
window.onload = function() {
    var currentRole = sessionStorage.getItem(ROLE_KEY);
    var isAdminPage = document.body.classList.contains('admin-page');

    if (currentRole === 'admin' && !isAdminPage) {
        window.location.href = 'admin.html';
        return;
    }

    if (currentRole !== 'admin' && isAdminPage) {
        window.location.href = 'index.html';
        return;
    }
    
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
    document.addEventListener('click', function(e) {
        if (profileBtn && profileMenu) {
            if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
                profileMenu.classList.remove('active');
            }
        }
    });
    
    // Login Button
    var loginForm = document.getElementById('loginForm');
    if (loginForm) {
        loginForm.onsubmit = function(e) {
            e.preventDefault();
            var selectedRole = loginForm.querySelector('input[name="role"]:checked');
            var roleValue = selectedRole ? selectedRole.value : 'user';
            sessionStorage.setItem(ROLE_KEY, roleValue);
            if (roleValue === 'admin') {
                window.location.href = 'admin.html';
            } else {
                window.location.href = 'home.html';
            }
        };
    }
    
    // Logout links
    var logoutLinks = document.querySelectorAll('.logout');
    for (var l = 0; l < logoutLinks.length; l++) {
        logoutLinks[l].onclick = function() {
            sessionStorage.removeItem(ROLE_KEY);
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
    
    // Admin actions menu
    var adminMenuToggle = document.getElementById('adminActionsToggle');
    var adminMenuList = document.getElementById('adminActionsMenu');
    if (adminMenuToggle && adminMenuList) {
        adminMenuToggle.onclick = function(e) {
            e.preventDefault();
            adminMenuList.classList.toggle('active');
        };
        
        document.addEventListener('click', function(e) {
            if (!adminMenuList.contains(e.target) && e.target !== adminMenuToggle) {
                adminMenuList.classList.remove('active');
            }
        });
    }
    
    // User action buttons
    var userViewBtns = document.querySelectorAll('.user-view-btn');
    for (var v = 0; v < userViewBtns.length; v++) {
        userViewBtns[v].onclick = function() {
            var name = this.getAttribute('data-user') || 'this user';
            alert('Viewing details for ' + name + '.');
        };
    }
    
    var userRemoveBtns = document.querySelectorAll('.user-remove-btn');
    for (var r = 0; r < userRemoveBtns.length; r++) {
        userRemoveBtns[r].onclick = function(e) {
            e.preventDefault();
            var name = this.getAttribute('data-user') || 'this user';
            if (confirm('Remove ' + name + ' from the list?')) {
                var row = findParentRow(this);
                if (row && row.parentElement) {
                    row.parentElement.removeChild(row);
                }
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

    // Added: connect the simple catalog search bars to their sections
    var categorySearchForms = document.querySelectorAll('.category-search');
    for (var f = 0; f < categorySearchForms.length; f++) {
        categorySearchForms[f].onsubmit = function(e) {
            e.preventDefault();
            var scope = this.getAttribute('data-scope');
            var input = this.querySelector('input');
            var targetId = getCategoryTarget(scope, input ? input.value : '');
            if (targetId) {
                var targetEl = document.getElementById(targetId);
                if (targetEl) {
                    targetEl.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            } else {
                alert('Try the sample keywords shown under the search bar.');
            }
        };
    }
    
};
