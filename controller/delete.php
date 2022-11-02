<?php
include "../connect.php";
$id = $_POST['id'];
$sql = "DELETE FROM liquor where l_id=$id";
$ex = mysqli_query($con,$sql)or die(mysqli_error($con));
if($ex){
    
    echo "ok";
}else{
    echo mysqli_error($con);
}

?>