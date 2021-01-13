

<?php
$name=$_POST["name"];
$email=$_POST["email"];
$password=$_POST["password"];
$dob=$_POST["dob"];
$noofsub=$_POST["noofsub"];

$sub1=$_POST["subj1"];
$sub2=$_POST["subj2"];
$sub3=$_POST["subj3"];

$stuofsub1=$_POST["stuofsub1"];
$stuofsub2=$_POST["stuofsub2"];
$stuofsub3=$_POST["stuofsub3"];

$sub1sturollnos=$_POST["sub1rollhidden"];
$sub1stunames=$_POST["sub1namehidden"];

 $sub1sturollnos=explode(',',$sub1sturollnos);
  $sub1stunames=explode(',', $sub1stunames);



$sub2sturollnos=$_POST["sub2rollhidden"];
$sub2stunames=$_POST["sub2namehidden"];

 $sub2sturollnos=explode(',',$sub2sturollnos);
  $sub2stunames=explode(',', $sub2stunames);


$sub3sturollnos=$_POST["sub3rollhidden"];
$sub3stunames=$_POST["sub3namehidden"];

 $sub3sturollnos=explode(',',$sub3sturollnos);
  $sub3stunames=explode(',', $sub3stunames);


$j=0;
for($i=0;$i< count($sub1sturollnos);$i++){
    $sub1rollnos[$j]=$sub1sturollnos[$i];
    $j++;
}

$j=0;
for($i=0;$i< count($sub2sturollnos);$i++){
    $sub2rollnos[$j]=$sub2sturollnos[$i];
    $j++;
}

$j=0;
for($i=0;$i< count($sub3sturollnos);$i++){
    $sub3rollnos[$j]=$sub3sturollnos[$i];
    $j++;
}
$j=0;
for($i=0;$i< count($sub1stunames);$i++){

    $sub1names[$j]=$sub1stunames[$i];
    $j++;
}

$j=0;
for($i=0;$i< count($sub2stunames);$i++){

    $sub2names[$j]=$sub2stunames[$i];
    $j++;
}

$j=0;
for($i=0;$i< count($sub3stunames);$i++){

    $sub3names[$j]=$sub3stunames[$i];
    $j++;
}

  $servername = "localhost";
    $username = "root";
    
    try {
    $conn = new PDO("mysql:host=$servername", $username, "");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "CREATE DATABASE FACULTY";
    $conn->exec($sql);

    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    $servername = "localhost";
    $username = "root";
    
    $dbname = "FACULTY";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         if($noofsub == 3){
           $sql="CREATE TABLE F_INFORMATION(name VARCHAR(30) ,email VARCHAR(50) PRIMARY KEY,password VARCHAR(10) ,dob DATE,subjects_name VARCHAR(30))";   
           $conn->exec($sql);
         }
         elseif($noofsub == 2){
           $sql="CREATE TABLE F_INFORMATION(name VARCHAR(30) ,email VARCHAR(50) PRIMARY KEY,password VARCHAR(10) ,dob DATE,subjects_name VARCHAR(30)";   
           $conn->exec($sql);
         }
         else{
           $sql="CREATE TABLE F_INFORMATION(name VARCHAR(30) ,email VARCHAR(50) PRIMARY KEY,password VARCHAR(10) ,dob DATE,subjects_name VARCHAR(30))";   
           $conn->exec($sql);
         }
        
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
   
       $servername = "localhost";
        $username = "root";
        
        $dbname = "FACULTY";
    try{
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         if($noofsub==3){
            $sql="INSERT INTO f_information (`name`, `email`, `password`,dob, `subjects_name`) VALUES ('$name', '$email', '$password','$dob', '$sub1,$sub2,$sub3');";   
         }
         elseif ($noofsub==2) {
             $sql="INSERT INTO f_information (`name`, `email`, `password`,dob, `subjects_name`) VALUES ('$name', '$email', '$password','$dob', '$sub1,$sub2');"; 
         }
         else{
            $sql="INSERT INTO f_information (`name`, `email`, `password`,dob, `subjects_name`) VALUES ('$name', '$email', '$password','$dob', '$sub1');"; 
         }
         $conn->exec($sql);
         
         
      
    }
    catch(PDOException $e){
        echo "<br>".$sql.$e->getMessage();
    }
      $servername = "localhost";
        $username = "root";
        $dbname = "FACULTY";
   try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         $sql="CREATE TABLE SUBJECTS(subname VARCHAR(30),totalclass smallint(30))";   
         $conn->exec($sql);
         if($noofsub==3){
            $sql="INSERT INTO SUBJECTS(`subname`,totalclass) VALUES ('$sub1','0'),('$sub2','0'),('$sub3','0');"; 
         }
         elseif ($noofsub==2) {
              $sql="INSERT INTO SUBJECTS(`subname`,totalclass) VALUES ('$sub1','0'),('$sub2','0');"; 
          } 
        else{
            $sql="INSERT INTO SUBJECTS(`subname`,totalclass) VALUES ('$sub1','0');"; 
        }
         $conn->exec($sql);

         
         
    }
    catch(PDOException $e){
        echo $e->getMessage();
}

