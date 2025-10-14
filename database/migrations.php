<?php
/*
  Run using: php database/migrations.php
 */

require_once '../ClassAutoLoad.php'; 

echo " Running migrations...\n";

// USERS TABLE
$create_users = $SQL->createTable('users', [
    'id' => 'INT(11) AUTO_INCREMENT PRIMARY KEY',
    'username' => 'VARCHAR(100) NOT NULL',
    'email' => 'VARCHAR(150) NOT NULL UNIQUE',
    'password' => 'VARCHAR(255) NOT NULL',
    'created_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP',
    'is_verified' => 'TINYINT(1) DEFAULT 0',
    'verification_code' => 'VARCHAR(64) DEFAULT NULL',
    'code_expires_at' => 'DATETIME DEFAULT NULL'
]);

if ($create_users === TRUE) {
    echo " Users table created successfully.\n";
} else {
    echo " Error creating users table: " . $create_users . "\n";
}


// PRODUCTS TABLE

$create_products = $SQL->createTable('products', [
    'id' => 'INT(11) AUTO_INCREMENT PRIMARY KEY',
    'product_name' => 'VARCHAR(150) NOT NULL',
    'description' => 'TEXT DEFAULT NULL',
    'price' => 'DECIMAL(10,2) NOT NULL DEFAULT 0.00',
    'quantity' => 'INT(11) NOT NULL DEFAULT 0',
    'created_at' => 'TIMESTAMP DEFAULT CURRENT_TIMESTAMP'
]);

if ($create_products === TRUE) {
    echo " Products table created successfully.\n";
} else {
    echo " Error creating products table: " . $create_products . "\n";
}

$SQL->closeConnection();

