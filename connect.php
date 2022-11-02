<?php
$con= mysqli_connect('localhost','root','','liquor_store');


function addLiquor($name,$liquor){
    return "INSERT INTO liquor VALUES(null,'$name','$liquor')";
}

function getLiquor(){
    return "SELECT * FROM liquor";
}


?>