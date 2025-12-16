
-- ==================== SECTION 1: PRODUCT QUERIES ====================
-- Used in: php/products.php

-- QUERY 1.1: GET ALL PRODUCTS
-- Use Case: Display all products on homepage or admin panel
-- WHERE USED: php/products.php (action=get_all)
SELECT * FROM products ORDER BY category, product_id;

-- QUERY 1.2: GET PRODUCTS BY CATEGORY
-- Use Case: Display products in specific category (bicycles, repair, accessories)
-- WHERE USED: php/products.php (action=get_by_category)
-- Parameters: category = 'bicycles' OR 'repair' OR 'accessories'
SELECT * FROM products WHERE category = ? ORDER BY product_id;

-- QUERY 1.3: GET SINGLE PRODUCT DETAILS
-- Use Case: Display detailed information for a specific product
-- WHERE USED: php/products.php (action=get_product)
-- Parameters: product_id
SELECT * FROM products WHERE product_id = ?;

-- QUERY 1.4: GET PRODUCT COUNT BY CATEGORY
-- Use Case: Show category statistics on admin dashboard
-- WHERE USED: Could be used in admin dashboard
SELECT category, COUNT(*) as count FROM products GROUP BY category;

-- QUERY 1.5: GET PRODUCTS WITH LOW STOCK (Future)
-- Use Case: Alert admin about low inventory
-- WHERE USED: Future feature
SELECT * FROM products WHERE quantity < 10;

-- ==================== SECTION 2: USER QUERIES ====================
-- Used in: php/users.php, php/auth.php

-- QUERY 2.1: VERIFY USER LOGIN (by email)
-- Use Case: Check if user exists during login (email)
-- WHERE USED: php/auth.php (action=user_login)
-- Parameters: email
SELECT user_id, username, email, password FROM users WHERE email = ?;

-- QUERY 2.2: VERIFY USER LOGIN (by username)
-- Use Case: Check if user exists during login (username)
-- WHERE USED: php/auth.php (action=user_login)
-- Parameters: username
SELECT user_id, username, email, password FROM users WHERE username = ?;

-- QUERY 2.3: CHECK IF USERNAME EXISTS
-- Use Case: Validate unique username during signup
-- WHERE USED: php/auth.php (action=user_signup)
-- Parameters: username
SELECT user_id FROM users WHERE username = ?;

-- QUERY 2.4: CHECK IF EMAIL EXISTS
-- Use Case: Validate unique email during signup
-- WHERE USED: php/auth.php (action=user_signup)
-- Parameters: email
SELECT user_id FROM users WHERE email = ?;

-- QUERY 2.5: GET ALL USERS
-- Use Case: Display user list in admin panel
-- WHERE USED: php/users.php (action=get_all_users)
SELECT user_id, username, email FROM users ORDER BY user_id DESC;

-- QUERY 2.6: GET SINGLE USER PROFILE
-- Use Case: Display user profile information
-- WHERE USED: php/users.php (action=get_user or get_profile)
-- Parameters: user_id
SELECT user_id, username, email FROM users WHERE user_id = ?;

-- QUERY 2.7: COUNT TOTAL USERS
-- Use Case: Dashboard statistic showing total registered users
-- WHERE USED: php/orders.php (action=get_dashboard_stats)
SELECT COUNT(*) as total_users FROM users;

-- ==================== SECTION 3: ADMIN QUERIES ====================
-- Used in: php/auth.php

-- QUERY 3.1: VERIFY ADMIN LOGIN
-- Use Case: Authenticate admin with email and verify password
-- WHERE USED: php/auth.php (action=admin_login)
-- Parameters: email
SELECT email, password FROM admins WHERE email = ?;

-- ==================== SECTION 4: ORDER QUERIES ====================
-- Used in: php/orders.php

-- QUERY 4.1: GET USER'S ORDERS
-- Use Case: Display all orders placed by a specific user
-- WHERE USED: php/orders.php (action=get_user_orders)
-- Parameters: user_id
SELECT * FROM orders WHERE user_id = ? ORDER BY created_at DESC;

