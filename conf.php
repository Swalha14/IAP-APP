<?php
// Site Information
$conf['site_name'] = 'Swalha Trial App';
$conf['site_url'] = 'http://localhost';
$conf['admin_email'] = 'admin@trialapp.com';

// Database Configuration
$conf['db_type'] = 'pdo';
$conf['db_host'] = 'localhost';
$conf['db_port'] = 3307;   // custom MariaDB port
$conf['db_user'] = 'root';
$conf['db_pass'] = 'Swalha2006';
$conf['db_name'] = 'nol';

// Site Language
$conf['site_lang'] = 'en';

// Email Configuration
$conf['mail_type'] = 'smtp';
$conf['smtp_host'] = 'smtp.gmail.com';
$conf['smtp_user'] = 'swalha.ahmed@strathmore.edu';
$conf['smtp_pass'] = ''; 
$conf['smtp_port'] = 465; // or 587
$conf['smtp_secure'] = 'ssl'; // or 'tls'

// Database Connection
try {
    $dsn = "mysql:host={$conf['db_host']};port={$conf['db_port']};dbname={$conf['db_name']};charset=utf8mb4";
    $conn = new PDO($dsn, $conf['db_user'], $conf['db_pass']);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>

