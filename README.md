# Product Microservice

This is a Laravel-based microservice for managing products. It provides endpoints to perform CRUD (Create, Read, Update, Delete) operations on products. Each product has the following attributes:
- ID (auto-incrementing integer)
- Name (string)
- Description (string)
- Price (decimal)
- Quantity (integer)

## Table of Contents
- [Installation](#installation)
- [Configuration](#configuration)
- [Database Migration](#database-migration)
- [Running the Application](#running-the-application)
- [API Endpoints](#api-endpoints)
- [Authentication](#authentication)
- [License](#license)

## Installation

1. **Clone the repository:**
   ```bash
   git clone https://github.com/Hanzla569/product-microservice.git
   cd product-microservice
   
## Install dependencies:
composer install

## Copy the example environment file and configure the environment variables:
cp .env.example .env

## Generate the application key:
php artisan key:generate


## Configure the .env file:
Set your database connection details.
Set the APP_URL to http://example.com or your local development URL.

## Configuratoin
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=assesment
DB_USERNAME=root
DB_PASSWORD=

JWT_SECRET=your_jwt_secret


## Generate a JWT secret key:

php artisan jwt:secret

## Database Migration
php artisan migrate

## Running the Application
php artisan serve

**Endpoints**
Authentication Endpoints
•	Register: POST /register
•	Login: POST /login

**Product Endpoints**
•	Get All Products: GET /products 
•	Get Product by ID: GET /products/{id}
•	Create Product: POST /products 
•	Update Product: PUT /products/{id} 
•	Delete Product: DELETE /products/{id}

**Authentication**

This microservice uses JWT (JSON Web Token) for authentication. All protected routes require a valid JWT token.
To authenticate, register or login to get an access token. Include this token in the Authorization header for all protected routes.


