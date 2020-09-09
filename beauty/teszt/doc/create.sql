CREATE DATABASE `2mbeauty`;


CREATE TABLE IF NOT EXISTS `admin` (
   `id` INT AUTO_INCREMENT,
   `username` VARCHAR(20) NOT NULL UNIQUE,
   `password` VARCHAR(32) NOT NULL,
   `level` INT NOT NULL DEFAULT '1',
   PRIMARY KEY (`id`),
   UNIQUE KEY unique_username (username)
);

CREATE TABLE IF NOT EXISTS `costumer` (
   `id` INT AUTO_INCREMENT,
   `email` VARCHAR(120) NOT NULL UNIQUE,
   `name` VARCHAR(50) NOT NULL,
   `password` VARCHAR(32) NOT NULL,
   `tax_number` VARCHAR(40),
   PRIMARY KEY (`id`),
   UNIQUE KEY unique_email (email)
);

CREATE TABLE IF NOT EXISTS `address` (
   `id` INT AUTO_INCREMENT,
   `country` VARCHAR(30) NOT NULL,
   `city` VARCHAR(30) NOT NULL,
   `street` VARCHAR(30) NOT NULL,
   `hnumber` INT NOT NULL,
   `postal` INT NOT NULL,
   PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `costumeraddress` (
   `costumer` INT,
   `address` INT,
   `type` INT NOT NULL,
   `def` TINYINT(1) NOT NULL DEFAULT '0',
   PRIMARY KEY (`costumer`, `address`,`type`)
);

CREATE TABLE IF NOT EXISTS `type` (
   `id` INT AUTO_INCREMENT,
   `name` VARCHAR(30) NOT NULL,
   PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `log` (
   `id` INT AUTO_INCREMENT,
   `costumer` VARCHAR(50) NOT NULL,
   `level` VARCHAR(20) NOT NULL DEFAULT '1',
   `event` VARCHAR(40) NOT NULL,
   `dt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
   `comment` VARCHAR(80),
   PRIMARY KEY (`id`)
);

ALTER TABLE `costumeraddress` ADD CONSTRAINT `costumeraddress_fk_0_costumer` FOREIGN KEY (costumer) REFERENCES `costumer`(`id`) ;
ALTER TABLE `costumeraddress` ADD CONSTRAINT `costumeraddress_fk_0_address` FOREIGN KEY (address) REFERENCES `address`(`id`) ;
ALTER TABLE `costumeraddress` ADD CONSTRAINT `costumeraddress_fk_0_type` FOREIGN KEY (type) REFERENCES `type`(`id`) ;


INSERT INTO admin(username,password) VALUES('admin','21232f297a57a5a743894a0e4a801fc3');
INSERT INTO admin(username,password,level) VALUES('superadmin','21232f297a57a5a743894a0e4a801fc3',99);
INSERT INTO type(name) VALUES('Billing address');
INSERT INTO type(name) VALUES('Shipping address');
INSERT INTO costumer(email,name,password,tax_number) VALUES('test@test.com','Gipsz Jakab','21232f297a57a5a743894a0e4a801fc3','0');

INSERT INTO costumer(email,name,password,tax_number) VALUES('test2@test.com','test2','21232f297a57a5a743894a0e4a801fc3','1');
INSERT INTO address(country,city,street,hnumber,postal) VALUES('Hungary','Szeged','Apple str',3,6700);
INSERT INTO address(country,city,street,hnumber,postal) VALUES('Hungary','Budapest','Rainbow str',12,1100);
INSERT INTO costumeraddress(costumer,address,type,def) VALUES(1,1,1,1);
INSERT INTO costumeraddress(costumer,address,type,def) VALUES(1,2,2,1);