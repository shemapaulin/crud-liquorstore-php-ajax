<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PAULIN AJAX</title>
    <link rel="stylesheet" href="main.css">
    <script src="js/jquery.min.js"></script>

 
</head>
<body>
<div class="container">
  
  <h1>LIQUOR STORE </h1>
  
  
  <button type="button" id="recs" onclick="window.location='Newindex.php'">Records</button>
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
      
  <label for="">Number</label>
  <div class="field">
      <input type="text" name="name" id="num" required min="3" >
  </div>
  
  
  
  
  <button class="btnsave" id="btnsave" type="button" onclick="return gotoSend()">
      Save
  </button>
  <button class="btnreset" type="reset">
      Reset
  </button>
  
  
  
  </button>
  </form>
  </div> 
  <script>
    let number= document.getElementById('num');
    let succ = document.getElementById('success');
    let err = document.getElementById('fail');
    let fomu= document.getElementById('fomu');
    

    function gotoSend(){
        if(!number.checkValidity()){
            err.style.display="block";
            return err.innerHTML="number required[Min:3]";
        }
        $.ajax({
          type:"POST",
          url:"Newapi.php",
          data:{number:num.value},
        success:function(res){
            if(res==="ok"){

                succ.style.display="block";
                succ.innerHTML="GOOD";
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
             fomu.reset(); 
             succ.style.display="none";
             err.style.display="none";
        }, 2000);
    }
</script>
</body>

</html>