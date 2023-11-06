-- CREATE DATABASE

# CREATE DATABASE IF NOT EXISTS `ostad_real_life_business` COLLATE utf8mb4_general_ci;
# USE `ostad_real_life_business`;

-- STEP 1: CUSTOMERS TABLE
CREATE TABLE `customers`
(
    `customer_id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`        VARCHAR(255) NOT NULL,
    `email`       VARCHAR(255) NOT NULL UNIQUE,
    `location`    VARCHAR(255) NOT NULL,
    PRIMARY KEY (`customer_id`)
);

-- STEP 2: CATEGORIES TABLE
CREATE TABLE `categories`
(
    `category_id` SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
    `name`        VARCHAR(255)      NOT NULL,
    PRIMARY KEY (`category_id`)
);

-- STEP 3: PRODUCTS TABLE
CREATE TABLE `products`
(
    `product_id`  INT UNSIGNED          NOT NULL AUTO_INCREMENT,
    `category_id` SMALLINT UNSIGNED     NULL,
    `name`        VARCHAR(255)          NOT NULL,
    `description` TEXT                  NULL,
    `price`       FLOAT(10, 2) UNSIGNED NOT NULL,
    PRIMARY KEY (`product_id`),
    FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE RESTRICT ON UPDATE CASCADE
);


-- STEP 4: ORDERS TABLE
CREATE TABLE `orders`
(
    `order_id`     INT UNSIGNED          NOT NULL AUTO_INCREMENT,
    `customer_id`  INT UNSIGNED          NOT NULL,
    `order_date`   DATE                  NOT NULL,
#   `total_amount` FLOAT(10, 2) UNSIGNED NOT NULL, -- don't need
    PRIMARY KEY (`order_id`),
    FOREIGN KEY (`customer_id`) REFERENCES customers (`customer_id`) ON DELETE RESTRICT ON UPDATE CASCADE
);

-- STEP 5: ORDER_ITEMS TABLE
CREATE TABLE `order_items`
(
    `order_item_id` BIGINT UNSIGNED       NOT NULL AUTO_INCREMENT,
    `order_id`      INT UNSIGNED          NOT NULL,
    `product_id`    INT UNSIGNED          NOT NULL,
    `quantity`      SMALLINT UNSIGNED     NOT NULL,
    `unit_price`    FLOAT(10, 2) UNSIGNED NOT NULL,
    PRIMARY KEY (`order_item_id`),
    FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
    FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE RESTRICT ON UPDATE CASCADE
);
