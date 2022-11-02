
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

<script>
    function DeleteMe(id){
        let succ = document.getElementById('success');
        let err = document.getElementById('fail');
        if(confirm("Are you sure")){
            $.ajax({
            // Specifiy the method type
            type:"POST", 
            url:"controller/delete.php",
            data:{id:id},
            success:function(res){
               if(res==="ok"){
                $('#fomu').load(window.location.href + " #fomu");
               }else{
                   err.style.display="block";
                   err.innerHTML="Error occurred : "+res;
                   err.style.display="none";
                   
               }
               
            }
        })
        }
    }
  
</script>

<body>

<div class="container">
  
<h1>LIQUOR STORE </h1>


<button type="button" id="recs"  onclick="window.location='create.php'">Add Liquor</button>

<hr class="line"></hr>

<div class="response">
<div class="success" id="success">
lolo
</div>
<div class="fail" id="fail">
lost
</div>
</div>
<form  id="fomu" style="margin-left:100px;">
    <table border="1">
        <th> No </th>
        <th> Name</th>
        <th>Brand</th>
        <th colspan="2">Actions</th>

       <?php
            include "connect.php";
            $run = mysqli_query($con,getLiquor());
            $i=1;
            while ($row = mysqli_fetch_array($run)) {
            ?>
            <tbody>
            <td><?php echo $i++; ?></td>
            <td><?php echo $row['l_name']; ?></td>
            <td><?php echo $row['l_brand']; ?></td>
            <td>

                <button type="button" onclick="DeleteMe(<?php echo $row['l_id']; ?>)" > Delete</button>
                <button type="button" onclick="gotoUpdate(<?php echo $row['l_id']; ?>)">Edit</button>
            </td>
            </tbody>
            <?php } ?>


    



    </table>

</form>
</div>
<script>
      function gotoUpdate(id) {
        window.location.href='update.php?id='+id;
        
       
        
        
        }
    
</script>


</body>
</html>