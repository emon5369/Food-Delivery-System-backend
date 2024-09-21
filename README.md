# 🍽️ Food Delivery System Backend

This repository contains the backend code for the Food Delivery System, a web-based application that streamlines online food ordering. The backend is built using **PHP** and handles server-side logic such as user authentication, managing food items, orders, and communication with the MySQL database.

## 🚀 Features

- **User Management:** Handles user sign-up, sign-in, and profile management.
- **Food Category & Items Management:** Allows admin to manage food categories and items.
- **Order Processing:** Handles food order updates.
- **Admin Control Panel:** Admins can add, update, and delete food categories, items, and manage orders.

## 🛠 Technologies Used

- **Backend:**
  - PHP
  - MySQL for database management

- **Frontend(Separate Repository):**
  - React
  - React Router DOM
  - Font Awesome for icons
  - Vite for development/build setup

## 🛑 Prerequisites

Before running the backend, ensure you have the following:

- PHP installed on your server (e.g., XAMPP, WAMP)
- MySQL installed and running

## 📝 Setup Instructions

### 1. Clone the Backend Repository
```bash
git clone https://github.com/your-username/food-delivery-backend.git
```

### 2. Set Up Database

1. **Create a MySQL Database:**
   - Open your MySQL server (via XAMPP, WAMP, etc.).
   - Create a new database.
   
2. **Import SQL File:**
   - Import the `food-order.sql` file located in this repository into your MySQL database.

3. **Update `config.php`:**
   - Open the `config.php` file and configure it with your MySQL credentials:
     ```php
     <?php
     $servername = "localhost";
     $username = "your-username";
     $password = "your-password";
     $dbname = "your-database-name";
     ?>
     ```

### 3. Deploy PHP Files

- Place the backend folder on your local or remote server (e.g., XAMPP `htdocs` or a remote server).
- Rename this folder to reactphp to match server configurations or paths
- Ensure PHP and MySQL are running properly.

### 4. Run the Backend

Start your local server, and the backend should now be running, ready to handle API requests from the frontend.

## 💡 Frontend Repository

The frontend of this project, built with **React**, is available in a separate repository:

- [Frontend Repository](https://github.com/emon5369/Food-Delivery-System-frontend) 


## 🔧 Future Improvements

- **Real-time Updates:** Implement real-time order status updates using WebSockets or similar technologies.
- **Enhanced Security:** Add OAuth or JWT for enhanced user authentication.
- **Performance Optimization:** Implement database indexing and query optimization for large datasets.
---
