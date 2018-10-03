<?php
include("conn.php");
if(isset($_POST['get_option']))
{

 $state = $_POST['get_option'];
 $find=mysqli_query($conn,"select * `producs_info_masters` where pro_cat='$state'");
 while($row=mysqli_fetch_assoc($find))
 {
  echo "<option>".$row['pro_name']."</option>";
 }
 exit;
}
?>
