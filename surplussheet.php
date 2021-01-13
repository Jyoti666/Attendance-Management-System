<?php
$s1="";
$s2="";
$s3="";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FACULTY";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$data=$conn->query("SELECT count(*) FROM subjects");
$totalsheet=$data->fetchColumn();

$stmt=$conn->prepare("SELECT * FROM subjects");
$stmt->execute();

$s1=$stmt->fetchColumn();

$s2=$stmt->fetchColumn();

$s3=$stmt->fetchColumn();


$conn=NULL;
?>


<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background-color: green;

}

.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 30%; /* Could be more or less, depending on screen size */
  border-radius: 10px;
}

/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)} 
  to {-webkit-transform: scale(1)}
}
  
@keyframes animatezoom {
  from {transform: scale(0)} 
  to {transform: scale(1)}
}

#btn1,#btn2{
  display: none;
  margin-top: 40px;
  margin-bottom: 70px;
}
p{
  text-align: center;
}
#box{
  text-align: center;
  background-color: white;
  border: 50px solid purple;
  height: 20%;
  width: 20%;
  margin-left: 600px;
  margin-top: 100px;
  border-radius: 15px;


}
button{
        width:40%;
        border-radius:5px;
        background-color: yellow;
        color:black;
        font-size: 20px;
        
       }
button:hover{
        background-color: lightgreen;   
        font-size: 20px;
       }
input[type=submit]{
            background-color: green;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 20%;
            border-radius: 15px;
            font-size: 10px;


        }
input[type=submit]:hover{
        background-color: lightgreen;
        color:black;
        font-size: 10px;
        }
.cancelbtn{
            background-color: green;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 20%;
            border-radius: 15px;
            font-size: 10px;

        }
.cancelbtn:hover{
        background-color: lightgreen;
        color:black;
        font-size: 10px;
        }
.backbtn{
        background-color: green;
        color:white;
        border-radius: 10px;
        font-size: 20px;
        }
.backbtn:hover{
        background-color: lightgreen;
        color:black;
}

</style>
</head>
<body>



<div id="box">
<p id="info"></p>
<button onclick="document.getElementById('id01').style.display='block';" style="width:auto;" id="btn1">SHEET-1</button>
<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;" id="btn2">SHEET-2</button>
<button type="button" onclick="location.href='HOME PAGE.php'" target="_blank" class="backbtn" id="backbtn">BACK</button>

</div>


<div id="id01" class="modal">
  
  <form class="modal-content animate" method="POST">
       <input type="hidden" name="sub1rollhidden" id="sub1rollhidden" value="">
       <input type="hidden" name="sub1namehidden" id="sub1namehidden" value=""> 

    <div class="container">
      <label for="ssubject"><b>Fill the following field:</b></label><br>
       <center><input type="text" name="subj1" id="subj1" placeholder="Write subjectname..." required>
       <input type="number" name="stuofsub1" id="stuofsub1" placeholder="Write no. of student.." required></center>
       <center><button type="button" id="sub1" name="sub1" onclick="subject1()" style="margin-top: 20px;">Create sheet</button></center>
       <center><button type="button" onclick="document.getElementById('id01').style.display='none' " class="cancelbtn">BACK</button>
               <input type="submit" name="submit1" value="SUBMIT" onclick="return valid()"></center>
    </div>
    
  </form>
</div>



<div id="id02" class="modal">
  
  <form class="modal-content animate" method="POST">
       <input type="hidden" name="sub2rollhidden" id="sub2rollhidden" value="">
       <input type="hidden" name="sub2namehidden" id="sub2namehidden" value="">

    <div class="container">
      <label for="ssubject"><b>Fill the following field:</b></label><br>
      <center><input type="text" name="subj2" id="subj2" placeholder="Write subjectname..." required>
      <input type="number" name="stuofsub2" id="stuofsub2" placeholder="Write no. of student.." required></center><br>
      <center><button type="button" id="sub2" name="sub2" onclick="subject2()">Create sheet</button></center>
      <center><button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">BACK</button><input type="submit" name="submit2" value="SUBMIT" onclick="return valid2()"></center>
    </div>
  </form>
</div>




<script>

function valid(){
  var sub=document.getElementById("subj1").value;
  
  if(sub !="" && sub != "<?php echo $s1; ?>" && sub != "<?php echo $s2; ?>" && sub != "<?php echo $s3; ?>"){
    return true;
  }
  else{
    alert("Please, give another type of subject name because, a sheet already created in this name");
    return false;
  }
}

function valid2(){
  var sub=document.getElementById("subj2").value;
  if(sub !="" && sub != "<?php echo $s1; ?>" && sub != "<?php echo $s2; ?>" && sub != "<?php echo $s3; ?>"){
    return true;
  }
  else{
    alert("Please, give another type of subject name because, a sheet already created in this name");
    return false;
  }
}



var totalsheet=<?php echo $totalsheet; ?>;
if(totalsheet == 3){
  document.getElementById("info").innerHTML="0-sheet available.";
}
else if(totalsheet == 1){
  document.getElementById("info").innerHTML="2-sheet available.";
  document.getElementById("btn1").style.display="inline";
  document.getElementById("btn2").style.display="inline";
}
else{
  document.getElementById("info").innerHTML="1-sheet available.";
  document.getElementById("btn1").style.display="inline";
  document.getElementById("btn2").style.display="none";
}

// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Get the modal
var modal = document.getElementById('id02');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
      
    }
}

