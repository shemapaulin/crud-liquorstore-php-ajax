<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update</title>
</head>
<body>
    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAULIN CRUD</title>
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="css/font.css">
    <script src="js/jquery.min.js"></script>

 
</head>

<body>

<div class="container">
  
<h1>LIQUOR STORE </h1>


<button type="button" id="recs" onclick="window.location='index.php'">Records</button>
<hr class="line"></hr>

<div class="response">
<div class="success" id="success">
lolo
</div>
<div class="fail" id="fail">
lost
</div>
</div>
<form method="POST" id="fomu">
<?php
            include "connect.php";
            $id=$_GET['id'];
            if (isset($_POST['btn'])){
                $id=$_GET['id'];
            $name= $_POST['name'];
            $brand= $_POST['brand'];


$sql = "update liquor set l_name='$name',l_brand='$brand' WHERE l_id='$id'";
$check = mysqli_query($con,$sql)or die(mysqli_error($con));
if($check){
    
    echo "ok";
}else{
    echo mysqli_error($con);
}}
            $query="SELECT * FROM liquor where l_id=$id";
            $run = mysqli_query($con,$query);
            $i=+1;
            while ($row = mysqli_fetch_array($run)) {
            ?>
    
<label for="">Name</label>
<div class="field">
    <input type="text" name="name" id="name" value=<?php  echo $row['l_name']; ?> required min="3" >
</div>

<label for="">Brand</label>
<div class="field">
    <input type="text" name="brand" id="brand" value=<?php echo $row['l_brand']; ?> required min="3">
</div>
<?php } ?>

<button class="btnsave" id="btnsave"  name="btn">
    Save
</button>
<button class="btnreset" type="reset">
    Reset
</button>



</button>
</form>
</div>

 <script>
        let name = document.getElementById('name');
        let brand = document.getElementById('brand');
        let succ = document.getElementById('success');
        let err = document.getElementById('fail');
        let btnsv = document.getElementById('btnsave');
        let formu = document.getElementById('fomu');


    function gotoSave(){
        if(!name.checkValidity()){
            err.style.display="block";
            return err.innerHTML="Liquor required[Min:3]";
        }
        else if(!brand.checkValidity()){
            err.style.display="block";
            return err.innerHTML="Brand required[Min:3]";
        }

        $.ajax({
            // Specifiy the method type
            type:"POST", 
            url:"controller/edit.php",
            data:{name:name.value,brand:brand.value},
            success:function(res){
               if(res==="ok"){
  
                succ.style.display="block";
                succ.innerHTML="Saved successfully";
                clear();
               

               }else{
                   err.style.display="block";
                   err.innerHTML="Error occurred : "+res;
                   clear();
               }
               
            }
        })
    }


    function clear(){
        setTimeout(() => {
             formu.reset(); 
             succ.style.display="none";
             err.style.display="none";
        }, 2000);
    }
</script> 


    
</body>
</html>
</body>
</html>