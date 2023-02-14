-- input the sql into myphpadmin in blocks and it should work--
--block 1--
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS `u_210055728_stepcorrect` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `u_210055728_stepcorrect`;


CREATE TABLE `user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_firstname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_lastname` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_orders` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL

  
  
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci; 

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(10) COLLATE utf8mb4_unicode_ci NOT NULL
  `image` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE utf8mb4_general_ci; 
--block 1 end--
--block 2 make sure your in the database first before you execute the sql or itll go retarded--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY (`user_email`);

ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

ALTER TABLE `user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;
--block 2 end--
--block 3--
CREATE TABLE `cart` (
  `product_id` varchar(255)
)
--block 3 end--
--block 4--
CREATE TABLE `orders` (
  `user_id` int(10),
  `product_id` int(10),
  `product_name` varchar(500),
  `product_description` varchar(500),
  `product_price` varchar(500),
  `product_image` varchar(500)
)
--block 4 end--


