-- live_test1.sql
-- I have used 3 table from assignment for solving 2 tasks.

-- STEP 1: CUSTOMERS TABLE
# CREATE TABLE `customers`
# (
#     `customer_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
#     `name`        VARCHAR(255) NOT NULL,
#     `email`       VARCHAR(255) NOT NULL UNIQUE,
#     `location`    VARCHAR(255) NOT NULL,
#     PRIMARY KEY (`customer_id`)
# );

-- STEP 2: CATEGORIES TABLE
# CREATE TABLE `categories`
# (
#     `category_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
#     `name`        VARCHAR(255)      NOT NULL,
#     PRIMARY KEY (`category_id`)
# );

-- STEP 3: PRODUCTS TABLE
# CREATE TABLE `products`
# (
#     `product_id`  INT UNSIGNED          NOT NULL AUTO_INCREMENT,
#     `category_id` SMALLINT UNSIGNED     NULL,
#     `name`        VARCHAR(255)          NOT NULL,
#     `description` TEXT                  NULL,
#     `price`       FLOAT(10, 2) UNSIGNED NOT NULL,
#     PRIMARY KEY (`product_id`),
#     FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE RESTRICT ON UPDATE CASCADE
# );


-- Task 1:
-- Write a SQL query to retrieve all the orders from the 'orders' table and their corresponding customer names from
-- the 'customers' table. Use an INNER JOIN to combine the tables.
SELECT t1.*,
       t2.`name` AS `customer_name`
FROM `orders` t1
         INNER JOIN `customers` t2 ON t1.`customer_id` = t2.`customer_id`;

-- Task 2:
-- Write a SQL query to retrieve all the products from the 'products' table and their corresponding category names from
-- the 'categories' table. Use a LEFT JOIN to combine the tables and include all products, even if they don't have a category.
SELECT t1.*,
       t2.`name` AS `category_name`
FROM `products` t1
         LEFT JOIN `categories` t2 ON t1.`category_id` = t2.`category_id`;
