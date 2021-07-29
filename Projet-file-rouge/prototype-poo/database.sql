CREATE SCHEMA `product` ;
USE product;

CREATE TABLE `product`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `productname` VARCHAR(45) NULL,
  `productcolor` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

INSERT INTO `product`.`products` (`id`, `productname`, `productcolor`) VALUES ('1', 'reda', 'gold');
INSERT INTO `product`.`products` (`productname`, `productcolor`) VALUES ('jaafar', 'black');
INSERT INTO `product`.`products` (`productname`, `productcolor`) VALUES ('asmae', 'yellow');
