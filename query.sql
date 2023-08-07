-- Active: 1666468590274@@127.0.0.1@3306@gabsalabat
CREATE TABLE accounts (
    id bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name varchar(50) DEFAULT NULL,
    phone varchar(20) DEFAULT NULL,
    email varchar(50) DEFAULT NULL UNIQUE,
    email_verify_token varchar(100) DEFAULT NULL,
    email_verified_at datetime DEFAULT NULL,
    password varchar(255) NOT NULL,
    password_reset_token varchar(100) DEFAULT NULL,
    profile_photo_path varchar(1000) DEFAULT 'storage/default_image.png',
    account_role tinyint(1) DEFAULT 1,
    access_enabled tinyint(1) DEFAULT 1,
    created_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
    updated_at TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP() ON UPDATE CURRENT_TIMESTAMP()
);