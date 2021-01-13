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
$sub1=$stmt->fetchColumn();

$sub2=$stmt->fetchColumn();

$sub3=$stmt->fetchColumn();

$data=$conn->query("SELECT count(*) FROM subjects");
$totalsub=$data->fetchColumn();

$stmt=$conn->prepare("SELECT totalclass FROM subjects");
$stmt->execute();
$sub1tclass=$stmt->fetchColumn();

$sub2tclass=$stmt->fetchColumn();

$sub3tclass=$stmt->fetchColumn();

?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>HOME PAGE</title>
<style>
       
       table{
        background-color:white;
        margin-top: 150px;
        margin-left: 600px;
        width:20%;
        height: 20%;
        text-align:center;
        border-radius:10px;
       }
       .logout{

        background-color: green;
       color:white;
       }
       button{
        width:100%;
        border-radius:5px;
        background-color: yellow;
        color:black;
        font-size: 20px;
       }
       
        button:hover{
        background-color: lightgreen;       
        font-size: 20px;
       }
      .logout:hover{
        color:purple;
      }
      a{
         text-decoration: none;
      }

body {font-family: Arial, Helvetica, sans-serif;
     background-color: green;
     }



</style>
</head>
<body>
      <form target="_self">
            <table frame="box" align="center"><tr><td><button onclick="choosesub()"  target=_blank formaction="ATTENDANCE PAGE.php">ATTENDANCE</button></td></tr>
                                          <tr><td><button  onclick="tclass()">TOTAL CLASS TAKEN BY FACULTY</button></td></tr>
                                          <tr><td><button onclick="cattend()">TOTAL CLASS ATTEND BY STUDENT</button></td></tr>
                                          <tr><td><button formaction="surplussheet.php">CHECK AVAILABLE SHEET</button></td></tr>
                                          <tr><td><button class=logout formaction="LOGIN PAGE.php">LOG OUT</button></td></tr>
             </table>  
      </form>
<script>
function tclass(){
var sub1="<?php echo $sub1; ?>";
var sub2="<?php echo $sub2; ?>";
var sub3="<?php echo $sub3; ?>";
var totalsub=<?php echo $totalsub; ?>;

if (totalsub==3) {
   var subindex=prompt("1-"+sub1+'\n'+"2-"+sub2+'\n'+"3-"+sub3+'\n\n'+"Enter 1 index number at a time to see the total classess of that subject:");
}
else if(totalsub==2){
  var subindex=prompt("1-"+sub1+'\n'+"2-"+sub2+'\n\n'+"Enter 1 index number at a time to see the total classess of that subject:");
}
else{
  var subindex=prompt("1-"+sub1+'\n\n'+"Enter 1 index number at a time to see the total classess of that subject:");
}


if(subindex == 1){
   alert(<?php echo $sub1tclass ?>+" Classes you have completed in "+sub1+".");
}
else if(subindex == 2){
  alert(<?php echo $sub2tclass ?>+" Classes you have completed in "+sub2+"."); 
}
else if(subindex ==3){
  alert(<?php echo $sub3tclass ?>+" Classes you have completed in "+sub3+".");
}
else{
  alert("Please enter an valid index");
}
}

function cattend(){
var totalsub=<?php echo $totalsub; ?>;
var sub1="<?php echo $sub1; ?>";
var sub2="<?php echo $sub2; ?>";
var sub3="<?php echo $sub3; ?>";

if(totalsub==3){
  var subindex=prompt("1-"+sub1+'\n'+"2-"+sub2+'\n'+"3-"+sub3+'\n\n'+"Enter 1 index number at a time to see the total classess of that subject:");
}
else if(totalsub==2){
   var subindex=prompt("1-"+sub1+'\n'+"2-"+sub2+'\n\n'+"Enter 1 index number at a time to see the total classess of that subject:");
}
else{
  var subindex=prompt("1-"+sub1+'\n\n'+"Enter 1 index number at a time to see the total classess of that subject:");
}

if(subindex == 1){
  var rollnumber=prompt("Enter roll number of "+sub1+".");

   if(rollnumber != 0 || rollnumber !=""){

    var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText+" class you have attended");
    }
  };
  xhttp.open("GET", "tclassinfo.php?sname="+sub1+"&rollnumber="+rollnumber, true);
  xhttp.send();   
}
   
   else{
    alert("Please give an valid rollnumber");
   }

   
}
else if(subindex == 2){
  var rollnumber=prompt("Enter roll number of "+sub2+".");

   if(rollnumber != 0 || rollnumber !=""){

    var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText+" class you have attended");
    }
  };
  xhttp.open("GET", "tclassinfo.php?sname="+sub2+"&rollnumber="+rollnumber, true);
  xhttp.send();   
}
   
   else{
    alert("Please give an valid rollnumber");
   }
}
else if(subindex ==3){
  var rollnumber=prompt("Enter roll number of "+sub3+".");

   if(rollnumber != 0 || rollnumber !=""){

    var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      alert(this.responseText+" class you have attended");
    }
  };
  xhttp.open("GET", "tclassinfo.php?sname="+sub3+"&rollnumber="+rollnumber, true);
  xhttp.send();   
}
   
   else{
    alert("Please give an valid rollnumber");
   }
}
else{
  alert("Please enter an valid index");
}
}




</script>
</body>
</html>
