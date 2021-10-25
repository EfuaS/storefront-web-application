
CREATE TABLE `salestable` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `products` varchar(200) NOT NULL,
  `total_price` DOUBLE NOT NULL,
  `cash_in` DOUBLE NOT NULL,
  `user_id` INT(11) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp(),
  foreign key `user_id` references `usertable`(`user_id`)
)

CREATE TABLE `usertable` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(200) NOT NULL,
  `telephone` varchar(12) NOT NULL,
  `email` varchar(50) UNIQUE NOT NULL,
  `business_name` VARCHAR(100) NOT NULL,
  `tax_number` int(30) NOT NULL,
  `registration_number` int(30) NOT NULL,
  `digital_address` varchar(30) NOT NULL,
  `password_first` varchar(255) NOT NULL,
  `password_conf` varchar(255) NOT NULL
) 

CREATE TABLE `admin` (
  `username` varchar(225) UNIQUE,
  `password` varchar(225)
)

INSERT INTO   `admin` ('kwekuosebo@storefront.com','789456'),('yolo@storefront.com','147852');



