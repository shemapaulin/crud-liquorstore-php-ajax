<?php
include "../connect.php";

$name = $_POST['name'];
$brand = $_POST['brand'];

$sql = addLiquor($name,$brand);
$exc = mysqli_query($con,$sql)or die(mysqli_error($con));
if($exc){
    
    echo "ok";
}else{
    echo mysqli_error($con);
}

?>