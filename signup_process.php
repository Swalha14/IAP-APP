<?php
// Display errors 
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'ClassAutoLoad.php';  

if (isset($_POST['signup'])) {

    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

    //  validation 
    if (empty($username) || empty($email) || empty($password)) {
        die("All fields are required!");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Invalid email address.");
    }

    try {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);

        if ($stmt->rowCount() > 0) {
            die("This email is already registered. Please use another one.");
        }

        
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        //Insert into database
        $stmt = $conn->prepare("
            INSERT INTO users (username, email, password) 
            VALUES (:username, :email, :password)
        ");
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashedPassword
        ]);

        //  Prepare welcome email
        $mailContent = [
            'name_from'  => $conf['site_name'],
            'email_from' => $conf['smtp_user'],  
            'name_to'    => $username,
            'email_to'   => $email,
            'subject'    => 'Welcome to ' . $conf['site_name'].' - Account Verification', 
            'body'       => "Hello $username,<br><br>
                             Welcome to <b>{$conf['site_name']}</b>!<br>
                             Please verify your account by clicking the link below:<br>
                             <a href='http://yourdomain.com/verify.php?email=$email'>Verify My Account</a><br><br>
                             Regards,<br>{$conf['site_name']} Team"
        ];

        //  Send email 
        $ObjSendMail->Send_Mail($conf, $mailContent);

        echo "<p style='color:green;'>Registration successful! A welcome email has been sent to <b>$email</b>.</p>";

    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
} else {
    die("Invalid request.");
}
?>
