
# Bulk Buy App Documentation

## Overview
The **Bulk Buy App** is a platform designed to facilitate collective purchasing, enabling users to buy products at wholesale prices. It provides a seamless experience across both mobile and web platforms. The app features essential functionalities like authentication, product browsing, order management, and transaction tracking.

---

## Stack
- **Frontend (Web):** HTML, CSS, JS
- **Backend:** PHP
- **Mobile:** React Native

---

## Documentation

---

### **1. Mobile App Documentation (React Native Developer Perspective)**

#### Features

1. **Authentication**
   - **Login:** Allows users to authenticate using their email and password. An API endpoint validates the credentials and returns a session token.
   - **Signup:** Enables new users to create an account with details such as name, email, and password.
   - **Forgot Password:** Users can initiate a password reset request. An email is sent via the backend API with a reset link or code.
   - **Reset Password:** Completes the password reset process using the token received.

2. **Product List**
   - Fetches the list of available products for purchase from the backend.
   - Displays product details like name, price per unit, total units, and remaining units.

3. **Profile**
   - Displays user details such as name, email, and profile picture.
   - Provides an option to edit profile information via an API call.

4. **Transaction History**
   - Fetches and displays a list of all successfully purchased products.
   - Includes details like product name, amount, and date of purchase.

5. **Order**
   - Allows users to place orders for a selected product.
   - Sends the order data (user ID, product ID, and quantity) to the backend for processing.

#### APIs Consumed
- `POST /api/login`: User authentication.
- `POST /api/signup`: User registration.
- `POST /api/forgot-password`: Request a password reset.
- `POST /api/reset-password`: Reset the user password.
- `GET /api/products`: Fetch the product list.
- `GET /api/profile`: Fetch user profile.
- `POST /api/profile`: Update user profile.
- `GET /api/transactions`: Fetch transaction history.
- `POST /api/order`: Place an order.

#### Key Notes for Mobile Developers
- Ensure proper error handling for all API calls.
- Implement loaders during API interactions for better UX.
- Use token-based authentication for secure API communication.

---

### **2. Backend Documentation (PHP Developer Perspective)**

#### Features

1. **Authentication**
   - **Login Endpoint:** Validates user credentials and generates a session token.
   - **Signup Endpoint:** Adds new user data to the database.
   - **Forgot Password Endpoint:** Generates a reset token and sends it via email.
   - **Reset Password Endpoint:** Updates the password upon token verification.

2. **Product Management**
   - **Get Product List Endpoint:** Returns a list of available products with details like price, total units, and remaining units.

3. **User Profile**
   - **Get Profile Endpoint:** Retrieves user information from the database.
   - **Update Profile Endpoint:** Updates user details (name, email, profile picture).

4. **Transaction History**
   - **Get Transactions Endpoint:** Fetches a list of completed purchases for a user.

5. **Order Management**
   - **Place Order Endpoint:** Processes and saves a user’s order to the database.

#### API Documentation

| Endpoint                  | Method | Description                         | Request Body                                                                                       | Response                                                                                       |
|---------------------------|--------|-------------------------------------|----------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------|
| `/api/login`              | POST   | Authenticates a user                | `{ "email": "user@example.com", "password": "123456" }`                                            | `{ "token": "abc123", "user": { "id": 1, "name": "John Doe" } }`                              |
| `/api/signup`             | POST   | Registers a new user                | `{ "name": "John Doe", "email": "user@example.com", "password": "123456" }`                        | `{ "message": "Account created successfully!" }`                                              |
| `/api/forgot-password`    | POST   | Initiates password reset            | `{ "email": "user@example.com" }`                                                                 | `{ "message": "Reset email sent!" }`                                                         |
| `/api/reset-password`     | POST   | Resets user password                | `{ "token": "resetToken123", "password": "newPassword123" }`                                       | `{ "message": "Password reset successfully!" }`                                               |
| `/api/products`           | GET    | Retrieves product list              | None                                                                                              | `[ { "id": 1, "name": "Bag of Rice", "price": 2000, "units_available": 30 } ]`                |
| `/api/profile`            | GET    | Fetches user profile                | `{ "user_id": 1 }`                                                                                | `{ "name": "John Doe", "email": "user@example.com", "profile_picture": "profile.jpg" }`       |
| `/api/profile`            | POST   | Updates user profile                | `{ "name": "John Updated", "email": "newuser@example.com" }`                                       | `{ "message": "Profile updated successfully!" }`                                              |
| `/api/transactions`       | GET    | Fetches transaction history         | `{ "user_id": 1 }`                                                                                | `[ { "id": 1, "product_name": "Bag of Rice", "amount": 2000, "date": "2024-12-01" } ]`        |
| `/api/order`              | POST   | Places an order                     | `{ "user_id": 1, "product_id": 1, "quantity": 2 }`                                                | `{ "message": "Order placed successfully!" }`                                                 |

