<?php
session_start();
include("config.php");
if(!(isset($_SESSION['user'])))
{
 header("location:login.php");
}
$em=$_SESSION['user'];
$sql="SELECT * FROM users where email='$em'";
$query=mysqli_query($con,$sql);
while($raw=mysqli_fetch_assoc($query))
{
 echo "<h3>Welcome ".$raw['name']."</h3>";
 echo "<h3>email : ".$raw['email']."</h3>";
 echo "<h3>Department : ".$raw['dept']."</h3>";
 echo "<h3>Semester : ".$raw['sem']."</h3>";
}
?>
<a href="logout.php">Logout</a><br>
<a href="edit-profile.php">edit Profile</a><br>