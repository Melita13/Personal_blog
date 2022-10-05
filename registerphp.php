



<?php
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'blogwebsite');
if(isset($_POST['register']))
{
$Name = $_POST['name'];
$Phone = $_POST['contact'];
$Email_id= $_POST['email'];
$Password = $_POST['password'];
$s = "select * from register where Email_id ='$Email_id'";
$result = mysqli_query($con,$s);
$num =mysqli_num_rows($result);

if($num ==1)
{
    echo"Email-id aldready taken";
}
    else
    {
      $register= "insert into register values('$Name','$Phone','$Email_id','$Password')";
      mysqli_query($con,$register);
      header('Location:loginphp.php', TRUE, 302);
      echo"regitration successful";
     

    }
}   
?>