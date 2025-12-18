-- DML File for Daraga Shop Database
-- Sample Data and Demo Records
-- Last Updated: December 2024

SET FOREIGN_KEY_CHECKS = 0;

-- ========================================================
-- USERS TABLE - Sample User Data
-- ========================================================

-- Clear existing data
TRUNCATE TABLE `users`;

-- Insert sample users
INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `created_at`) VALUES
(1, 'johndoe', 'john@example.com', 'password123', '2024-01-15 10:30:00'),
(2, 'jane_smith', 'jane@example.com', 'password456', '2024-01-20 14:45:00'),
(3, 'bike_lover', 'alex@example.com', 'password789', '2024-02-05 09:15:00'),
(4, 'cycling_enthusiast', 'maria@example.com', 'pass2024', '2024-02-10 16:20:00'),
(5, 'repair_expert', 'robert@example.com', 'expertpass', '2024-02-15 11:00:00');

-- ========================================================
-- PRODUCTS TABLE - Sample Products
-- ========================================================

-- Clear existing data
TRUNCATE TABLE `products`;

-- BICYCLES - City Bikes
INSERT INTO `products` (`id`, `name`, `price`, `details`, `image`, `category`, `created_at`) VALUES
(1, 'Urban Cruiser 2024', 299.99, 'Perfect for city commuting with comfortable seating and smooth ride. Features aluminum frame, 7-speed Shimano gears, and LED lights.', 'urban-cruiser.jpg', 'bikes', '2024-01-10 08:00:00'),
(2, 'City Commuter Pro', 349.99, 'Professional grade city bike with lightweight carbon frame. Includes fenders, basket, and integrated lock system for security.', 'city-commuter.jpg', 'bikes', '2024-01-12 08:30:00'),
(3, 'Eco-Friendly Hybrid', 279.99, 'Environmentally conscious design with sustainable materials. Combines speed and comfort for urban and light trail use.', 'eco-hybrid.jpg', 'bikes', '2024-01-15 09:00:00');

-- BICYCLES - Mountain Bikes
INSERT INTO `products` (`id`, `name`, `price`, `details`, `image`, `category`, `created_at`) VALUES
(4, 'Trail Blazer Pro', 599.99, 'High-performance mountain bike for serious trail enthusiasts. Full suspension, 21-speed Shimano drivetrain, and all-terrain tires.', 'trail-blazer.jpg', 'bikes', '2024-01-18 10:00:00'),
(5, 'Alpine Explorer', 699.99, 'Designed for extreme mountain terrain. Dual hydraulic disc brakes, advanced suspension system, and rugged frame construction.', 'alpine-explorer.jpg', 'bikes', '2024-01-20 10:30:00'),
(6, 'Summit Rider XTR', 799.99, 'Premium mountain bike with carbon fiber frame and latest suspension technology. Built for professional mountain bikers.', 'summit-rider.jpg', 'bikes', '2024-01-22 11:00:00');

-- BICYCLES - Road Bikes
INSERT INTO `products` (`id`, `name`, `price`, `details`, `image`, `category`, `created_at`) VALUES
(7, 'Speed Demon Elite', 549.99, 'Lightweight road bike for speed enthusiasts. Drop bars, 16-speed gears, and aerodynamic design for maximum efficiency.', 'speed-demon.jpg', 'bikes', '2024-01-25 12:00:00'),
(8, 'Professional Racer', 899.99, 'Competition-grade road bike used by professional cyclists. Ultra-lightweight carbon frame and professional-level components.', 'pro-racer.jpg', 'bikes', '2024-01-28 12:30:00'),
(9, 'Endurance Runner', 649.99, 'Built for long-distance cycling comfort. Relaxed geometry, stable handling, and durable components for marathon rides.', 'endurance-runner.jpg', 'bikes', '2024-02-01 13:00:00');

-- REPAIR TOOLS
INSERT INTO `products` (`id`, `name`, `price`, `details`, `image`, `category`, `created_at`) VALUES
(10, 'Multi-Tool Pro Kit', 49.99, 'Complete 15-in-1 multi-tool set including hex keys, screwdrivers, and bike-specific tools. Compact and durable.', 'multi-tool.jpg', 'tools', '2024-02-03 14:00:00'),
(11, 'Tire Repair Emergency Kit', 24.99, 'Essential puncture repair kit with patches, levers, and portable pump. Perfect for on-the-go repairs.', 'tire-kit.jpg', 'tools', '2024-02-05 14:30:00'),
(12, 'Chain Cleaning System', 34.99, 'Professional chain cleaning brush and degreaser set. Keeps your bike chain running smoothly and efficiently.', 'chain-cleaner.jpg', 'tools', '2024-02-07 15:00:00'),
(13, 'Hydraulic Floor Pump', 79.99, 'Heavy-duty floor pump with pressure gauge. Works with all valve types for fast and accurate inflation.', 'floor-pump.jpg', 'tools', '2024-02-09 15:30:00'),
(14, 'Spoke Wrench Set', 19.99, 'Complete set of 8 different spoke wrenches for wheel maintenance and truing. Essential for wheel repairs.', 'spoke-wrench.jpg', 'tools', '2024-02-11 16:00:00'),
(15, 'Bottom Bracket Tool Kit', 59.99, 'Professional tools for bottom bracket maintenance and replacement. Includes multiple adapter sizes.', 'bb-tool.jpg', 'tools', '2024-02-13 16:30:00');