-- QUERY 4.2: GET ALL ORDERS (ADMIN)
-- Use Case: Display all orders in admin panel
-- WHERE USED: php/orders.php (action=get_all_orders)
SELECT * FROM orders ORDER BY created_at DESC;

-- QUERY 4.3: GET SINGLE ORDER DETAILS
-- Use Case: Display detailed view of a specific order
-- WHERE USED: php/orders.php (action=get_order)
-- Parameters: order_id
SELECT * FROM orders WHERE order_id = ?;

-- QUERY 4.4: GET ORDER WITH USER VERIFICATION
-- Use Case: Ensure order belongs to logged-in user
-- WHERE USED: php/orders.php (action=get_order)
-- Parameters: order_id, user_id
SELECT * FROM orders WHERE order_id = ? AND user_id = ?;

-- QUERY 4.5: COUNT TOTAL ORDERS
-- Use Case: Dashboard statistic showing total orders placed
-- WHERE USED: php/orders.php (action=get_dashboard_stats)
SELECT COUNT(*) as total_orders FROM orders;

-- QUERY 4.6: GET TOTAL REVENUE (All non-cancelled orders)
-- Use Case: Dashboard statistic showing total sales revenue
-- WHERE USED: php/orders.php (action=get_dashboard_stats)
SELECT SUM(total_price) as total_revenue FROM orders WHERE status != 'cancelled';

-- QUERY 4.7: GET ORDERS BY STATUS
-- Use Case: Filter orders by status in admin panel
-- WHERE USED: Future feature - admin order filtering
-- Parameters: status (pending, processing, shipped, delivered, cancelled)
SELECT * FROM orders WHERE status = ? ORDER BY created_at DESC;

-- QUERY 4.8: GET RECENT ORDERS (Last 10)
-- Use Case: Show recent orders on admin dashboard
-- WHERE USED: Could be used in admin dashboard
SELECT * FROM orders ORDER BY created_at DESC LIMIT 10;

-- QUERY 4.9: GET ORDERS BY DATE RANGE
-- Use Case: Generate sales reports for specific period
-- WHERE USED: Future feature - reporting
-- Parameters: start_date, end_date
SELECT * FROM orders WHERE created_at BETWEEN ? AND ? ORDER BY created_at DESC;

-- QUERY 4.10: COUNT ORDERS BY STATUS
-- Use Case: Dashboard chart showing order status distribution
-- WHERE USED: Could be used in admin dashboard analytics
SELECT status, COUNT(*) as count FROM orders GROUP BY status;

-- ==================== SECTION 5: DASHBOARD/STATISTICS QUERIES ====================
-- Used in: php/orders.php and admin dashboard

-- QUERY 5.1: GET ALL DASHBOARD STATISTICS
-- Use Case: Load all stats for admin dashboard in one query
-- WHERE USED: php/orders.php (action=get_dashboard_stats)
SELECT 
    (SELECT COUNT(*) FROM orders) as total_orders,
    (SELECT SUM(total_price) FROM orders WHERE status != 'cancelled') as total_revenue,
    (SELECT COUNT(*) FROM products) as total_products,
    (SELECT COUNT(*) FROM users) as total_users;

-- QUERY 5.2: GET MONTHLY REVENUE
-- Use Case: Show sales trend over months
-- WHERE USED: Future feature - admin analytics
SELECT DATE_FORMAT(created_at, '%Y-%m') as month, SUM(total_price) as revenue FROM orders 
WHERE status != 'cancelled' GROUP BY DATE_FORMAT(created_at, '%Y-%m') ORDER BY month DESC;

-- QUERY 5.3: GET TOP SELLING PRODUCTS (Future)
-- Use Case: Show which products sell most
-- WHERE USED: Future feature - requires order_items table
SELECT product_id, SUM(quantity) as total_sold FROM order_items 
GROUP BY product_id ORDER BY total_sold DESC LIMIT 10;

