<?php
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
        if($stmt_result->num_rows>0){
            $data =$stmt_result->fetch_assoc();
            if($data['password']===$password){
                echo"hii";
                header("location:book.html");
            }else{
                echo'<script>alert("Invalid username/password")</script>';
                header("location:logintem.html");
            }
        }else{
            echo'<script>alert("Invalid username/password")</script>';
        }
    }