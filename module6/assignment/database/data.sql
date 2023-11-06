-- INSERT CUSTOMERS
INSERT INTO `customers` (`customer_id`, `name`, `email`, `location`)
VALUES (1, 'Md. Rahman', 'rahman@gmail.com', 'Dhaka, Bangladesh'),
       (2, 'Fatima Akter', 'fatima@gmail.com', 'Chittagong, Bangladesh'),
       (3, 'Abdul Khan', 'abdul@gmail.com', 'Sylhet, Bangladesh'),
       (4, 'Nusrat Islam', 'nusrat@gmail.com', 'Khulna, Bangladesh'),
       (5, 'Taslima Begum', 'taslima@gmail.com', 'Rajshahi, Bangladesh'),
       (6, 'Hasan Ali', 'hasan@gmail.com', 'Barisal, Bangladesh'),
       (7, 'Ayesha Siddika', 'ayesha@gmail.com', 'Comilla, Bangladesh'),
       (8, 'Mahmudul Haque', 'mahmudul@gmail.com', 'Dinajpur, Bangladesh'),
       (9, 'Maliha Akhter', 'maliha@gmail.com', 'Jessore, Bangladesh'),
       (10, 'Rafiqul Islam', 'rafiqul@gmail.com', 'Narayanganj, Bangladesh');

-- INSERT CATEGORIES
INSERT INTO `categories` (`category_id`, `name`)
VALUES (1, 'Electronics'),
       (2, 'Clothing'),
       (3, 'Furniture'),
       (4, 'Books'),
       (5, 'Toys');

-- INSERT PRODUCTS
INSERT INTO `products` (`product_id`, `category_id`, `name`, `description`, `price`)
VALUES (1, 1, 'Smartphone', 'Latest model with high-resolution camera', 799.99),
       (2, 1, 'Laptop', 'Powerful laptop with SSD', 1299.99),
       (3, 1, 'Headphones', 'Over-ear headphones with noise-canceling', 149.99),
       (4, 2, 'T-Shirt', 'Cotton t-shirt with a classic design', 19.99),
       (5, 2, 'Jeans', 'Slim-fit denim jeans', 49.99),
       (6, 3, 'Sofa', 'Comfortable two-seater sofa', 599.99),
       (7, 3, 'Coffee Table', 'Modern glass coffee table', 129.99),
       (8, 3, 'Bed', 'Queen-size bed frame', 349.99),
       (9, 4, 'Mystery Novel', 'Best-selling mystery book', 12.99),
       (10, 4, 'Cookbook', 'Collection of delicious recipes', 24.99),
       (11, 5, 'Toy Car', 'Remote-controlled racing car', 34.99),
       (12, 5, 'Doll', 'Interactive talking doll', 29.99),
       (13, 1, 'Tablet', '10-inch Android tablet', 199.99),
       (14, 2, 'Dress', 'Elegant evening dress', 89.99),
       (15, 3, 'Dining Table', 'Wooden dining table for six', 399.99),
       (16, 4, 'Science Fiction Book', 'Classic sci-fi novel', 9.99),
       (17, 5, 'Board Game', 'Family board game', 19.99),
       (18, 1, 'Camera', 'High-quality digital camera', 549.99),
       (19, 2, 'Shoes', 'Running shoes with cushioning', 79.99),
       (20, 3, 'Bookshelf', 'Tall wooden bookshelf', 149.99),
       (21, 4, 'Fantasy Novel', 'Epic fantasy book', 14.99),
       (22, 5, 'LEGO Set', 'Creative building blocks set', 39.99),
       (23, 1, 'Smartwatch', 'Fitness and health tracker', 129.99),
       (24, 2, 'Jacket', 'Warm winter jacket', 99.99),
       (25, 3, 'Side Table', 'Small round side table', 39.99),
       (26, 4, 'Biography Book', 'Inspirational biography', 18.99),
       (27, 5, 'Puzzle', '1000-piece jigsaw puzzle', 24.99);

-- INSERT ORDERS
INSERT INTO `orders` (`order_id`, `customer_id`, `order_date`)
VALUES (1, 1, '2023-01-15'),
       (2, 2, '2023-01-16'),
       (3, 3, '2023-01-17'),
       (4, 1, '2023-01-18'),
       (5, 9, '2023-01-19'),
       (6, 6, '2023-01-20'),
       (7, 9, '2023-01-20');

-- INSERT ORDER ITEMS
INSERT INTO `order_items` (`order_item_id`, `order_id`, `product_id`, `quantity`, `unit_price`)
VALUES
-- Order 1
(1, 1, 1, 2, 799.99),
(2, 1, 3, 1, 149.99),

-- Order 2
(3, 2, 2, 3, 1299.99),

-- Order 3
(4, 3, 1, 1, 799.99),
(5, 3, 2, 2, 1299.99),

-- Order 4
(6, 4, 3, 2, 149.99),

-- Order 5
(7, 5, 1, 3, 799.99),
(8, 5, 2, 1, 1299.99),

-- Order 6
(9, 6, 3, 1, 149.99),
(10, 6, 1, 2, 799.99),
(11, 6, 17, 2, 19.99),
(12, 6, 18, 2, 549.99),

-- Order 7
(13, 7, 10, 2, 24.99);
