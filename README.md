# 🚴 Daraga Shop - Bicycle E-Commerce Platform

A modern, responsive e-commerce website for bicycles, repair tools, and cycling accessories. Built with HTML, CSS, and JavaScript, Daraga Shop provides a seamless shopping experience for cycling enthusiasts.

## 📋 Table of Contents

- [About](#about)
- [Features](#features)
- [Technologies Used](#technologies-used)
- [Project Structure](#project-structure)
- [Getting Started](#getting-started)
- [Pages Overview](#pages-overview)
- [File Structure](#file-structure)
- [Future Enhancements](#future-enhancements)
- [Contributors](#contributors)

## 🎯 About

Daraga Shop is an e-commerce platform designed by three Computer Science students passionate about technology and cycling. The project aims to create a comprehensive platform that serves cyclists by connecting them with everything they need — from bikes and repair tools to accessories and spare parts.

## ✨ Features

### 🛍️ Product Categories
- **Bicycles**: Mountain bikes, Road bikes, and City bikes
- **Repair Tools**: Multi-tools, tire repair kits, chain tools, and wrenches
- **Accessories**: Cycling accessories and spare parts

### 🎨 User Interface
- **Responsive Design**: Works seamlessly on desktop, tablet, and mobile devices
- **Modern UI/UX**: Clean, intuitive interface with smooth navigation
- **Interactive Elements**: Dropdown menus, shopping cart, notifications, and profile management
- **Category Organization**: Well-organized product categories with subcategories

### 🔐 User Features
- User authentication (Login/Signup)
- User profile management
- Shopping cart functionality (placeholder)
- Product browsing and filtering
- Order tracking (placeholder)
- Notification system (placeholder)

## 🛠️ Technologies Used

- **HTML5**: Semantic markup for structure
- **CSS3**: Modern styling with responsive design
- **JavaScript (Vanilla)**: Interactive functionality and navigation
- **No Framework Dependencies**: Pure vanilla implementation for fast loading

## 📁 Project Structure

```
web-development-project/
│
├── index.html              # Login page
├── signup.html             # User registration
├── home.html               # Homepage
├── bicycles.html           # Bicycles category page
├── repair.html             # Repair tools category page
├── profile.html            # User profile page
├── roadster-3000.html     # Product detail page (example)
│
├── bikes/                  # Bicycle subcategory pages
│   ├── mountain-bikes.html
│   ├── road-bikes.html
│   └── city-bikes.html
│
├── styles/
│   └── style.css           # Main stylesheet
│
├── js/
│   └── navigation.js       # Navigation and interactive features
│
└── images/
    ├── bikes/              # Bicycle product images
    │   ├── mountain/
    │   ├── road/
    │   └── city/
    ├── Tools/              # Repair tool images
    ├── branding/           # Logo and branding assets
    └── icons/              # UI icons (cart, profile, menu, etc.)
```

## 🚀 Getting Started

### Prerequisites
- A modern web browser (Chrome, Firefox, Safari, Edge)
- A local web server (optional, for development)

### Installation

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd web-development-project
   ```

2. **Open in browser**
   - Simply open `index.html` in your web browser
   - Or use a local server:
     ```bash
     # Using Python
     python -m http.server 8000
     
     # Using Node.js (http-server)
     npx http-server
     
     # Using PHP
     php -S localhost:8000
     ```

3. **Navigate to the application**
   - Open `http://localhost:8000` in your browser
   - Start from `index.html` (login page)

## 📄 Pages Overview

### Authentication Pages
- **`index.html`**: User login page with email and password authentication
- **`signup.html`**: New user registration page

### Main Pages
- **`home.html`**: Main homepage with featured products and categories
- **`bicycles.html`**: Bicycle category page with subcategories (Mountain, Road, City)
- **`repair.html`**: Repair tools category page with organized tool categories
- **`profile.html`**: User profile management page

### Product Pages
- **`roadster-3000.html`**: Example product detail page
- **`bikes/mountain-bikes.html`**: Mountain bikes subcategory
- **`bikes/road-bikes.html`**: Road bikes subcategory
- **`bikes/city-bikes.html`**: City bikes subcategory

## 🎨 Styling

The project uses a single comprehensive stylesheet (`styles/style.css`) that includes:
- Responsive grid layouts
- Modern card-based product displays
- Navigation menu styling
- Footer design
- Form styling
- Interactive element hover effects
- Mobile-responsive breakpoints

## 🔧 JavaScript Functionality

The `js/navigation.js` file handles:
- Mobile menu toggle
- Profile dropdown menu
- Shopping cart interactions (placeholder)
- Notification system (placeholder)
- Keyboard navigation (Escape key to close menus)
- Click-outside-to-close functionality

## 📦 Product Categories

### Bicycles
- **Mountain Bikes**: Trail-ready bicycles for off-road adventures
- **Road Bikes**: High-performance bikes for speed and efficiency
- **City Bikes**: Urban commuting and casual riding

### Repair Tools
- **Multi-Tools & Kits**: All-in-one repair solutions
- **Tire Repair Tools**: Puncture kits and tire levers
- **Chain & Wrench Tools**: Chain tools, brushes, and socket wrenches

## 🔮 Future Enhancements

The following features are planned for future development:
- [ ] Complete shopping cart functionality
- [ ] Payment integration
- [ ] Order management system
- [ ] Product search functionality
- [ ] Product filtering and sorting
- [ ] User reviews and ratings
- [ ] Wishlist/favorites feature
- [ ] Product comparison tool
- [ ] Backend API integration
- [ ] Database integration
- [ ] Admin dashboard
- [ ] Email notifications
- [ ] Social media integration

## 👥 Contributors

This project is developed by three Computer Science students passionate about technology and cycling.

## 📝 License

This project is created for educational purposes.

## 🙏 Acknowledgments

- Designed with ❤️ for cyclists
- Special thanks to the cycling community for inspiration

---

**Note**: This is a frontend-only implementation. Backend functionality (authentication, database, payment processing) would need to be implemented separately for a production-ready application.