-- ==================== SECTION 6: SEARCH & FILTER QUERIES ====================
-- Used in: php/products.php (future features)

-- QUERY 6.1: SEARCH PRODUCTS BY NAME
-- Use Case: Search products on website
-- WHERE USED: Future feature - product search
-- Parameters: search_term (wrapped with % for LIKE)
SELECT * FROM products WHERE name LIKE ? ORDER BY product_id;

-- QUERY 6.2: GET PRODUCTS BY PRICE RANGE
-- Use Case: Filter products by price
-- WHERE USED: Future feature - price filtering
-- Parameters: min_price, max_price
SELECT * FROM products WHERE price BETWEEN ? AND ? ORDER BY price;

-- ==================== SECTION 7: JOIN QUERIES ====================
-- Complex queries combining multiple tables

-- QUERY 7.1: GET ORDERS WITH USER DETAILS
-- Use Case: Display orders with customer information
-- WHERE USED: Admin panel - more complete order view
SELECT o.*, u.username, u.email as user_email FROM orders o 
LEFT JOIN users u ON o.user_id = u.user_id ORDER BY o.created_at DESC;

-- QUERY 7.2: GET USER WITH ORDER COUNT
-- Use Case: Show which users have placed most orders
-- WHERE USED: Future feature - customer analytics
SELECT u.user_id, u.username, u.email, COUNT(o.order_id) as order_count 
FROM users u LEFT JOIN orders o ON u.user_id = o.user_id 
GROUP BY u.user_id ORDER BY order_count DESC;

-- ==================== SECTION 8: INSERT STATEMENTS (When Needed) ====================

-- INSERT 8.1: ADD NEW USER
-- Use Case: User registration
-- WHERE USED: php/auth.php (action=user_signup)
-- Parameters: username, email, password (hashed)
INSERT INTO users (username, email, password) VALUES (?, ?, ?);

-- INSERT 8.2: ADD NEW PRODUCT
-- Use Case: Admin adds new product
-- WHERE USED: php/products.php (action=add_product)
-- Parameters: name, price, category, details, image_url
INSERT INTO products (name, price, category, details, image_url) VALUES (?, ?, ?, ?, ?);

-- INSERT 8.3: CREATE NEW ORDER
-- Use Case: User places order
-- WHERE USED: php/orders.php (action=create_order)
-- Parameters: user_id, full_name, email, phone, address, city, total_price, payment_method
INSERT INTO orders (user_id, full_name, email, phone, address, city, total_price, payment_method, status, created_at) 
VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'pending', CURRENT_TIMESTAMP);

-- INSERT 8.4: ADD ADMIN ACCOUNT (One-time setup)
-- Use Case: Create admin account
-- WHERE USED: Manual setup only
-- Parameters: email, password (hashed)
INSERT INTO admins (email, password) VALUES (?, ?);

-- ==================== SECTION 9: UPDATE STATEMENTS ====================

-- UPDATE 9.1: UPDATE ORDER STATUS
-- Use Case: Admin changes order status
-- WHERE USED: php/orders.php (action=update_status)
-- Parameters: status, order_id
UPDATE orders SET status = ? WHERE order_id = ?;

-- UPDATE 9.2: UPDATE PRODUCT
-- Use Case: Admin edits product details
-- WHERE USED: php/products.php (action=update_product)
-- Parameters: name, price, category, details, image_url, product_id
UPDATE products SET name = ?, price = ?, category = ?, details = ?, image_url = ? WHERE product_id = ?;

-- UPDATE 9.3: UPDATE USER PROFILE
-- Use Case: User updates their profile
-- WHERE USED: php/users.php (action=update_profile)
-- Parameters: username, email, password (hashed - optional)
UPDATE users SET username = ?, email = ? WHERE user_id = ?;

-- UPDATE 9.4: UPDATE USER PASSWORD
-- Use Case: User changes password
-- WHERE USED: php/users.php (action=update_profile)
-- Parameters: password (hashed), user_id
UPDATE users SET password = ? WHERE user_id = ?;

