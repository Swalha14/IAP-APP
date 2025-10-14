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
            <a href="signin.php">Already have an account? Log in</a>
        </form>
        <?php
    }
    

    private function submit_btn($value,$name)
    {
        ?>
        <button  class="btn btn-primary btn-lg"  type="submit" name="<?php echo $name;?>" value="<?php echo $value; ?>"><?php echo $value; ?></button>
        <?php
    }





   public function signin() {
        ?>
<h1>Sign In</h1>
<form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
          <?php $this->submit_btn("Sign In", "signin"); ?> 
          <a href="signup.php">Don't have an account? Sign up</a>
</form>
        <?php
    }
}

?>