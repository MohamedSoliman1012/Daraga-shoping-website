# 🚴 Daraga Shop - Bicycle E-Commerce Platform

A modern e-commerce website for bicycles, repair tools, and cycling accessories. Built with HTML, CSS, and JavaScript, Daraga Shop provides a seamless shopping experience for cycling enthusiasts.

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
- **Desktop Optimized**: Designed for optimal desktop viewing experience (1200px width)
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
- **CSS3**: Modern styling with fixed-width layout
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
   # 🚴 Daraga Shop (Daraga-shopping-website)

   Static, client-side website for a bicycle e-commerce demo. This repository contains user-facing pages, an admin panel, assets, styles, and scripts. It is intended as a front-end prototype — backend services (authentication, database, payments) are not included.

   **Quick preview:** serve the repository root with a static server and open the user or admin pages in your browser.

   **Recommended (Python)**:

   ```
   cd c:\Users\moham\Documents\GitHub\web-development-project
   python -m http.server 8000

   # then open http://localhost:8000/user-panel/home.html
   ```

   **Repository layout (important files & folders):**

   - `user-panel/` : User-facing pages
      - `home.html`, `bicycles.html`, `accessories.html`, `itempage.html`, `shopping-cart.html`, `checkout.html`, `orders.html`, `repair.html`, `About-Us.html`
   - `admin-panel/` : Admin static pages
      - `adminHome.html`, `adminProducts.html`, `adminOrders.html`, `adminUsers.html`
   - `user-validation/` : Login & signup pages
      - `index.html` (login), `signup.html`
   - `styles/` : Stylesheets (`style.css`, `AdminStyle.css`)
   - `js/` : JavaScript files (`navigation.js`, `AdminScript.js`)
   - `images/` : Asset images (organized under `bikes/` then `city/`, `mountain/`, `road/`, plus `branding/`, `category`)
   - `colors/` : `colors.txt` (color references)
   - `ddl.sql` : Database DDL (schema) — reference if you add a backend

   **What this project provides**

   - A static user interface for browsing bicycles and accessories.
   - An admin panel with static pages for managing products, orders, and users (UI only).
   - Local assets (images, CSS, JS) to support UI interactions and navigation.

   **How to use**

   - Start a static server in the repository root (Python example above) and navigate to:
      - `http://localhost:8000/user-panel/home.html` — user site
      - `http://localhost:8000/admin-panel/adminHome.html` — admin panel
   - Alternatively, open individual HTML files directly in the browser, but some JavaScript behaviors or fetches may require serving over HTTP.

   **Notes about structure differences**

   - Authentication pages are in `user-validation/` (not at repo root). Use those to preview login/signup UI.
   - The site is front-end only — actions such as checkout, order submission, and user authentication are placeholders and will require a backend to work in production.

   **Extending the project (suggested next steps)**

   - Add a backend API (Node/Express, Flask, Django, etc.) and connect the front-end to persistent storage. Use `ddl.sql` to create the initial database schema.
   - Implement authentication (sessions/JWT) and protect admin routes.
   - Persist shopping cart and orders in a database, integrate a payment gateway, and add server-side validation.

   **Contributing**

   - Fork the repository and submit a pull request. Describe the change and list which pages/assets you updated.

   **License & contact**

   - No license file is included. Add a `LICENSE` if you want to publish with a specific open-source license.
   - Repository owner: `MohamedSoliman1012` on GitHub.

   ---

   If you'd like, I can also:

   - Run a quick local server and verify that `user-panel/home.html` and `admin-panel/adminHome.html` render correctly in a browser snapshot.
   - Add brief usage notes to specific pages (e.g., where to edit product lists or images).
- [ ] Payment integration