if($noofsub == 3){
        $servername = "localhost";
        $username = "root";
        $dbname = "FACULTY";
   try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
         $sql="CREATE TABLE $sub1(rollnumber smallint(30),name VARCHAR(30),totalclass smallint(30))";   
         $conn->exec($sql);
         for($i=0;$i<$stuofsub1;$i++){
            $sql="INSERT INTO $sub1 (rollnumber, name, totalclass) VALUES ('$sub1rollnos[$i]', '$sub1names[$i]', '0');";   
            $conn->exec($sql);
         }
         $sql="CREATE TABLE $sub2(rollnumber smallint(30),name VARCHAR(30),totalclass smallint(30))";   
         $conn->exec($sql);
         for($i=0;$i<$stuofsub2;$i++){
            $sql="INSERT INTO `$sub2` (`rollnumber`, `name`, `totalclass`) VALUES ('$sub2rollnos[$i]', '$sub2names[$i]', '0');";   
            $conn->exec($sql);
            
         }
         $sql="CREATE TABLE $sub3(rollnumber smallint(30),name VARCHAR(30),totalclass smallint(30))";   
         $conn->exec($sql);
         for($i=0;$i<$stuofsub3;$i++){
            $sql="INSERT INTO `$sub3` (`rollnumber`, `name`, `totalclass`) VALUES ('$sub3rollnos[$i]', '$sub3names[$i]', '0');";   
            $conn->exec($sql);
         }
          //echo "<br>"."3 table created successfully";
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}
elseif($noofsub == 2){
     $servername = "localhost";
        $username = "root";
        $dbname = "FACULTY";
   try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
         $sql="CREATE TABLE $sub1(rollnumber smallint(30),name VARCHAR(30),totalclass smallint(30))";   
         $conn->exec($sql);
         for($i=0;$i<$stuofsub1;$i++){
            $sql="INSERT INTO $sub1 (rollnumber, name, totalclass) VALUES ('$sub1rollnos[$i]', '$sub1names[$i]', '0');";   
            $conn->exec($sql);
         }
         $sql="CREATE TABLE $sub2(rollnumber smallint(30),name VARCHAR(30),totalclass smallint(30))";   
         $conn->exec($sql);
         for($i=0;$i<$stuofsub2;$i++){
            $sql="INSERT INTO `$sub2` (`rollnumber`, `name`, `totalclass`) VALUES ('$sub2rollnos[$i]', '$sub2names[$i]', '0');";   
            $conn->exec($sql);
            
         }
          //echo "<br>"."2 table created successfully";
        }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}
else{
    $servername = "localhost";
        $username = "root";
        $dbname = "FACULTY";
   try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
         
         $sql="CREATE TABLE $sub1(rollnumber smallint(30),name VARCHAR(30),totalclass smallint(30))";   
         $conn->exec($sql);
         for($i=0;$i<$stuofsub1;$i++){
            $sql="INSERT INTO $sub1 (rollnumber, name, totalclass) VALUES ('$sub1rollnos[$i]', '$sub1names[$i]', '0');";   
            $conn->exec($sql);
         }
         //echo "<br>"."1 table created successfully";
        }
    catch(PDOException $e){
        echo $e->getMessage();
    }
}

        $servername = "localhost";
        $username = "root";
        $dbname = "FACULTY";
   try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "");
         $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      if($noofsub==3){
        $sql="CREATE TABLE sub1presentabsent(date DATE,totalpresent smallint(30),totalabsent smallint(30))";   
         $conn->exec($sql);

         $sql="CREATE TABLE sub2presentabsent(date DATE,totalpresent smallint(30),totalabsent smallint(30))";   
         $conn->exec($sql);

         $sql="CREATE TABLE sub3presentabsent(date DATE,totalpresent smallint(30),totalabsent smallint(30))";   
         $conn->exec($sql);
         header("Location:LOGIN PAGE.php");
      }  
      elseif ($noofsub ==2) {
        $sql="CREATE TABLE sub1presentabsent(date DATE,totalpresent smallint(30),totalabsent smallint(30))";   
         $conn->exec($sql);

         $sql="CREATE TABLE sub2presentabsent(date DATE,totalpresent smallint(30),totalabsent smallint(30))";   
         $conn->exec($sql);
         header("Location:LOGIN PAGE.php");
       } 
       else{
        $sql="CREATE TABLE sub1presentabsent(date DATE,totalpresent smallint(30),totalabsent smallint(30))";   
         $conn->exec($sql);
         header("Location:LOGIN PAGE.php");
        }    
       }
    catch(PDOException $e){
        echo $e->getMessage();
    }   


$conn = null;

?>