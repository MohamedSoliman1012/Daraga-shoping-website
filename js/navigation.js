/**
 * Simple site helper scripts.
 * Every function is small and has a short comment so beginners can follow along.
 */

var ROLE_KEY = 'daragaRole';

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

window.onload = function() {
    protectAdminPages();
    setupMenuToggle();
    setupProfileMenu();
    setupLoginForm();
    setupSignupForm();
    setupLogoutLinks();
    setupAdminMenu();
    setupUserButtons();
    setupCatalogSearch();
    initFooterActions();
};

// -----------------------------
//  ACCESS CONTROL
// -----------------------------
function protectAdminPages() {
    var currentRole = sessionStorage.getItem(ROLE_KEY);
    var isAdminPage = document.body.classList.contains('admin-page');

    if (currentRole === 'admin' && !isAdminPage) {
        window.location.href = 'admin-dashboard.html';
    }

    if (currentRole !== 'admin' && isAdminPage) {
        window.location.href = 'page-login.html';
    }
}

// -----------------------------
//  HEADER MENU
// -----------------------------
function setupMenuToggle() {
    var menuBtn = document.getElementById('menuToggle');
    var menu = document.getElementById('navMenu');
    var overlay = document.getElementById('navOverlay');

    if (!menuBtn || !menu) return;

    menuBtn.onclick = function() {
        menu.classList.toggle('active');
        if (overlay) overlay.classList.toggle('active');
    };

    if (overlay) {
        overlay.onclick = function() {
            menu.classList.remove('active');
            overlay.classList.remove('active');
        };
    }
}

// -----------------------------
//  PROFILE MENU
// -----------------------------
function setupProfileMenu() {
    var profileBtn = document.getElementById('profileIcon');
    var profileMenu = document.getElementById('profileDropdown');
    if (!profileBtn || !profileMenu) return;

    profileBtn.onclick = function(e) {
        e.preventDefault();
        profileMenu.classList.toggle('active');
    };

    document.addEventListener('click', function(e) {
        if (!profileBtn.contains(e.target) && !profileMenu.contains(e.target)) {
            profileMenu.classList.remove('active');
        }
    });
}

// -----------------------------
//  FORMS (LOGIN & SIGNUP)
// -----------------------------
function setupLoginForm() {
    var loginForm = document.getElementById('loginForm');
    if (!loginForm) return;

    loginForm.onsubmit = function(e) {
        e.preventDefault();
        var selectedRole = loginForm.querySelector('input[name="role"]:checked');
        var roleValue = selectedRole ? selectedRole.value : 'user';
        sessionStorage.setItem(ROLE_KEY, roleValue);
        if (roleValue === 'admin') {
            window.location.href = 'admin-dashboard.html';
        } else {
            window.location.href = 'page-home.html';
        }
    };
}

function setupSignupForm() {
    var signupForm = document.querySelector('form[name="signupForm"]');
    if (!signupForm) return;

    signupForm.onsubmit = function(e) {
        e.preventDefault();
        var pass1 = signupForm.querySelector('input[name="password"]');
        var pass2 = signupForm.querySelector('input[name="confirmPassword"]');
        if (pass1.value !== pass2.value) {
            alert('Passwords do not match!');
        } else {
            window.location.href = 'page-home.html';
        }
    };
}

function setupLogoutLinks() {
    var logoutLinks = document.querySelectorAll('.logout');
    logoutLinks.forEach(function(link) {
        link.onclick = function() {
            sessionStorage.removeItem(ROLE_KEY);
        };
    });
}

// -----------------------------
//  ADMIN MENU + USER BUTTONS
// -----------------------------
function setupAdminMenu() {
    var adminMenuToggle = document.getElementById('adminActionsToggle');
    var adminMenuList = document.getElementById('adminActionsMenu');
    if (!adminMenuToggle || !adminMenuList) return;

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

function setupUserButtons() {
    var userViewBtns = document.querySelectorAll('.user-view-btn');
    userViewBtns.forEach(function(btn) {
        btn.onclick = function() {
            var name = btn.getAttribute('data-user') || 'this user';
            alert('Viewing details for ' + name + '.');
        };
    });

    var userRemoveBtns = document.querySelectorAll('.user-remove-btn');
    userRemoveBtns.forEach(function(btn) {
        btn.onclick = function(e) {
            e.preventDefault();
            var name = btn.getAttribute('data-user') || 'this user';
            if (confirm('Remove ' + name + ' from the list?')) {
                var row = findParentRow(btn);
                if (row && row.parentElement) {
                    row.parentElement.removeChild(row);
                }
            }
        };
    });
}

// -----------------------------
//  SIMPLE KEYWORD SEARCH
// -----------------------------
function setupCatalogSearch() {
    var categorySearchForms = document.querySelectorAll('.category-search');
    categorySearchForms.forEach(function(form) {
        form.onsubmit = function(e) {
            e.preventDefault();
            var scope = form.getAttribute('data-scope');
            var input = form.querySelector('input');
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
    });
}

// -----------------------------
//  FOOTER HELPERS
// -----------------------------
function initFooterActions() {
    var currentYear = new Date().getFullYear();
    var yearHolders = document.querySelectorAll('.footer-year');
    yearHolders.forEach(function(holder) {
        holder.textContent = currentYear;
    });

    var topLinks = document.querySelectorAll('.back-to-top-link');
    topLinks.forEach(function(link) {
        link.onclick = function(e) {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
        };
    });

    var footerEmails = document.querySelectorAll('[data-footer-email]');
    footerEmails.forEach(function(link) {
        link.href = 'mailto:support@daragashop.com';
    });
}

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

function findParentRow(element) {
    while (element && element.tagName !== 'TR') {
        element = element.parentElement;
    }
    return element;
}
