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
<title>Registration</title>
</head>
<body>
 <h3>Registration</h3>
 <form method="post">
 <table>
 <tr>
  <td>Name</td>
  <td>
   <input type="text" name="name">
  </td>
 </tr>
 <tr>
  <td>Department</td>
  <td>
   <select name="dept">
    <option value="Computer Engineering">Computer Engineering</option>
    <option value="Civil Engineering">Civil Engineering</option>
    <option value="Mechanical Engineering">Mechanical Engineering</option>
   </select>
  </td>
 </tr>
 <tr>
  <td>Semester</td>
  <td>
   <select name="sem">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="2">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
   </select>
  </td>
 </tr>
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
   <input type="submit" name="submit" value="register">
  </td>
 </tr>
 </table>
 </form>
</body>
</html>
<?php
 if(isset($_POST['submit']))
 {
  $nm=$_POST['name'];
  $dpt=$_POST['dept'];
  $sm=$_POST['sem'];
  $em=$_POST['email'];
  $pwd=$_POST['pass'];
  $sql="SELECT * FROM users WHERE email='$em'";
  $query=mysqli_query($con,$sql);
  $count=mysqli_num_rows($query);
  if($count>=1)
  {
   echo "email already registered please use different email";
  }
  else
  {
              $sql="INSERT INTO users(name,dept,sem,email,pass) VALUES('$nm','$dpt',
              '$sm','$em','$pwd')";
   $reg=mysqli_query($con,$sql);
   $_SESSION['user']=$em;
   header("location:welcome.php");
  }
 }
?>