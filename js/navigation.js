// Wait for page to load
window.onload = function() {
    
    // Clear old orders only on first page load in this session
    if (!sessionStorage.getItem('ordersInitialized')) {
        localStorage.removeItem('orders');
        sessionStorage.setItem('ordersInitialized', 'true');
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
    
    // Cart Link
    var cartLink = document.getElementById('cartLink');
    if (cartLink && (!cartLink.getAttribute('href') || cartLink.getAttribute('href') === '#')) {
        cartLink.onclick = function(e) {
            e.preventDefault();
            window.location.href = 'shopping-cart.html';
        };
    }
    
    // Cart Management Functions
    function getCart() {
        var cart = localStorage.getItem('cart');
        return cart ? JSON.parse(cart) : [];
    }
    
    function saveCart(cart) {
        localStorage.setItem('cart', JSON.stringify(cart));
    }
    
    function addToCart(name, price, image) {
        var cart = getCart();
        var existingItem = cart.find(function(item) { return item.name === name; });
        if (existingItem) {
            existingItem.quantity += 1;
        } else {
            cart.push({ name: name, price: parseFloat(price), quantity: 1, image: image });
        }
        saveCart(cart);
        updateCartDisplay();
    }
    
    function removeFromCart(index) {
        var cart = getCart();
        cart.splice(index, 1);
        saveCart(cart);
        updateCartDisplay();
    }
    
    function updateQuantity(index, quantity) {
        var cart = getCart();
        if (quantity > 0) {
            cart[index].quantity = parseInt(quantity);
            saveCart(cart);
            updateCartDisplay();
        }
    }
    
    function calculateTotal() {
        var cart = getCart();
        var subtotal = 0;
        for (var i = 0; i < cart.length; i++) {
            subtotal += cart[i].price * cart[i].quantity;
        }
        var shipping = subtotal > 0 ? 50 : 0;
        return { subtotal: subtotal, shipping: shipping, total: subtotal + shipping };
    }
    
    function updateCartDisplay() {
        var cartContainer = document.getElementById('cartItemsContainer');
        var subtotalEl = document.getElementById('subtotal');
        var shippingEl = document.getElementById('shipping');
        var totalEl = document.getElementById('total');
        var checkoutLink = document.getElementById('checkoutLink');
        
        if (cartContainer) {
            var cart = getCart();
            if (cart.length === 0) {
                cartContainer.innerHTML = '<p class="empty-cart-message">Your cart is empty. Start shopping!</p>';
                if (subtotalEl) subtotalEl.textContent = '$0';
                if (shippingEl) shippingEl.textContent = '$0';
                if (totalEl) totalEl.textContent = '$0';
                if (checkoutLink) checkoutLink.style.display = 'none';
            } else {
                cartContainer.innerHTML = '';
                for (var i = 0; i < cart.length; i++) {
                    var item = cart[i];
                    var itemDiv = document.createElement('div');
                    itemDiv.className = 'cart-item';
                    itemDiv.innerHTML = '<div class="cart-item-image"><div class="card-image" data-bg-image="' + item.image + '"></div></div>' +
                        '<div class="cart-item-details"><h3>' + item.name + '</h3><p class="cart-item-price">$' + item.price.toLocaleString() + '</p>' +
                        '<div class="cart-item-quantity"><label>Quantity:</label><input type="number" value="' + item.quantity + '" min="1" class="quantity-input" data-index="' + i + '"></div></div>' +
                        '<div class="cart-item-actions"><button class="remove-btn" data-index="' + i + '">Remove</button></div>';
                    cartContainer.appendChild(itemDiv);
                }
                var totals = calculateTotal();
                if (subtotalEl) subtotalEl.textContent = '$' + totals.subtotal.toLocaleString();
                if (shippingEl) shippingEl.textContent = '$' + totals.shipping;
                if (totalEl) totalEl.textContent = '$' + totals.total.toLocaleString();
                if (checkoutLink) checkoutLink.style.display = 'inline-block';
                
                // Re-attach event listeners
                attachCartListeners();
            }
        }
    }
    
    function updateCheckoutDisplay() {
        var checkoutItems = document.getElementById('checkoutItems');
        var checkoutTotal = document.getElementById('checkoutTotal');
        var cart = getCart();
        
        if (checkoutItems && checkoutTotal) {
            if (cart.length === 0) {
                checkoutItems.innerHTML = '<span>No items</span>';
                checkoutTotal.textContent = '$0';
            } else {
                var itemsText = '';
                var totals = calculateTotal();
                for (var i = 0; i < cart.length; i++) {
                    itemsText += cart[i].name + ' ($' + cart[i].price.toLocaleString() + '/- x ' + cart[i].quantity + ')';
                    if (i < cart.length - 1) itemsText += ', ';
                }
                checkoutItems.innerHTML = '<span>' + itemsText + '</span>';
                checkoutTotal.textContent = '$' + totals.total.toLocaleString() + '/-';
            }
        }
    }
    
    function attachCartListeners() {
        var removeBtns = document.querySelectorAll('.remove-btn');
        for (var i = 0; i < removeBtns.length; i++) {
            removeBtns[i].onclick = function(e) {
                e.preventDefault();
                var index = parseInt(this.getAttribute('data-index'));
                if (confirm('Remove this item from cart?')) {
                    removeFromCart(index);
                }
            };
        }
        
        var quantityInputs = document.querySelectorAll('.quantity-input');
        for (var i = 0; i < quantityInputs.length; i++) {
            quantityInputs[i].onchange = function() {
                var index = parseInt(this.getAttribute('data-index'));
                updateQuantity(index, this.value);
            };
        }
        
        // Set background images
        var cardImages = document.querySelectorAll('.card-image[data-bg-image]');
        for (var i = 0; i < cardImages.length; i++) {
            var bgImage = cardImages[i].getAttribute('data-bg-image');
            if (bgImage) {
                cardImages[i].style.backgroundImage = 'url(' + bgImage + ')';
            }
        }
    }
    
    // Add to Cart Buttons
    var addToCartBtns = document.querySelectorAll('.add-to-cart-btn');
    for (var i = 0; i < addToCartBtns.length; i++) {
        addToCartBtns[i].onclick = function(e) {
            e.preventDefault();
            var productDetail = this.closest('.product-detail');
            if (productDetail) {
                var nameEl = productDetail.querySelector('h1');
                var priceEl = productDetail.querySelector('.product-price');
                var imageEl = productDetail.querySelector('.card-image');
                if (nameEl && priceEl) {
                    var name = nameEl.textContent.trim();
                    var priceText = priceEl.textContent.replace(/[^0-9.]/g, '');
                    var imageUrl = imageEl ? (imageEl.getAttribute('data-bg-image') || imageEl.style.backgroundImage.replace(/url\(|\)|"/g, '')) : '';
                    addToCart(name, priceText, imageUrl);
                    alert('Item added to cart!');
                }
            }
        };
    }
    
    
    // Buy Now Buttons
    var buyNowBtns = document.querySelectorAll('.buy-now-btn');
    for (var i = 0; i < buyNowBtns.length; i++) {
        buyNowBtns[i].onclick = function(e) {
            e.preventDefault();
            var productDetail = this.closest('.product-detail');
            if (productDetail) {
                var nameEl = productDetail.querySelector('h1');
                var priceEl = productDetail.querySelector('.product-price');
                var imageEl = productDetail.querySelector('.card-image');
                if (nameEl && priceEl) {
                    var name = nameEl.textContent.trim();
                    var priceText = priceEl.textContent.replace(/[^0-9.]/g, '');
                    var imageUrl = imageEl ? (imageEl.getAttribute('data-bg-image') || imageEl.style.backgroundImage.replace(/url\(|\)|"/g, '')) : '';
                    addToCart(name, priceText, imageUrl);
                }
            }
            window.location.href = 'checkout.html';
        };
    }
    
    // Add to cart from item cards (if they have data attributes)
    document.addEventListener('click', function(e) {
        if (e.target.closest('.item-card-link')) {
            var card = e.target.closest('.item-card');
            if (card && card.hasAttribute('data-add-to-cart')) {
                e.preventDefault();
                var name = card.querySelector('.card-title')?.textContent.trim();
                var price = card.querySelector('.card-price')?.textContent.replace(/[^0-9.]/g, '');
                var image = card.querySelector('.card-image');
                var imageUrl = image ? (image.getAttribute('data-bg-image') || image.style.backgroundImage.replace(/url\(|\)|"/g, '')) : '';
                if (name && price) {
                    addToCart(name, price, imageUrl);
                    alert('Item added to cart!');
                }
            }
        }
    });
    
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
    
    // Load cart on shopping cart page
    if (document.getElementById('cartItemsContainer')) {
        updateCartDisplay();
    }
    
    // Load checkout summary
    if (document.getElementById('checkoutSummary')) {
        updateCheckoutDisplay();
    }
    
    // Order Now Button (Checkout Page)
    var orderNowBtn = document.querySelector('.order-now-btn');
    if (orderNowBtn) {
        orderNowBtn.onclick = function(e) {
            e.preventDefault();
            var cart = getCart();
            if (cart.length === 0) {
                alert('Your cart is empty!');
                return;
            }
            if (confirm('Confirm your order?')) {
                // Create order
                var orders = JSON.parse(localStorage.getItem('orders') || '[]');
                var orderNumber = 'ORD' + Date.now();
                var totals = calculateTotal();
                var orderItems = [];
                for (var i = 0; i < cart.length; i++) {
                    orderItems.push(cart[i].name + ' (x' + cart[i].quantity + ') - $' + (cart[i].price * cart[i].quantity).toLocaleString());
                }
                var order = {
                    id: orderNumber,
                    date: new Date().toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' }),
                    items: orderItems,
                    total: totals.total,
                    status: 'processing'
                };
                orders.unshift(order);
                localStorage.setItem('orders', JSON.stringify(orders));
                
                // Clear cart
                saveCart([]);
                
                alert('Order placed successfully!');
                window.location.href = 'orders.html';
            }
        };
    }
    
    // Orders Link
    var ordersLink = document.getElementById('ordersLink');
    if (ordersLink && (!ordersLink.getAttribute('href') || ordersLink.getAttribute('href') === '#')) {
        ordersLink.onclick = function(e) {
            e.preventDefault();
            window.location.href = 'orders.html';
        };
    }
    
    // Track Order Buttons
    var trackOrderBtns = document.querySelectorAll('.track-order-btn');
    for (var i = 0; i < trackOrderBtns.length; i++) {
        trackOrderBtns[i].onclick = function(e) {
            e.preventDefault();
            alert('Order tracking feature coming soon!');
        };
    }
    
    // Reorder Buttons
    var reorderBtns = document.querySelectorAll('.reorder-btn');
    for (var i = 0; i < reorderBtns.length; i++) {
        reorderBtns[i].onclick = function(e) {
            e.preventDefault();
            if (confirm('Add all items from this order to your cart?')) {
                alert('Items added to cart!');
                window.location.href = 'shopping-cart.html';
            }
        };
    }
    
    // Cancel Order Buttons
    var cancelOrderBtns = document.querySelectorAll('.cancel-order-btn');
    for (var i = 0; i < cancelOrderBtns.length; i++) {
        cancelOrderBtns[i].onclick = function(e) {
            e.preventDefault();
            if (confirm('Are you sure you want to cancel this order?')) {
                alert('Order cancellation request submitted!');
            }
        };
    }
    
    // Load orders on orders page
    if (document.getElementById('ordersContainer')) {
        var ordersContainer = document.getElementById('ordersContainer');
        var orders = JSON.parse(localStorage.getItem('orders') || '[]');
        
        if (orders.length === 0) {
            ordersContainer.innerHTML = '<p class="empty-orders-message">You have no orders yet. Start shopping!</p>';
        } else {
            ordersContainer.innerHTML = '';
            for (var i = 0; i < orders.length; i++) {
                var order = orders[i];
                var orderDiv = document.createElement('div');
                orderDiv.className = 'order-card-user';
                var itemsHtml = '';
                for (var j = 0; j < order.items.length; j++) {
                    itemsHtml += '<p class="order-items-user">' + order.items[j] + '</p>';
                }
                orderDiv.innerHTML = '<div class="order-info-user">' +
                    '<p><strong>Order #' + order.id + '</strong> - <span class="order-date-user">' + order.date + '</span></p>' +
                    itemsHtml +
                    '<p class="order-total-user"><strong>Total: $' + order.total.toLocaleString() + '</strong></p>' +
                    '<span class="status-badge-user status-' + order.status + '">' + order.status.charAt(0).toUpperCase() + order.status.slice(1) + '</span>' +
                    '</div>';
                ordersContainer.appendChild(orderDiv);
            }
        }
    }
    
    // Set background images from data attributes
    var cardImages = document.querySelectorAll('.card-image[data-bg-image]');
    for (var i = 0; i < cardImages.length; i++) {
        var bgImage = cardImages[i].getAttribute('data-bg-image');
        if (bgImage) {
            cardImages[i].style.backgroundImage = 'url(' + bgImage + ')';
        }
    }
    
};