-- ACCESSORIES
INSERT INTO `products` (`id`, `name`, `price`, `details`, `image`, `category`, `created_at`) VALUES
(16, 'LED Headlight Pro', 39.99, 'Bright 500-lumen LED headlight with USB charging. Waterproof and adjustable mounting for safety.', 'led-light.jpg', 'accessories', '2024-02-15 17:00:00'),
(17, 'Smart Bike Lock', 69.99, 'Bluetooth-enabled U-lock with app control and alarm. Provides maximum security and convenience.', 'smart-lock.jpg', 'accessories', '2024-02-17 17:30:00'),
(18, 'Cycling Helmet Pro', 89.99, 'Premium safety helmet with integrated ventilation and LED lights. Lightweight and comfortable for long rides.', 'helmet.jpg', 'accessories', '2024-02-19 18:00:00'),
(19, 'Bike Computer Wireless', 54.99, 'Wireless speedometer tracks speed, distance, time, and calories. Waterproof LCD display with 5-hour battery life.', 'bike-computer.jpg', 'accessories', '2024-02-21 18:30:00'),
(20, 'Premium Bike Bag Pack', 44.99, 'Waterproof backpack with bike-specific compartments. Reflective strips for night visibility.', 'bike-bag.jpg', 'accessories', '2024-02-23 19:00:00'),
(21, 'Spare Tire (700x25c)', 29.99, 'High-quality replacement tire for road bikes. Puncture-resistant and durable construction.', 'tire-700x25.jpg', 'accessories', '2024-02-25 19:30:00'),
(22, 'Chain Lubricant Premium', 14.99, 'Professional-grade chain oil prevents rust and extends chain life. Long-lasting formula works in all weather.', 'chain-lube.jpg', 'accessories', '2024-02-27 20:00:00'),
(23, 'Handlebar Grips Comfort', 24.99, 'Ergonomic gel grips reduce hand fatigue. Anti-slip design with shock absorption for smooth rides.', 'grips.jpg', 'accessories', '2024-03-01 20:30:00');

-- ========================================================
-- ORDERS TABLE - Sample Orders
-- ========================================================

-- Clear existing data
TRUNCATE TABLE `orders`;

-- Insert sample orders
INSERT INTO `orders` (`id`, `user_id`, `name`, `email`, `phone`, `address`, `city`, `payment_method`, `total_price`, `status`, `placed_on`) VALUES
(1, 1, 'John Doe', 'john@example.com', '555-0101', '123 Main Street', 'New York', 'credit card', 399.99, 'completed', '2024-02-28 10:30:00'),
(2, 2, 'Jane Smith', 'jane@example.com', '555-0102', '456 Oak Avenue', 'Los Angeles', 'cash on delivery', 749.98, 'pending', '2024-03-01 14:45:00'),
(3, 3, 'Alex Chen', 'alex@example.com', '555-0103', '789 Pine Road', 'Chicago', 'credit card', 1099.97, 'completed', '2024-03-02 09:15:00'),
(4, 4, 'Maria Garcia', 'maria@example.com', '555-0104', '321 Elm Street', 'Houston', 'cash on delivery', 449.98, 'pending', '2024-03-03 16:20:00'),
(5, 5, 'Robert Wilson', 'robert@example.com', '555-0105', '654 Maple Drive', 'Phoenix', 'credit card', 599.99, 'completed', '2024-03-04 11:00:00');

-- ========================================================
-- CART TABLE - Sample Cart Items
-- ========================================================

-- Clear existing data
TRUNCATE TABLE `cart`;

-- Insert sample cart items
INSERT INTO `cart` (`id`, `user_id`, `product_id`, `name`, `price`, `image`, `category`, `quantity`, `added_at`) VALUES
(1, 1, 4, 'Trail Blazer Pro', 599.99, 'trail-blazer.jpg', 'bikes', 1, '2024-03-05 10:00:00'),
(2, 1, 12, 'Chain Cleaning System', 34.99, 'chain-cleaner.jpg', 'tools', 2, '2024-03-05 10:15:00'),
(3, 2, 7, 'Speed Demon Elite', 549.99, 'speed-demon.jpg', 'bikes', 1, '2024-03-05 12:00:00'),
(4, 3, 16, 'LED Headlight Pro', 39.99, 'led-light.jpg', 'accessories', 3, '2024-03-05 14:30:00'),
(5, 5, 10, 'Multi-Tool Pro Kit', 49.99, 'multi-tool.jpg', 'tools', 1, '2024-03-05 15:45:00');

-- ========================================================
-- Re-enable Foreign Key Checks
-- ========================================================
SET FOREIGN_KEY_CHECKS = 1;

-- ========================================================
-- STATISTICS
-- ========================================================
-- Total Users: 5
-- Total Products: 23
-- Total Orders: 5
-- Total Cart Items: 5
-- 
-- Products by Category:
-- - Bikes: 9
-- - Tools: 6
-- - Accessories: 8
--
-- Order Status:
-- - Completed: 3
-- - Pending: 2
-- ========================================================
