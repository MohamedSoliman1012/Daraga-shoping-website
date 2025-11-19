// Navigation and UI Interactions
(function() {
    'use strict';

    // Utility functions
    const $ = (id) => document.getElementById(id);
    const $$ = (selector, context = document) => context.querySelectorAll(selector);

    // State management
    let menuState = { isOpen: false };
    let dropdownState = { isOpen: false };

    // Close menu helper
    const closeMenu = (menu, overlay) => {
        if (menu && overlay) {
            menu.classList.remove('active');
            overlay.classList.remove('active');
            menuState.isOpen = false;
        }
    };

    // Toggle menu helper
    const toggleMenu = (menu, overlay) => {
        if (menu && overlay) {
            const isActive = menu.classList.contains('active');
            if (isActive) {
                closeMenu(menu, overlay);
            } else {
                menu.classList.add('active');
                overlay.classList.add('active');
                menuState.isOpen = true;
            }
        }
    };

    // Close dropdown helper
    const closeDropdown = (dropdown) => {
        if (dropdown) {
            dropdown.classList.remove('active');
            dropdownState.isOpen = false;
        }
    };

    // Show notification (replaces alert for better UX)
    const showNotification = (message) => {
        // Create notification element
        const notification = document.createElement('div');
        notification.style.cssText = `
            position: fixed;
            top: 80px;
            right: 20px;
            background: #FFCB74;
            color: #111111;
            padding: 15px 25px;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
            z-index: 10000;
            font-weight: 600;
            animation: slideIn 0.3s ease;
        `;
        notification.textContent = message;
        
        // Add animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes slideIn {
                from { transform: translateX(400px); opacity: 0; }
                to { transform: translateX(0); opacity: 1; }
            }
        `;
        if (!document.querySelector('#notification-style')) {
            style.id = 'notification-style';
            document.head.appendChild(style);
        }
        
        document.body.appendChild(notification);
        
        // Remove after 3 seconds
        setTimeout(() => {
            notification.style.animation = 'slideIn 0.3s ease reverse';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    };

    // Initialize navigation menu
    const initNavigationMenu = () => {
        const menuToggle = $('menuToggle');
        const navMenu = $('navMenu');
        const navOverlay = $('navOverlay');

        if (!menuToggle || !navMenu || !navOverlay) return;

        // Toggle menu on burger icon click
        menuToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            toggleMenu(navMenu, navOverlay);
        });

        // Close menu on overlay click
        navOverlay.addEventListener('click', () => {
            closeMenu(navMenu, navOverlay);
        });

        // Close menu on menu item click - use event delegation
        navMenu.addEventListener('click', (e) => {
            if (e.target.tagName === 'A') {
                closeMenu(navMenu, navOverlay);
            }
        });

        // Close menu on Escape key - single listener
        const handleEscape = (e) => {
            if (e.key === 'Escape' && menuState.isOpen) {
                closeMenu(navMenu, navOverlay);
            }
        };
        document.addEventListener('keydown', handleEscape);
    };

    // Initialize profile dropdown
    const initProfileDropdown = () => {
        const profileIcon = $('profileIcon');
        const profileDropdown = $('profileDropdown');

        if (!profileIcon || !profileDropdown) return;

        // Toggle dropdown on profile icon click
        profileIcon.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();
            const isActive = profileDropdown.classList.contains('active');
            if (isActive) {
                closeDropdown(profileDropdown);
            } else {
                profileDropdown.classList.add('active');
                dropdownState.isOpen = true;
            }
        });

        // Close dropdown when clicking outside - optimized with single listener
        const handleClickOutside = (e) => {
            if (dropdownState.isOpen && 
                !profileIcon.contains(e.target) && 
                !profileDropdown.contains(e.target)) {
                closeDropdown(profileDropdown);
            }
        };
        document.addEventListener('click', handleClickOutside, true);

        // Close dropdown on Escape key
        const handleEscape = (e) => {
            if (e.key === 'Escape' && dropdownState.isOpen) {
                closeDropdown(profileDropdown);
            }
        };
        document.addEventListener('keydown', handleEscape);

        // Close dropdown on item click (except logout) - use event delegation
        profileDropdown.addEventListener('click', (e) => {
            const item = e.target.closest('.dropdown-item');
            if (item && !item.classList.contains('logout')) {
                closeDropdown(profileDropdown);
            }
        });
    };

    // Initialize placeholder features with notifications
    const initPlaceholderFeatures = () => {
        const features = [
            { id: 'cartIcon', message: 'Shopping cart functionality coming soon!' },
            { id: 'notificationIcon', message: 'Notifications functionality coming soon!' },
            { id: 'ordersLink', message: 'Orders page coming soon!' },
            { id: 'cartLink', message: 'Shopping cart page coming soon!' }
        ];

        features.forEach(({ id, message }) => {
            const element = $(id);
            if (element) {
                element.addEventListener('click', (e) => {
                    e.preventDefault();
                    showNotification(message);
                });
            }
        });
    };

    // Initialize add to cart and buy now buttons
    const initProductButtons = () => {
        // Add to cart buttons
        $$('.add-to-cart-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                showNotification('Added to cart! (Feature coming soon)');
            });
        });

        // Buy now buttons
        $$('.buy-now-btn').forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                showNotification('Proceed to checkout! (Feature coming soon)');
            });
        });
    };

    // Initialize login form with role-based redirection
    const initLoginForm = () => {
        const loginForm = document.getElementById('loginForm');
        if (!loginForm) return;

        loginForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const formData = new FormData(loginForm);
            const role = formData.get('role');
            const email = formData.get('email');
            const password = formData.get('password');

            // Basic validation
            if (!email || !password) {
                showNotification('Please fill in all fields');
                return;
            }

            // Redirect based on role
            if (role === 'admin') {
                window.location.href = 'admin.html';
            } else {
                window.location.href = 'home.html';
            }
        });
    };

    // Initialize all features when DOM is ready
    const init = () => {
        initNavigationMenu();
        initProfileDropdown();
        initPlaceholderFeatures();
        initProductButtons();
        initLoginForm();
    };

    // Start when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
