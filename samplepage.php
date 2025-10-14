 <?php
require_once dirname(__FILE__) . DIRECTORY_SEPARATOR . 'ClassAutoLoad.php'; // Include the autoloader

// Set user data to insert
$user_data = [ 'id'=> '6','username' => 'Alice adam', 'email' => 'alice.adam@yahoo.com' , 'password' => password_hash('Alice2024', PASSWORD_BCRYPT) ];

// call the insert method
$insert_result = $SQL->insert('users', $user_data);


// Run the insert and show result
$insert_result = $SQL->insert('users', $user_data);


?>