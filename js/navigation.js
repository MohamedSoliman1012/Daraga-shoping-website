// Navigation Menu Toggle
document.addEventListener('DOMContentLoaded', function() {
    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.getElementById('navMenu');
    const navOverlay = document.getElementById('navOverlay');
    
    if (menuToggle && navMenu && navOverlay) {
        // Toggle menu when burger icon is clicked
        menuToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            navMenu.classList.toggle('active');
            navOverlay.classList.toggle('active');
        });
        
        // Close menu when overlay is clicked
        navOverlay.addEventListener('click', function() {
            navMenu.classList.remove('active');
            navOverlay.classList.remove('active');
        });
        
        // Close menu when clicking on a menu item
        const menuItems = navMenu.querySelectorAll('a');
        menuItems.forEach(item => {
            item.addEventListener('click', function() {
                navMenu.classList.remove('active');
                navOverlay.classList.remove('active');
            });
        });
        
        // Close menu when pressing Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && navMenu.classList.contains('active')) {
                navMenu.classList.remove('active');
                navOverlay.classList.remove('active');
            }
        });
    }
    
    // Shopping Cart functionality (placeholder)
    const cartIcon = document.getElementById('cartIcon');
    if (cartIcon) {
        cartIcon.addEventListener('click', function(e) {
            e.preventDefault();
            // TODO: Implement cart functionality
            alert('Shopping cart functionality coming soon!');
        });
    }
    
    // Notifications functionality (placeholder)
    const notificationIcon = document.getElementById('notificationIcon');
    if (notificationIcon) {
        notificationIcon.addEventListener('click', function(e) {
            e.preventDefault();
            // TODO: Implement notifications functionality
            alert('Notifications functionality coming soon!');
        });
    }
    
    // Profile Dropdown functionality
    const profileIcon = document.getElementById('profileIcon');
    const profileDropdown = document.getElementById('profileDropdown');
    
    if (profileIcon && profileDropdown) {
        // Toggle dropdown when profile icon is clicked
        profileIcon.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            profileDropdown.classList.toggle('active');
        });
        
        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!profileIcon.contains(e.target) && !profileDropdown.contains(e.target)) {
                profileDropdown.classList.remove('active');
            }
        });
        
        // Close dropdown when pressing Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && profileDropdown.classList.contains('active')) {
                profileDropdown.classList.remove('active');
            }
        });
        
        // Close dropdown when clicking on a dropdown item
        const dropdownItems = profileDropdown.querySelectorAll('.dropdown-item');
        dropdownItems.forEach(item => {
            item.addEventListener('click', function() {
                // Don't close if it's a logout link - let it navigate
                if (!this.classList.contains('logout')) {
                    profileDropdown.classList.remove('active');
                }
            });
        });
    }
    
    // Orders link functionality (placeholder)
    const ordersLink = document.getElementById('ordersLink');
    if (ordersLink) {
        ordersLink.addEventListener('click', function(e) {
            e.preventDefault();
            // TODO: Implement orders page
            alert('Orders page coming soon!');
        });
    }
    
    // Cart link functionality
    const cartLink = document.getElementById('cartLink');
    if (cartLink) {
        cartLink.addEventListener('click', function(e) {
            e.preventDefault();
            // TODO: Implement cart page
            alert('Shopping cart page coming soon!');
        });
    }
});

