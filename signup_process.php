<?php
require_once 'ClassAutoLoad.php';   


if (isset($_POST['signup'])) {
    // Collect form data
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $password = $_POST['password'];

   
    if (empty($username) || empty($email) || empty($password)) {
        die("All fields are required!");
    }

    try {
        // Check if email already exists
        $stmt = $conn->prepare("SELECT id FROM users WHERE email = :email");
        $stmt->execute([':email' => $email]);

        if ($stmt->rowCount() > 0) {
            die("This email is already registered. Please use another one.");
        }

        
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insert into DB
        $stmt = $conn->prepare("INSERT INTO users (username, email, password) 
                                VALUES (:username, :email, :password)");
        $stmt->execute([
            ':username' => $username,
            ':email' => $email,
            ':password' => $hashedPassword
        ]);

        // Prepare welcome email
        $mailContent = [
            'name_from'  => $conf['site_name'],
            'email_from' => $conf['smtp_user'],  
            'name_to'    => $username,
            'email_to'   => $email,
            'subject'    => 'Welcome to ' . $conf['site_name'].' Account Verification!', 
            'body'       => "Hello $username,<br><br>
                             Welcome to <b>{$conf['site_name']}</b>!<br>
                             <p>You are recieving this email beacause you requested an account on Trial App.</p>
                             <p>In order to use this account you need to 
                            <a href='http://yourdomain.com/verify.php?email=$email'>Click Here</a> 
                            to complete the registration process.</p>
                                <p>If you did not request this account, please ignore this email.</p>
                             <br>
                             
                             Regards,<br>{$conf['site_name']} Team"
        ];

        
        $ObjSendMail->Send_Mail($conf, $mailContent);

        echo " Registration successful! A welcome email has been sent to $email";

    } catch (PDOException $e) {
        die("Database error: " . $e->getMessage());
    }
} else {
    die("Invalid request.");
}