function subject1(){
          document.getElementById("subj1").value=document.getElementById("subj1").value.toUpperCase();
          var totalstudent1=document.getElementById("stuofsub1").value;
          var sub1rollno=[];
          var sub1name=[];
        for (var i = 1; i <= totalstudent1; i++) {
            sub1rollno[i-1]=prompt("Enter Roll No. for student at serial no.: "+i);
            sub1name[i-1]=prompt("Enter Name for student at serial no. :"+i).toUpperCase();
        }
         document.getElementById("sub1rollhidden").value= sub1rollno;
        
         document.getElementById("sub1namehidden").value= sub1name;
     } 
     function subject2(){
       document.getElementById("subj2").value=document.getElementById("subj2").value.toUpperCase();
       var totalstudent2=document.getElementById("stuofsub2").value;
       var sub2rollno=[];
       var sub2name=[];
        for (var i = 1; i <= totalstudent2; i++) {
            sub2rollno[i-1]=prompt("Enter Roll No. for student at serial no.: "+i);
            sub2name[i-1]=prompt("Enter Name for student at serial no. :"+i).toUpperCase();
        } 
        document.getElementById("sub2rollhidden").value= sub2rollno;
         document.getElementById("sub2namehidden").value= sub2name;

     }
        
  
</script>


</body>
</html>



<?php



$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FACULTY";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$sub1="";
$sub2="";


$stmt=$conn->prepare("SELECT subjects_name FROM f_information");
$stmt->execute();
$exsub=$stmt->fetchColumn();
//echo "a";


if(isset($_POST['submit1'])){
  $sub1=$_POST["subj1"];
   

$data=$conn->query("SELECT count(*) FROM subjects");
$tsheet=$data->fetchColumn();  

if($tsheet <3){
  

  $stuofsub1=$_POST["stuofsub1"];
  

  $sub1sturollnos=$_POST["sub1rollhidden"];
  $sub1stunames=$_POST["sub1namehidden"];

  $sub1sturollnos=explode(',',$sub1sturollnos);
  $sub1stunames=explode(',', $sub1stunames);
  //echo "KK";
//echo strlen($sub1sturollnos);
//echo $sub1sturollnos;
  $j=0;
for($i=0;$i< COUNT($sub1sturollnos);$i++){
    $sub1rollnos[$j]=$sub1sturollnos[$i];
    $j++;
}

$j=0;
for($i=0;$i< COUNT($sub1stunames);$i++){

    $sub1names[$j]=$sub1stunames[$i];
    $j++;
}
     $servername = "localhost";
     $username = "root";
     $dbname = "FACULTY";
     
   try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         //echo "i";
         $sql="CREATE TABLE $sub1(rollnumber MEDIUMINT(30),name VARCHAR(30),totalclass smallint(30))";   
         $conn->exec($sql);
         for($i=0;$i<$stuofsub1;$i++){
            $sql="INSERT INTO $sub1 (rollnumber, name, totalclass) VALUES ('$sub1rollnos[$i]', '$sub1names[$i]', '0');";   
            $conn->exec($sql);
         }
         $sql="UPDATE f_information SET subjects_name=concat(subjects_name,',$sub1') where subjects_name='$exsub'"; 
         $conn->exec($sql);  
         if($totalsheet==2){
           $sql="CREATE TABLE sub3presentabsent(date DATE,totalpresent smallint(30),totalabsent smallint(30))";   
           $conn->exec($sql);
         }
         else{
           $sql="CREATE TABLE sub2presentabsent(date DATE,totalpresent smallint(30),totalabsent smallint(30))";   
           $conn->exec($sql);
         }
         $sql="INSERT INTO subjects(subname,totalclass) VALUES('$sub1','0')";   
         $conn->exec($sql);
         echo "<meta http-equiv='refresh' content='0'>";
     
  }
        
    catch(PDOException $e){
        echo $e->getMessage();
    }

}

}
if(isset($_POST['submit2'])){
  $data=$conn->query("SELECT count(*) FROM subjects");
  $tsheet=$data->fetchColumn();  

if($tsheet <3){
  $sub2=$_POST["subj2"];
 
  $stuofsub2=$_POST["stuofsub2"];

  $sub2sturollnos=$_POST["sub2rollhidden"];
  $sub2stunames=$_POST["sub2namehidden"];

  $sub2sturollnos=explode(',',$sub2sturollnos);
  $sub2stunames=explode(',', $sub2stunames);

  
$j=0;
for($i=0;$i< count($sub2sturollnos);$i++){
    $sub2rollnos[$j]=$sub2sturollnos[$i];
    $j++;
}

$j=0;
for($i=0;$i< count($sub2stunames);$i++){

    $sub2names[$j]=$sub2stunames[$i];
    $j++;
}

     $servername = "localhost";
     $username = "root";
     $dbname = "FACULTY";
   try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
         $sql="CREATE TABLE $sub2(rollnumber smallint(30),name VARCHAR(30),totalclass smallint(30))";   
         $conn->exec($sql);
         for($i=0;$i<$stuofsub2;$i++){
            $sql="INSERT INTO `$sub2` (`rollnumber`, `name`, `totalclass`) VALUES ('$sub2rollnos[$i]', '$sub2names[$i]', '0');";   
            $conn->exec($sql);
         }
         $sql="UPDATE f_information SET subjects_name=concat(subjects_name,',$sub1') where subjects_name='$exsub'"; 
         $conn->exec($sql); 
         $sql="CREATE TABLE sub3presentabsent(date DATE,totalpresent smallint(30),totalabsent smallint(30))";   
         $conn->exec($sql);
         $sql="INSERT INTO subjects(subname,totalclass) VALUES('$sub2','0')";   
         $conn->exec($sql);
         echo "<meta http-equiv='refresh' content='0'>";
        }
    catch(PDOException $e){
        echo $e->getMessage();
    }
  }
}
$conn=NULL;
?>