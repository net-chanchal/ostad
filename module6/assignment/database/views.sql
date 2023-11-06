-- Task 1: CREATE VIEW VIEW_CUSTOMER_TOTAL_ORDERS
DROP VIEW IF EXISTS `view_customer_total_orders`;

CREATE VIEW `view_customer_total_orders` AS
SELECT t1.*,
       COUNT(t2.`customer_id`) AS `total_orders`
FROM `customers` t1
         LEFT JOIN `orders` t2 ON t1.`customer_id` = t2.`customer_id`
GROUP BY t1.`customer_id`
ORDER BY `total_orders` DESC;

-- Task 2: CREATE VIEW VIEW_ORDER_ITEMS
DROP VIEW IF EXISTS `view_order_items`;

CREATE VIEW `view_order_items` AS
SELECT t2.`name`                         AS `product_name`,
       t1.`quantity`,
       (t1.`quantity` * t1.`unit_price`) AS total_amount
FROM order_items t1
         INNER JOIN `products` t2 ON t1.`product_id` = t2.`product_id`
ORDER BY t1.`order_id`;

-- Task 3: CREATE VIEW VIEW_CATEGORY_ORDER_REVENUES
DROP VIEW IF EXISTS `view_category_order_revenues`;

CREATE VIEW `view_category_order_revenues` AS
SELECT t1.`name`                                       AS `category_name`,
       IFNULL(SUM(t3.`quantity` * t3.`unit_price`), 0) AS `total_revenue`
FROM `categories` t1
         LEFT JOIN `products` t2 ON t1.`category_id` = t2.`category_id`
         LEFT JOIN `order_items` t3 ON t2.`product_id` = t3.`product_id`
GROUP BY t1.`name`
ORDER BY `total_revenue` DESC;

-- Task 4: CREATE VIEW VIEW_TOP_FIVE_PURCHASE_CUSTOMERS
DROP VIEW IF EXISTS `viw_top_five_purchase_customers`;

CREATE VIEW `viw_top_five_purchase_customers` AS
SELECT t1.`name`                            AS `customer_name`,
       SUM(t3.`quantity` * t3.`unit_price`) AS `total_purchase_amount`
FROM `customers` t1
         INNER JOIN `orders` t2 ON t1.`customer_id` = t2.`customer_id`
         INNER JOIN `order_items` t3 ON t2.`order_id` = t3.`order_id`
GROUP BY t1.`name`
ORDER BY `total_purchase_amount` DESC
LIMIT 5;
