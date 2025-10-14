<?php
/*
  Run using: php database/seeders.php
 */

require_once '../ClassAutoLoad.php'; 

echo " Starting database seeding...\n";

//users
$insert_user1 = $SQL->insert('users', [
    'username' => 'admin',
    'email' => 'admin@example.com',
    'password' => password_hash('Admin123', PASSWORD_DEFAULT),
    'is_verified' => 1
]);

$insert_user2 = $SQL->insert('users', [
    'username' => 'john_doe',
    'email' => 'john@example.com',
    'password' => password_hash('John2025', PASSWORD_DEFAULT),
    'is_verified' => 0
    ]);

if ($insert_user1 === TRUE && $insert_user2 === TRUE) {
    echo " Users seeded successfully. | ";
} else {
    echo " Error seeding users. | ";
}

//products
$insert_product1 = $SQL->insert('products', [
    'productName' => 'Laptop',
    'description' => '15-inch laptop with 16GB RAM and 512GB SSD',
    'price' => 1200.00,
    'quantity' => 10
]);

$insert_product2 = $SQL->insert('products', [
    'productName' => 'Wireless Mouse',
    'description' => 'Ergonomic wireless mouse',
    'price' => 25.50,
    'quantity' => 50
]);

if ($insert_product1 === TRUE && $insert_product2 === TRUE) {
    echo "Products seeded successfully. | ";
} else {
    echo " Error seeding products. | ";
}


$SQL->closeConnection();


