<?php
session_start();
if(isset($_SESSION['user']))
{
 header("location:welcome.php");
}
include("config.php");
?>
<html>
<head>
<title>Login</title>
</head>
<body>
 <h3>Login</h3>
 <form method="post">
 <table>
 <tr>
  <td>Email</td>
  <td>
   <input type="email" name="email">
  </td>
 <tr>
  <td>Password</td>
  <td>
   <input type="Password" name="pass">
  </td>
 </tr>
 <tr>
  <td colspan="2">
   <input type="submit" name="login" value="Login">
  </td>
 </tr>
 </table>
 </form>
</body>
</html>
<?php
 if(isset($_POST['login']))
 {
  $em=$_POST['email'];
  $pwd=$_POST['pass'];
  $sql="SELECT * FROM users WHERE email='$em' && pass='$pwd'";
  $query=mysqli_query($con,$sql);
  $count=mysqli_num_rows($query);
  if($count==1)
  {
   $_SESSION['user']=$em;
   header("location:welcome.php");
  }
  else
  {
   echo "Invalid Login";
  }
 }
?>