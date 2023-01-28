<?php
$conn=new mysqli('localhost','root','','websitedb');


            
$stmt=$conn->prepare("select *from book where status=0 order by sno desc ");
$stmt->execute();
$v1=$stmt->get_result();



?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/stylelog.css">
    <script type="text/javascript">
      function check(){
        alert(" Request accepted");
      }
    </script>
  </head>
  <body>
    <center>
      <h1>Admin Portal</h1>
      <form method="post">
        <table  cellpadding="5px" cellspacing="6px" bgcolor="white" bordercolor="blue">
          <tr>
            <th align="center" >UserName</th>
            <th align="center">Quantity Have</th>
            <th align="center">Date</th>
            <th align="center">Time to Approach</th>
            <th align="center">Accept</th>
            <th>reject</th>
          </tr>
          <?php
          while($val=mysqli_fetch_assoc($v1))
          {
            ?>
          <tr>
            <td align="center"><?php echo $val['email'];?></td>
            <td align="center"><?php echo $val['quantity'];?></td>
            <td align="center"><?php echo $val['date'];?></td>
            <td align="center"><?php echo $val['time'];?></td>
            <td>
              <form action="accept.php" method="post">
                <input type="hidden" name="email" value="<?php echo $val['email'];?>" >
                <input type="hidden" name="quantity" value="<?php echo $val['quantity'];?>" >
                <input type="hidden" name="date" value="<?php echo $val['date'];?>" >
                <input type="hidden" name="time" value="<?php echo $val['time'];?>" >
                <input type="submit" name="accept"  id="accept" onclick="check()" value="accept">
              </form>
                </td>
                <td>
                  <form action="reject.php" method="post">
                    <input type="hidden" name="email" value="<?php echo $val['email'];?>" />
                    <input type="hidden" name="quantity" value="<?php echo $val['quantity'];?>" />
                    <input type="hidden" name="date" value="<?php echo $val['date'];?>" />
                    <input type="hidden" name="time" value="<?php echo $val['time'];?>" />
                    <input type="submit" name="reject" id="reject" onclick="reject()" value="reject">
                    </form>
                  </td>
          </tr>
        <?php
       }
       $stmt1=$conn->prepare("select *from book where status=1 order by sno desc");
       $stmt1->execute();
       $res=$stmt1->get_result();
       
       ?>
        </table><br>
        <br>
        <h1>Accepted Requests</h1>
        <table  cellpadding="5px" cellspacing="6px" bgcolor="white" bordercolor="blue">
          <tr>
            <th align="center" >UserName</th>
            <th align="center">Quantity Have</th>
            <th align="center">Date</th>
            <th align="center">Time to Approach</th>
          </tr>
          <?php
          while($result=mysqli_fetch_assoc($res))
            {
              ?>
          <tr>
            <td align="center"><?php echo $result['email']?></td>
            <td align="center"><?php echo $result['quantity']?></td>
            <td align="center"><?php echo $result['date']?></td>
            <td align="center"><?php echo $result['time']?></td>
          </tr>
          <?php
        }?>
        </table>
        
      </form>
    </center>
  </body>
</html>
