<?php
    $name=$_POST['name'];
    $username=$_POST['username'];
    $email=$_POST['email'];
    $phonenumber=$_POST['phonenumber'];
    $password=$_POST['password'];
    $confirmpassword=$_POST['confirmpassword'];
    $conn=new mysqli("localhost","root","","websitedb");
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration(name, username, email, phonenumber, password, confirmpassword ) values (?,?,?,?,?,?)");
        $stmt->bind_param("ssssss",$name,$username,$email,$phonenumber,$password,$confirmpassword);
        $stmt->execute();
        if($_POST['submit']){
        ?>
        <?php
    }
        
        header("location:index.html");
        window.location="index.html";
        $stmt->close();
        $conn->close();
    }
?>