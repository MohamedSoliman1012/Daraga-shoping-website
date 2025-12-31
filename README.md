# 🚴 Daraga Shop - Bicycle E-Commerce Platform

A full-stack e-commerce website for bicycles, repair tools, and cycling accessories. Built with PHP, MySQL, HTML5, CSS3, and JavaScript.

## 📋 Table of Contents

- [About](#about)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Project Structure](#project-structure)
- [Installation & Setup](#installation--setup)
- [Database Schema](#database-schema)
- [User Roles](#user-roles)
- [Key Pages](#key-pages)
- [Troubleshooting](#troubleshooting)
- [Security Notes](#security-notes)
- [Future Enhancements](#future-enhancements)
- [Contributors](#contributors)

## 🎯 About

Daraga Shop is an e-commerce platform created to sell bicycles, repair tools, and cycling accessories. It is intended for local development using XAMPP (Apache + MySQL) and demonstrates basic e-commerce flows and admin management.

## ✨ Features

- Product categories (City, Mountain, Road)
- Product detail pages with images
- Shopping cart with quantity and total
- Checkout and order placement
- User registration and login
- Admin panel for product, user and order management

## 🛠️ Technologies Used

- Backend: PHP 7+ (MySQLi)
- Database: MySQL
- Frontend: HTML5, CSS3, JavaScript
- Server: Apache (XAMPP)

## 📁 Project Structure

See the repository root for a full listing. Main folders:

- `user-panel/` — user-facing pages and templates
- `admin-panel/` — admin dashboard and management pages
- `user-validation/` — login/signup pages
- `BackEnd/` — server-side scripts and `db.php` (connection)
- `styles/` — `style.css` (user) and `AdminStyle.css` (admin)
- `js/` — client-side scripts
- `ddl.sql`, `dml.sql` — DB schema and sample data

## 💻 Installation & Setup

### Prerequisites
- XAMPP (Apache + MySQL)
- PHP 7.0+
- MySQL

### Steps

1. Place the project folder inside XAMPP's web root (for example `C:\xampp\htdocs\Daraga-shoping-website`).
2. Start Apache and MySQL using the XAMPP control panel.
3. Open phpMyAdmin at `http://localhost/phpmyadmin`.
4. Create a database named `daraga_shop` (or update `BackEnd/db.php` to match your DB name).
5. Import `ddl.sql` (schema) and `dml.sql` (sample data).
6. Visit the site:
   - User: `http://localhost/Daraga-shoping-website/user-panel/home.php`
   - Admin: `http://localhost/Daraga-shoping-website/admin-panel/adminHome.php`
   - Login: `http://localhost/Daraga-shoping-website/user-validation/index.php`

### Database connection
The project uses `BackEnd/db.php` for the DB connection. Current default values (development):

- host: `localhost`
- user: `root`
- password: `` (empty)
- database: `daraga_shop`

You can confirm/edit these in [BackEnd/db.php](BackEnd/db.php#L1-L20).

## 🗄️ Database Schema

Main tables: `users`, `products`, `orders`, `cart`. See `ddl.sql` for exact columns and constraints.

## 👥 User Roles

- Regular users: browse, add to cart, checkout, view orders.
- Admin users: manage products, orders, users and view dashboard stats.

**Default Admin Credentials (for development/testing only):**
- Email: `admin@daraga.com`
- Password: `admin`

## 📄 Key Pages

- `/user-panel/home.php` — homepage
- `/user-panel/bicycles.php` — bicycles category
- `/user-panel/itempage.php` — product detail
- `/user-panel/shopping-cart.php` — cart
- `/user-panel/checkout.php` — checkout
- `/admin-panel/adminHome.php` — admin dashboard

## 🛠️ Troubleshooting

- CSS changes not showing? Your browser may be caching the stylesheet. Perform a hard refresh (`Ctrl+F5`) or clear cached files.
- To prevent caching during development, append a query string to the stylesheet link, for example:

  `<link rel="stylesheet" href="../styles/style.css?v=1.0">`

  Increment the `v` value after updates (e.g. `?v=1.1`).
- Confirm the pages are loading the expected stylesheet:
  - User pages link `../styles/style.css` (check `user-panel/*.php`).
  - Admin pages use `../styles/AdminStyle.css` (check `admin-panel/*.php`).

## 🔐 Security Notes

- Hash passwords using `password_hash()` before storing in production.
- Use prepared statements (or parameterized queries) to avoid SQL injection.
- Add CSRF tokens for state-changing requests.
- Use HTTPS in production and proper error handling/logging.

## 🚀 Future Enhancements

- Payment gateway integration
- Email notifications and order receipts
- Product search, filtering, and pagination
- Mobile responsive improvements

## 👨‍💻 Contributors

Project developed as a student/team exercise in full-stack web development.

## 📞 Support

Open an issue in the repository or contact the maintainers.

---

**Last Updated:** December 31, 2025
# 🚴 Daraga Shop - Bicycle E-Commerce Platform

A full-stack e-commerce website for bicycles, repair tools, and cycling accessories. Built with PHP, MySQL, HTML5, CSS3, and JavaScript, Daraga Shop provides a seamless shopping experience for cycling enthusiasts.

## 📋 Table of Contents

- [About](#about)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Project Structure](#project-structure)
- [Installation & Setup](#installation--setup)
- [Database Schema](#database-schema)
- [User Roles](#user-roles)
- [Key Pages](#key-pages)
- [Security Notes](#security-notes)
- [Future Enhancements](#future-enhancements)
- [Contributors](#contributors)

## 🎯 About

Daraga Shop is an e-commerce platform designed by three Computer Science students passionate about technology and cycling. The project aims to create a comprehensive platform that serves cyclists by connecting them with everything they need — from bikes and repair tools to accessories and spare parts.

## ✨ Features

### 🛍️ Product Management
- Browse bicycles (Mountain, Road, City bikes)
- Repair tools and maintenance products
- Cycling accessories and spare parts
- Detailed product pages with images and specifications

### 🛒 Shopping Features
- Add products to shopping cart
- View cart with total price calculation
- Tax calculation (14%)
- Checkout with shipping details
- Payment method selection (Cash on Delivery, Credit Card)

### 👥 User Management
- User registration (Sign Up)
- User authentication (Login)
- User profile management
- Order history tracking
- Admin and regular user roles

### 📦 Order Management
- Place orders from cart or buy now
- View order status (Pending, Completed)
- Order tracking dashboard
- Admin order management

### 🔐 Admin Panel
- Product management (Add, Edit, Delete)
- User management
- Order management and status updates
- Dashboard with statistics

## 🛠️ Technologies Used

- **Backend**: PHP 7+ with MySQLi
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, Vanilla JavaScript
- **Server**: Apache (XAMPP)
- **Session Management**: PHP Sessions

## 📁 Project Structure

```
Daraga-shoping-website/
│
├── user-panel/                 # User-facing pages
│   ├── home.php                # Homepage with categories
│   ├── bicycles.php            # Bicycles category
# 🚴 Daraga Shop - Bicycle E-Commerce Platform

A full-stack e-commerce website for bicycles, repair tools, and cycling accessories. Built with PHP, MySQL, HTML5, CSS3, and JavaScript.

## 📋 Table of Contents

- [About](#about)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Project Structure](#project-structure)
- [Installation & Setup](#installation--setup)
- [Database Schema](#database-schema)
- [User Roles](#user-roles)
- [Key Pages](#key-pages)
- [Troubleshooting](#troubleshooting)
- [Security Notes](#security-notes)
- [Future Enhancements](#future-enhancements)
- [Contributors](#contributors)

## 🎯 About

Daraga Shop is an e-commerce platform created to sell bicycles, repair tools, and cycling accessories. It is intended for local development using XAMPP (Apache + MySQL) and demonstrates basic e-commerce flows and admin management.

## ✨ Features

- Product categories (City, Mountain, Road)
- Product detail pages with images
- Shopping cart with quantity and total
- Checkout and order placement
- User registration and login
- Admin panel for product, user and order management

## 🛠️ Technologies Used

- Backend: PHP 7+ (MySQLi)
- Database: MySQL
- Frontend: HTML5, CSS3, JavaScript
- Server: Apache (XAMPP)

## 📁 Project Structure

See the repository root for a full listing. Main folders:

- `user-panel/` — user-facing pages and templates
- `admin-panel/` — admin dashboard and management pages
- `user-validation/` — login/signup pages
- `BackEnd/` — server-side scripts and `db.php` (connection)
- `styles/` — `style.css` (user) and `AdminStyle.css` (admin)
- `js/` — client-side scripts
- `ddl.sql`, `dml.sql` — DB schema and sample data

## 💻 Installation & Setup

### Prerequisites
- XAMPP (Apache + MySQL)
- PHP 7.0+
- MySQL

### Steps

1. Place the project folder inside XAMPP's web root (for example `C:\xampp\htdocs\Daraga-shoping-website`).
2. Start Apache and MySQL using the XAMPP control panel.
3. Open phpMyAdmin at `http://localhost/phpmyadmin`.
4. Create a database named `daraga_shop` (or update `BackEnd/db.php` to match your DB name).
5. Import `ddl.sql` (schema) and `dml.sql` (sample data).
6. Visit the site:
   - User: `http://localhost/Daraga-shoping-website/user-panel/home.php`
   - Admin: `http://localhost/Daraga-shoping-website/admin-panel/adminHome.php`
   - Login: `http://localhost/Daraga-shoping-website/user-validation/index.php`

### Database connection
The project uses `BackEnd/db.php` for the DB connection. Current default values (development):

- host: `localhost`
- user: `root`
- password: `` (empty)
- database: `daraga_shop`

You can confirm/edit these in [BackEnd/db.php](BackEnd/db.php#L1-L20).

## 🗄️ Database Schema

Main tables: `users`, `products`, `orders`, `cart`. See `ddl.sql` for exact columns and constraints.

## 👥 User Roles

- Regular users: browse, add to cart, checkout, view orders.
- Admin users: manage products, orders, users and view dashboard stats.

**Default Admin Credentials (for development/testing only):**
- Email: `admin@daraga.com`
- Password: `admin`

## 📄 Key Pages

- `/user-panel/home.php` — homepage
- `/user-panel/bicycles.php` — bicycles category
- `/user-panel/itempage.php` — product detail
- `/user-panel/shopping-cart.php` — cart
- `/user-panel/checkout.php` — checkout
- `/admin-panel/adminHome.php` — admin dashboard

## 🛠️ Troubleshooting

- CSS changes not showing? Your browser may be caching the stylesheet. Perform a hard refresh (`Ctrl+F5`) or clear cached files.
- To prevent caching during development, append a query string to the stylesheet link, for example:

  `<link rel="stylesheet" href="../styles/style.css?v=1.0">`

  Increment the `v` value after updates (e.g. `?v=1.1`).
- Confirm the pages are loading the expected stylesheet:
  - User pages link `../styles/style.css` (check `user-panel/*.php`).
  - Admin pages use `../styles/AdminStyle.css` (check `admin-panel/*.php`).

## 🔐 Security Notes

- Hash passwords using `password_hash()` before storing in production.
- Use prepared statements (or parameterized queries) to avoid SQL injection.
- Add CSRF tokens for state-changing requests.
- Use HTTPS in production and proper error handling/logging.

## 🚀 Future Enhancements

- Payment gateway integration
- Email notifications and order receipts
- Product search, filtering, and pagination
- Mobile responsive improvements

## 👨‍💻 Contributors

Project developed as a student/team exercise in full-stack web development.

## 📞 Support

Open an issue in the repository or contact the maintainers.

---

**Last Updated:** December 31, 2025
