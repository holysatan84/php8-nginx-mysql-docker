CREATE DATABASE IF NOT EXISTS `my-db`;
GRANT ALL ON `my-db`.* TO 'db_admin'@'%';

use `my-db`;

create table users
(
    id         int unsigned primary key auto_increment,
    email      varchar(225)      NOT NULL,
    full_name  varchar(255)      NOT NULL,
    is_active  boolean DEFAULT 0 NOT NULL,
    created_at datetime          NOT NULL,
    KEY is_active (is_active),
    UNIQUE KEY email (email)
);


create table invoices
(
    id      int unsigned PRIMARY KEY AUTO_INCREMENT,
    amount  decimal(10, 4),
    user_id int unsigned,
    FOREIGN KEY (user_id) REFERENCES users (id) ON DELETE SET NULL ON UPDATE CASCADE
);