#### Key Notes for Backend Developers
- Secure all endpoints using token-based authentication.
- Validate all incoming requests to prevent SQL injection or data inconsistencies.
- Use proper error codes (e.g., `401` for unauthorized, `400` for bad request) and descriptive error messages.

### **2. Frontend Documentation (Front End Developer Perspective)**
# Bulk Buy App - README

## Contributors

### Ikechi Emmanuel Chiemela
As a dedicated team member, I contributed to the development of the following key components:

- **Dashboard:** Designed and implemented the user interface, ensuring a seamless experience for users to monitor activities.
- **Product Page:** Developed the product display functionality to showcase available items for collective purchase.
- **Authentication Pages:**
  - **Login:** Collaborated with Iyoke Heritage to create a secure and user-friendly login system.
  - **Signup:** Partnered with Iyoke Heritage to implement a smooth registration process for new users.
  - **Landing Page:** Worked with Iyoke Heritage to design and structure the landing page, emphasizing the app's purpose and usability.

### Iyoke Heritage
Iyoke Heritage played an integral role in the development of key features, including:

- **Profile Page:** Developed the interface to display user information and allow updates.
- **Order History:** Designed and implemented the section for users to view their purchase history.
- **Admin Page:** Created functionality to manage backend operations effectively.
- **Authentication Pages:**
  - **Login:** Partnered with Ikechi Emmanuel to create a secure and intuitive login system.
  - **Signup:** Collaborated with Ikechi Emmanuel to build the registration functionality.
  - **Landing Page:** Co-designed and structured the app's landing page alongside Ikechi Emmanuel.

### Oyelowo Azeezat Boluwatife
Oyelowo Azeezat Boluwatife contributed to the project by working on:

- **reset Password Page:** Designed and implemented a user-friendly interface for password recovery, ensuring seamless functionality.

### Akachukwu Emmanuel
Akachukwu Emmanuel made valuable contributions by developing:

- **FAQ Section:** Created a comprehensive Frequently Asked Questions page to assist users with common inquiries.

## Tech Stack
- **Frontend Development:** HTML, CSS, and JavaScript

This app is the result of collaborative efforts, with each contributor focusing on creating a seamless and engaging user experience.

---

This documentation ensures clarity for both the **mobile** and **backend** developers, allowing each team to focus on their responsibilities while maintaining seamless integration.
"""
=======
# BULK-BUY

Product Page Documentationp
Overview
This product page is designed for a bulk-buying app where university students can collectively contribute to bulk purchases of essential goods. The goal of the page is to present products in a user-friendly manner, enabling users to easily view, search, and add items to their cart.
Page Components
1. Header:
- Back Button: Allows users to navigate back to the previous page.
- Title: Displays 'Products' to indicate the current page.
- Status Bar: Shows the time, network signal, battery level, and notifications.
2. Search Bar:
- Positioned below the header.
- Allows users to search for specific products by entering keywords.
- Includes a 'Search' button for initiating the search process.
3. Product Grid:
- Products are displayed in a grid format for easy viewing.
- Each product is represented by:
  - Image: A clear visual of the product.
  - Name: The product's name (e.g., 'Bag of Rice,' 'Gallon of Oil').
  - Price: Displayed in Nigerian Naira (₦ or #) to show the cost of each product.
  - Quantity Selector: A '+' and '-' button to increase or decrease the quantity.
  - Add to Cart Button: Allows users to add selected quantities to their cart.
4. Product Categories:
- Staple Foods: Items such as rice, garri, beans, and palm oil are listed.
- Packaged Foods: Includes products like instant noodles.
5. Footer Navigation Bar:
- Home Icon: Redirects users to the home page.
- Cart Icon: Provides access to the cart for reviewing selected products.
- Calendar Icon: Could potentially display bulk-buy schedules or deadlines.
- Profile Icon: Leads to the user’s profile page.
User Flow
1. Browsing Products: Users can scroll through the grid to view available items.
2. Searching: Users can enter product names in the search bar for quick access.
3. Adding to Cart: Users can adjust quantities and add products to their cart using the 'Add to Cart' button.
4. Navigation: Users can navigate to other sections of the app using the footer icons.
User Experience (UX) Considerations
- Accessibility: Large buttons and clear fonts make navigation easy.
- Visual Hierarchy: Product images and prices are prominent for quick decision-making.
- Efficiency: Quantity selectors and the search bar streamline the purchasing process.
Future Enhancements
- Filtering Options: Add filters for categories, price range, and availability.
- Product Descriptions: Include detailed product descriptions for better understanding.
- Wishlist Feature: Allow users to save items for future bulk-buy campaigns.

# Save the documentation to a .md file
documentation = """
# Bulk Buy App Documentation

## Overview
The **Bulk Buy App** is a platform designed to facilitate collective purchasing, enabling users to buy products at wholesale prices. It provides a seamless experience across both mobile and web platforms. The app features essential functionalities like authentication, product browsing, order management, and transaction tracking.

---

## Stack
- **Frontend (Web):** HTML, CSS
- **Backend:** PHP
- **Mobile:** React Native

