-- File Name: mysql.sql
--
-- File to restore database for chat application 
-- 
-- Author: suman Arora 
--
-- Start Date: 6th Sept 2016

CREATE DATABASE chat;

USE chat;

GRANT ALL PRIVILEGES ON chat.* to 'chat_user'@'localhost' IDENTIFIED BY 'Test@123'; 
GRANT ALL PRIVILEGES ON chat.* to 'chat_user'@'%' IDENTIFIED BY 'Test@123';

CREATE TABLE `users` (
`user_id` INTEGER AUTO_INCREMENT PRIMARY KEY,
`first_name` VARCHAR(30) NOT NULL DEFAULT '',
`last_name` VARCHAR(30) NOT NULL DEFAULT '',
`email` VARCHAR(50) NOT NULL DEFAULT '' UNIQUE,
`password` VARCHAR(300) NOT NULL DEFAULT '',
`profile_pic` VARCHAR(100) NULL,
`is_online` ENUM('1', '0') DEFAULT '0',
`created_on` DATETIME DEFAULT '0000-00-00 00:00:00' )ENGINE=InnoDB DEFAULT CHARSET=utf8;


CREATE TABLE `chat_log` (
`message_id` INTEGER AUTO_INCREMENT PRIMARY KEY ,
`from` INTEGER NOT NULL DEFAULT 0,
`to` INTEGER NOT NULL DEFAULT 0,
`message` TEXT ,
`time` DATETIME DEFAULT '0000-00-00 00:00:00'
)ENGINE=InnoDB DEFAULT CHARSET=utf8;