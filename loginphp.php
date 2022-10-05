
<?php
session_start();
$con = mysqli_connect('localhost','root','');
mysqli_select_db($con,'blogwebsite');
if(isset($_POST['login']))
{
    $Email_id= $_POST['email'];
    
    $Password = $_POST['password'];
    $sql=mysqli_query($con,"SELECT * FROM register where Email_id ='$Email_id' and  Password ='$Password'");
    $row  = mysqli_fetch_array($sql);
    if(is_array($row))
    {
        
        $_SESSION["Email"]=$row['Email_id'];
        $_SESSION["Name"]=$row['Name'];
        foreach( $row as $key => $value) {
            $value = trim($value);
            if(empty($value)) {
                header("Location:blog1.html");
            } else {
                header("Location:index.html");
            }
        }
    }
    else
    {
         echo"<script>alert('Invalid login details')</script>" ;
       
        header("Location:loginphp.php"); 
    }
}
?>


