<?php
$conn=new mysqli('localhost','root','','websitedb');
if(isset($_POST['SubmitButton']))
{
  $a=$_POST['username'];
  $b=$_POST['password'];
  $q1 =$conn->prepare("select *from admin where username=?");
        $q1->bind_param("s",$a);
        $q1->execute();
        $q1_result=$q1->get_result();
        $data=mysqli_fetch_assoc($q1_result);
            if($data['password']===$b){
              header("location:admin.php");
              exit();
            }else{
              header("location:adminlog.html");
            }
          }
  ?>