---

## Documentation

---

### **1. Mobile App Documentation (React Native Developer Perspective)**

#### Features

1. **Authentication**
   - **Login:** Allows users to authenticate using their email and password. An API endpoint validates the credentials and returns a session token.
   - **Signup:** Enables new users to create an account with details such as name, email, and password.
   - **Forgot Password:** Users can initiate a password reset request. An email is sent via the backend API with a reset link or code.
   - **Reset Password:** Completes the password reset process using the token received.

2. **Product List**
   - Fetches the list of available products for purchase from the backend.
   - Displays product details like name, price per unit, total units, and remaining units.

3. **Profile**
   - Displays user details such as name, email, and profile picture.
   - Provides an option to edit profile information via an API call.

4. **Transaction History**
   - Fetches and displays a list of all successfully purchased products.
   - Includes details like product name, amount, and date of purchase.

5. **Order**
   - Allows users to place orders for a selected product.
   - Sends the order data (user ID, product ID, and quantity) to the backend for processing.

#### APIs Consumed
- `POST /api/login`: User authentication.
- `POST /api/signup`: User registration.
- `POST /api/forgot-password`: Request a password reset.
- `POST /api/reset-password`: Reset the user password.
- `GET /api/products`: Fetch the product list.
- `GET /api/profile`: Fetch user profile.
- `POST /api/profile`: Update user profile.
- `GET /api/transactions`: Fetch transaction history.
- `POST /api/order`: Place an order.

#### Key Notes for Mobile Developers
- Ensure proper error handling for all API calls.
- Implement loaders during API interactions for better UX.
- Use token-based authentication for secure API communication.

---

### **2. Backend Documentation (PHP Developer Perspective)**

#### Features

1. **Authentication**
   - **Login Endpoint:** Validates user credentials and generates a session token.
   - **Signup Endpoint:** Adds new user data to the database.
   - **Forgot Password Endpoint:** Generates a reset token and sends it via email.
   - **Reset Password Endpoint:** Updates the password upon token verification.

2. **Product Management**
   - **Get Product List Endpoint:** Returns a list of available products with details like price, total units, and remaining units.

3. **User Profile**
   - **Get Profile Endpoint:** Retrieves user information from the database.
   - **Update Profile Endpoint:** Updates user details (name, email, profile picture).

4. **Transaction History**
   - **Get Transactions Endpoint:** Fetches a list of completed purchases for a user.

5. **Order Management**
   - **Place Order Endpoint:** Processes and saves a user’s order to the database.

#### API Documentation

| Endpoint                  | Method | Description                         | Request Body                                                                                       | Response                                                                                       |
|---------------------------|--------|-------------------------------------|----------------------------------------------------------------------------------------------------|-----------------------------------------------------------------------------------------------|
| `/api/login`              | POST   | Authenticates a user                | `{ "email": "user@example.com", "password": "123456" }`                                            | `{ "token": "abc123", "user": { "id": 1, "name": "John Doe" } }`                              |
| `/api/signup`             | POST   | Registers a new user                | `{ "name": "John Doe", "email": "user@example.com", "password": "123456" }`                        | `{ "message": "Account created successfully!" }`                                              |
| `/api/forgot-password`    | POST   | Initiates password reset            | `{ "email": "user@example.com" }`                                                                 | `{ "message": "Reset email sent!" }`                                                         |
| `/api/reset-password`     | POST   | Resets user password                | `{ "token": "resetToken123", "password": "newPassword123" }`                                       | `{ "message": "Password reset successfully!" }`                                               |
| `/api/products`           | GET    | Retrieves product list              | None                                                                                              | `[ { "id": 1, "name": "Bag of Rice", "price": 2000, "units_available": 30 } ]`                |
| `/api/profile`            | GET    | Fetches user profile                | `{ "user_id": 1 }`                                                                                | `{ "name": "John Doe", "email": "user@example.com", "profile_picture": "profile.jpg" }`       |
| `/api/profile`            | POST   | Updates user profile                | `{ "name": "John Updated", "email": "newuser@example.com" }`                                       | `{ "message": "Profile updated successfully!" }`                                              |
| `/api/transactions`       | GET    | Fetches transaction history         | `{ "user_id": 1 }`                                                                                | `[ { "id": 1, "product_name": "Bag of Rice", "amount": 2000, "date": "2024-12-01" } ]`        |
| `/api/order`              | POST   | Places an order                     | `{ "user_id": 1, "product_id": 1, "quantity": 2 }`                                                | `{ "message": "Order placed successfully!" }`                                                 |

#### Key Notes for Backend Developers
- Secure all endpoints using token-based authentication.
- Validate all incoming requests to prevent SQL injection or data inconsistencies.
- Use proper error codes (e.g., `401` for unauthorized, `400` for bad request) and descriptive error messages.

---

This documentation ensures clarity for both the **mobile** and **backend** developers, allowing each team to focus on their responsibilities while maintaining seamless integration.
"""


