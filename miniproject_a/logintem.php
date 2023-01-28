<?php
  if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $conn=new mysqli("localhost","root","","websitedb");
    if($conn->connect_error){
        die("Failed to connect :" .$con->connect_error);
    }else{
        $stmt =$conn->prepare("select *from registration where username=?");
        $stmt->bind_param("s",$username);
        $stmt->execute();
        $stmt_result=$stmt->get_result();
        $data =mysqli_fetch_assoc($stmt_result);
        
            
            if($data['password']==$password){
                echo"hii";
                header("location:book.html");
                exit();
            }else{
                echo'<script>alert("Invalid username/password")</script>';
                
            }
        
    }
  }
    ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login Form</title>
    <link rel="stylesheet" href="css/stylelog.css">
  </head>
  <body>
    <div class="center">
      <h1>Login</h1>
      <form action="" method="post">
        <div class="txt_field">
          <input type="text" name="username" required>
          <span></span>
          <label>Username</label>
        </div>
        <div class="txt_field">
          <input type="password" name="password" placeholder="" pattern="(?=.*\d)(?=.*[A-Z]).{8,}" title="must contain at least one number,one small character,one capital character,one special character" required>
          <span></span>
          <label>Enter your password</label>
        </div>
        <input type="submit" name="submit" value="Login">
        <div class="signup_link">
          Not a member? <a href="regformtem.php">register</a>
        </div>
      </form>
    </div>

  </body>
</html>
