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
│   ├── repair.php              # Repair tools category
│   ├── accessories.php         # Accessories category
│   ├── itempage.php            # Product detail page
│   ├── shopping-cart.php       # Shopping cart
│   ├── checkout.php            # Order checkout
│   ├── orders.php              # Order history
│   ├── About-Us.php            # About page
│   ├── header.php              # Reusable header
│   └── footer.php              # Reusable footer
│
├── admin-panel/                # Admin pages
│   ├── adminHome.php           # Admin dashboard
│   ├── adminProducts.php       # Product management
│   ├── adminOrders.php         # Order management
│   ├── adminUsers.php          # User management
│   └── header-admin.php        # Admin header
│
├── user-validation/            # Authentication pages
│   ├── index.php               # Login page
│   ├── signup.php              # Registration page
│   ├── header-validation.php   # Validation header
│   └── footer.php              # Validation footer
│
├── BackEnd/                    # Backend logic
│   ├── db.php                  # Database connection
│   ├── validation.php          # Login/signup validation
│   ├── add_product.php         # Add product logic
│   ├── add_to_cart.php         # Add to cart logic
│   ├── remove_item.php         # Remove from cart
│   ├── place_order.php         # Place order logic
│   ├── delete_product.php      # Delete product
│   ├── delete_user.php         # Delete user
│   ├── logout.php              # Logout logic
│   └── admin.php               # Admin functions
│
├── styles/                     # Stylesheets
│   ├── style.css               # Main user styles
│   └── AdminStyle.css          # Admin panel styles
│
├── js/                         # JavaScript files
│   ├── navigation.js           # User navigation functions
│   └── AdminScript.js          # Admin navigation scripts
│
├── images/                     # Product images
│   ├── bikes/                  # Bicycle images
│   │   ├── city/
│   │   ├── mountain/
│   │   └── road/
│   ├── Tools/                  # Repair tools images
│   ├── accessories/            # Accessories images
│   └── branding/               # Logo and branding
│
├── ddl.sql                     # Database schema
├── dml.sql                     # Sample data
└── README.md                   # This file
```

## 💻 Installation & Setup

### Prerequisites
- XAMPP (Apache, MySQL, PHP)
- PHP 7.0+
- MySQL 5.7+
- Modern web browser

### Steps

1. **Clone Repository**
   ```bash
   cd C:\xampp\htdocs
   git clone <repository-url>
   cd Daraga-shoping-website
   ```

2. **Create Database**
   - Open phpMyAdmin: `http://localhost/phpmyadmin`
   - Create new database: `daraga_shop`
   - Import `ddl.sql` for schema
   - Import `dml.sql` for sample data

3. **Start XAMPP**
   - Start Apache and MySQL services

4. **Access the Website**
   - User Site: `http://localhost/Daraga-shoping-website/user-panel/home.php`
   - Admin Panel: `http://localhost/Daraga-shoping-website/admin-panel/adminHome.php`
   - Login: `http://localhost/Daraga-shoping-website/user-validation/index.php`

## 🗄️ Database Schema

### Users Table
- `user_id` (INT, Primary Key)
- `username` (VARCHAR 100, Unique)
- `email` (VARCHAR 150, Unique)
- `password` (VARCHAR 255)

### Products Table
- `id` (INT, Primary Key)
- `name` (VARCHAR 255)
- `price` (DECIMAL 10,2)
- `details` (TEXT)
- `image` (VARCHAR 255)
- `category` (VARCHAR 100)

### Orders Table
- `id` (INT, Primary Key)
- `user_id` (INT, Foreign Key)
- `name` (VARCHAR 255)
- `email` (VARCHAR 255)
- `phone` (VARCHAR 20)
- `address` (TEXT)
- `city` (VARCHAR 100)
- `payment_method` (VARCHAR 50)
- `total_price` (DECIMAL 10,2)
- `status` (VARCHAR 50)
- `placed_on` (DATETIME)

### Cart Table
- `id` (INT, Primary Key)
- `user_id` (INT, Foreign Key)
- `product_id` (INT, Foreign Key)
- `name` (VARCHAR 255)
- `price` (DECIMAL 10,2)
- `image` (VARCHAR 255)
- `category` (VARCHAR 100)
- `quantity` (INT)

## 👥 User Roles

### Regular User
- Register and login
- Browse products
- Add items to cart
- Place orders
- View order history

### Admin User
- Manage products (Create, Read, Update, Delete)
- Manage users
- Manage orders and update status
- View dashboard statistics

**Default Admin Credentials:**
- Email: `admin@daraga.com`
- Password: `admin`

## 📄 Key Pages

| Page | URL | Description |
|------|-----|-------------|
| Home | `/user-panel/home.php` | Homepage with categories |
| Bicycles | `/user-panel/bicycles.php` | Browse bicycles |
| Repair Tools | `/user-panel/repair.php` | Browse repair tools |
| Accessories | `/user-panel/accessories.php` | Browse accessories |
| Product Detail | `/user-panel/itempage.php` | Product information |
| Shopping Cart | `/user-panel/shopping-cart.php` | View cart items |
| Checkout | `/user-panel/checkout.php` | Order checkout |
| Orders | `/user-panel/orders.php` | Order history |
| Login | `/user-validation/index.php` | User login |
| Sign Up | `/user-validation/signup.php` | User registration |
| Admin Home | `/admin-panel/adminHome.php` | Admin dashboard |
| Admin Products | `/admin-panel/adminProducts.php` | Manage products |
| Admin Orders | `/admin-panel/adminOrders.php` | Manage orders |
| Admin Users | `/admin-panel/adminUsers.php` | Manage users |

## 🔐 Security Notes

- Passwords should be hashed using `password_hash()` in production
- Use prepared statements to prevent SQL injection
- Implement CSRF protection tokens
- Validate all user inputs server-side
- Use HTTPS in production
- Implement proper error logging

## 🚀 Future Enhancements

- [ ] Email notifications for orders
- [ ] Payment gateway integration (Stripe, PayPal)
- [ ] Product search and filtering
- [ ] Product ratings and reviews
- [ ] Wishlist functionality
- [ ] Mobile responsive design
- [ ] API documentation
- [ ] Automated testing
- [ ] Password hashing implementation
- [ ] Two-factor authentication

## 👨‍💻 Contributors

Developed by three Computer Science students:
- Focus on e-commerce platform design
- Team collaboration and development
- Database design and implementation

## 📞 Support

For questions or issues, please create an issue in the repository.

---

**Last Updated:** December 2024
