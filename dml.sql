
-- ==================== AUTHENTICATION (php/auth.php) ====================

-- AUTH 1: User login by email or username
SELECT user_id, username, email, password FROM users WHERE email = ? OR username = ?;

-- AUTH 2: Check if username exists (for signup validation)
SELECT user_id FROM users WHERE username = ?;

-- AUTH 3: Check if email exists (for signup validation)
SELECT user_id FROM users WHERE email = ?;

-- AUTH 4: Create new user account
INSERT INTO users (username, email, password) VALUES (?, ?, ?);

-- AUTH 5: Admin login
SELECT email, password FROM admins WHERE email = ?;

-- ==================== PRODUCTS (php/products.php) ====================

-- PROD 1: Get all products
SELECT * FROM products ORDER BY category, product_id;

-- PROD 2: Get products by category (bicycles, repair, accessories)
SELECT * FROM products WHERE category = ? ORDER BY product_id;

-- PROD 3: Get single product details
SELECT * FROM products WHERE product_id = ?;


-- ==================== ORDERS (php/orders.php) ====================

-- ORDER 1: Create new order after checkout
INSERT INTO orders (user_id, full_name, email, phone, address, city, total_price, payment_method, status, created_at) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending', CURRENT_TIMESTAMP);

-- ORDER 2: Get user's order history
SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC;

-- ORDER 3: Get single order details (user verification)
SELECT * FROM orders WHERE order_id = ? AND user_id = ?;

-- ORDER 4: Cancel order
UPDATE orders SET status = 'cancelled' WHERE order_id = ? AND user_id = ?;

-- ==================== USER PROFILE (php/users.php) ====================

-- USER 1: Get user profile
SELECT user_id, username, email FROM users WHERE user_id = ?;
