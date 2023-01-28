$sid=$_POST['username'];
$password=$_POST['Password'];
$conn=new mysqli("localhost","root","","wesitedb");
$stmt=$conn->prepare("select *from student where username=? and password=?");
$stmt->bind_param("ss",$username,$password);
$stmt->execute();
$r=$stmt->get_result();
if($r->num_rows>0)
{
	$data=$r->fetch_assoc();
	if($data['password'] === $password)
	{
		
		?>
		</html>
			TRUE CASE CODE___ HERE___
</html>

<?php
	}
	else{
		echo'<script>alert("invalid username/password")</script>';
	}
	
}
else
{
	echo'<script>alert("invalid username/password")</script>';
}
?>