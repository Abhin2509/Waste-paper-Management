<?php
$conn=new mysqli('localhost','root','','websitedb');
$a=$_POST['email'];
$b=$_POST['quantity'];
$c=$_POST['date'];
$d=$_POST['time'];
$q1=$conn->prepare("select *from book where email=? and quantity=? and date=? and time=?");
$query1=$conn->prepare("update book set status=-1 where sno=?");
$q1->bind_param("ssss",$a,$b,$c,$d);
$q1->execute();
$q2=$q1->get_result();
$res=mysqli_fetch_assoc($q2);
 $query1->bind_param("i",$res['sno']);
  $query1->execute();
$to_email=$res['email'];
$subject="Email From Waste Paper Management";
$body="Sorry,your request was Rejected";
$headers="From:wpsa10456@gmail.com";
if(mail($to_email,$subject,$body,$headers)){
  echo"email successsfully send $to_email ..";
}else{
  echo "email failed $to_email";
}
echo "Your Request Has been Rejected";
  echo'<script>alert("rejected request")</script>';
  header("location:admin.php");
  ?>