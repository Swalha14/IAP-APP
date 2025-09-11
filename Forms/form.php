<?php

class form
{
    public function signup()
    {
        ?>
        
        <form action="signup_process.php" method="post">
            <h2>Sign Up</h2>
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" required><br><br>
            
            <label for="email">Email:</label><br>
            <input type="email" id="email" name="email" required><br><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" required><br>
    
            
            <?php
             $this->submit_btn("Sign Up","signup"); 
             ?>
            <a href="./">Already have an account? Log in</a>
        </form>
        <?php
    }

    private function submit_btn($value,$name)
    {
        ?>
        <button type="submit" name="<?php echo $name;?>" value="<?php echo $value; ?>"><?php echo $value; ?></button>
        <?php
    }





    public function login() {
        ?>
        <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <br><br>
           <?php
             $this->submit_btn("Log In","login"); 
             ?>
            <a href="./">Don't have an account? Sign up</a>
        </form>
        <?php
    }
}

?>