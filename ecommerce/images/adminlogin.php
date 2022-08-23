<?php
require ("includes/common.php");
session_start();

$admin_id=$_POST['ladmin_id'];
$admin_id=mysqli_real_escape_string($con,$admin_id);

$apassword=$_POST['lapassword'];
$apassword=mysqli_real_escape_string($con,$apassword);
$apassword=md5($apassword);

$query="SELECT admin_id,apassword from admin where admin_id='".$admin_id."' and  apassword='".$apassword."'";
$result=mysqli_query($con,$query);
$num=mysqli_num_rows($result);
if($num==0){
    $m = "Please enter correct Admin id and Password";
    header('location: index.php?errorl='.$m);
}else{
    $row = mysqli_fetch_array($result);
    $_SESSION['admin_id'] = $row['admin_id'];
    $_SESSION['user_id'] = $row['id'];
    header('location:products.php');
    

}



?>