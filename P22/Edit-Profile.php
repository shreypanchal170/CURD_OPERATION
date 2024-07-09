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
?>
<body>
 <h3>Edit Profile</h3>
 <form method="post">
 <table>
 <tr>
  <td>Name</td>
  <td>
   <input type="text" name="name" value="<?php echo $raw['name']; ?>">
  </td>
 </tr>
 <tr>
  <td>Department</td>
  <td>
   <select name="dept">
    <option value="<?php echo $raw['dept']; ?>"><?php echo $raw['dept']; ?></option>
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
    <option value="<?php echo $raw['sem']; ?>"><?php echo $raw['sem']; ?></option>
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
   <input type="email" name="email" value="<?php echo $raw['email']; ?>">
  </td>
 <tr>
  <td>Password</td>
  <td>
   <input type="Password" name="pass" value="<?php echo $raw['pass']; ?>">
   <input type="hidden" name="uid" value="<?php echo $raw['id']; ?>">
  </td>
 </tr>
 <tr>
  <td colspan="2">
   <input type="submit" name="update" value="Update Profile">
  </td>
 </tr>
 </table>
 </form>
 <a href="welcome.php">Home</a><br>
 <a href="Logout.php">Logout</a>
</body>
</html>
<?php
}
 if(isset($_POST['update']))
 {
  $sid=$_POST['uid'];
  $nm=$_POST['name'];
  $dpt=$_POST['dept'];
  $sm=$_POST['sem'];
  $em=$_POST['email'];
  $pwd=$_POST['pass'];
  $sql="UPDATE users SET name='$nm', dept='$dpt', sem='$sm', email='$em', pass='$pwd' WHERE users.id='$sid' LIMIT 1"; 
  $query=mysqli_query($con,$sql)or die("failed");
  if($query)
  {
   header("location:edit-profile.php");
  }
 }
?>