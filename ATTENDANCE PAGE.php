<?php

$sub1="";
$sub2="";
$sub3="";
$sub="";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FACULTY";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$stmt=$conn->prepare("SELECT * FROM subjects");
$stmt->execute();

$data=$conn->query("SELECT count(*) FROM subjects");
$totalsub=$data->fetchColumn();


$sub1=$stmt->fetchColumn();

$sub2=$stmt->fetchColumn();

$sub3=$stmt->fetchColumn();

?>


<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>ATTENDANCE PAGE</title>
       <style>
       body{
            background-color: green;
            }
       a{
        text-decoration: none;
       }

      .subbtn{
                    border-radius: 10px;
                    background-color: moccasin;
                    font-size: 30px;
                   
                }
       .subbtn:hover{
                    background-color:lightgray;
                }

       .backbtn{
                    background-color: white;
                    color:black;
                    border-radius: 10px;
                    font-size: 30px;
                }
                .backbtn:hover{
                    background-color: lightgreen;
                    color:black;
                }
      #sub1,#sub2,#sub3{
        display: none;
      } 
      a{
      color: white;
      border: 3px solid white;
      }

</style>

</head>
<body>
  <form name="aform" action="ATTENDANCE PAGE.php" target="_blank" method="POST" >    
    <button type="button" onclick="location.href='HOME PAGE.php'" target="_blank" class="backbtn">BACK</button>
  <div style="text-align: center;">
    <a href="sub1.php" target="iframe" onclick="s1color()" id="sub1"><?php echo $sub1; ?></a>
    <a href="sub2.php" target="iframe" onclick="s2color()" id="sub2"><?php echo $sub2; ?></a>
    <a href="sub3.php" target="iframe" onclick="s3color()" id="sub3"><?php echo $sub3; ?> </a>
  </div>

  <iframe height="1000px" width="100%" name="iframe" frameborder="0">  </iframe> 
                        
</form>

  
<script type="text/javascript">
  function s1color(){
       document.getElementById("sub1").style.color="lightpink";
       document.getElementById("sub2").style.color="white";
       document.getElementById("sub3").style.color="white";
  }
  function s2color(){
       document.getElementById("sub1").style.color="white";
       document.getElementById("sub2").style.color="lightpink";
       document.getElementById("sub3").style.color="white";
  }
  function s3color(){
       document.getElementById("sub1").style.color="white";
       document.getElementById("sub2").style.color="white";
       document.getElementById("sub3").style.color="lightpink";
  }
 if (<?php echo $totalsub; ?> ==3) {
  document.getElementById("sub1").style.display="inline";
  document.getElementById("sub2").style.display="inline";
  document.getElementById("sub3").style.display="inline";
 } 
 else if(<?php echo $totalsub; ?> ==2){
  document.getElementById("sub1").style.display="inline";
  document.getElementById("sub2").style.display="inline";
  document.getElementById("sub3").style.display="none";
 }
 else{
  document.getElementById("sub1").style.display="inline";
  document.getElementById("sub2").style.display="none";
  document.getElementById("sub3").style.display="none";
 }

</script>


</body>
</html>