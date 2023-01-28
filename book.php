<?php
if (isset($_POST['submit'])) {
    
        
        
        $email = $_POST['email'];
        $quantity = $_POST['quantity'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $address=$_POST['address'];

        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "websitedb";

        $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Insert=$conn->prepare("INSERT INTO book(email,quantity,date,time,address) values(?,?,?,?,?)");
            $Insert->bind_param("sssss",$email,$quantity, $date, $time,$address);
             $Insert->execute();
             echo "<script>alert('New record inserted sucessfully.')</script>";
                
            }
            $conn->close();
        }
else {
    echo "Submit button is not set";
}
?>