-- ==================== SECTION 10: DELETE STATEMENTS ====================

-- DELETE 10.1: DELETE PRODUCT
-- Use Case: Admin removes product from catalog
-- WHERE USED: php/products.php (action=delete_product)
-- Parameters: product_id
DELETE FROM products WHERE product_id = ?;

-- DELETE 10.2: DELETE USER
-- Use Case: Admin removes user account
-- WHERE USED: php/users.php (action=delete_user)
-- Parameters: user_id
-- NOTE: Orders will cascade delete due to FOREIGN KEY ON DELETE CASCADE
DELETE FROM users WHERE user_id = ?;

-- DELETE 10.3: DELETE ORDER (Future)
-- Use Case: Admin removes order
-- WHERE USED: Future feature
-- Parameters: order_id
DELETE FROM orders WHERE order_id = ?;

-- ==================== SECTION 11: REFERENCE - DATABASE STRUCTURE ====================
-- TABLE: users
-- user_id (INT) PRIMARY KEY AUTO_INCREMENT
-- username (VARCHAR 100) NOT NULL UNIQUE
-- email (VARCHAR 150) NOT NULL UNIQUE
-- password (VARCHAR 255) NOT NULL

-- TABLE: admins
-- email (VARCHAR 150) PRIMARY KEY
-- password (VARCHAR 255) NOT NULL

-- TABLE: products
-- product_id (INT) PRIMARY KEY AUTO_INCREMENT
-- name (VARCHAR 150) NOT NULL
-- price (DECIMAL 10,2) NOT NULL
-- details (TEXT)
-- image_url (VARCHAR 255)
-- category (VARCHAR 100) NOT NULL - VALUES: 'bicycles', 'repair', 'accessories'

-- TABLE: orders
-- order_id (INT) PRIMARY KEY AUTO_INCREMENT
-- user_id (INT) NOT NULL FOREIGN KEY
-- full_name (VARCHAR 150) NOT NULL
-- email (VARCHAR 150) NOT NULL
-- phone (VARCHAR 20) NOT NULL
-- address (VARCHAR 255) NOT NULL
-- city (VARCHAR 100) NOT NULL
-- total_price (DECIMAL 10,2) NOT NULL
-- payment_method (VARCHAR 50) NOT NULL
-- status (VARCHAR 50) DEFAULT 'pending' - VALUES: 'pending', 'processing', 'shipped', 'delivered', 'cancelled'
-- created_at (TIMESTAMP) NOT NULL

-- ==================== SECTION 12: NOTES FOR DEVELOPERS ====================
-- 1. DATABASE IS EMPTY: Start with no data, let users create accounts
--    This is normal for production environments
--
-- 2. PREPARED STATEMENTS: Always use ? placeholders with prepared statements
--    Example: $stmt->bind_param("s", $email);
--    This prevents SQL injection attacks
--
-- 3. PASSWORD HASHING: 
--    Hashing: $hashed = password_hash($plaintext, PASSWORD_DEFAULT);
--    Verifying: password_verify($plaintext, $hashed);
--
-- 4. TIMESTAMPS:
--    Auto-insert: Use CURRENT_TIMESTAMP in INSERT
--    Or in PHP: date('Y-m-d H:i:s') or time()
--
-- 5. FOREIGN KEYS:
--    orders.user_id references users.user_id
--    ON DELETE CASCADE = delete orders when user is deleted
--
-- 6. CATEGORIES:
--    Current values: 'bicycles', 'repair', 'accessories'
--    These are hardcoded in PHP files
--
-- 7. ORDER STATUS FLOW:
--    pending → processing → shipped → delivered (or cancelled anytime)
--
-- 8. IMAGE URLS:
--    Store relative paths from root: '../images/bikes/city/4.jpg'
--    Or use absolute URLs in production
--
-- ==================== END OF DML FILE ====================
