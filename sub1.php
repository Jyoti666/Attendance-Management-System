<?php

$sub1="";


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FACULTY";

$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$stmt=$conn->prepare("SELECT * FROM subjects");
$stmt->execute();


$sub1=$stmt->fetchColumn();

$stmt=$conn->prepare("SELECT totalclass FROM subjects");
$stmt->execute();
$sub1tclass= $stmt->fetchColumn();
//echo $sub1tclass;

//echo $stmt[0];

$query="SELECT totalclass FROM $sub1";
$result=$conn->query($query);

//echo $result[0];

$i=0;
foreach($result as $row){
  $tclass[$i]= $row['totalclass'];
  $i++;
}

//echo var_dump($tclass);
?>





<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <title>sub1</title>
       <style>
       body{
            background-color: green;
            }
       table{
        background-color: white;
        width: 80%;
        padding: 2;
        border-radius: 15px;
       }
       td{
        text-align: center;
       }
       input[type=number],input[type=date]{
        border-radius: 5px;
       }
       .submit{
        width:20%;
        border-radius: 15px;
        background-color: green;
        font-size: 25px;
        color: white;
       }
       .submit:hover{
         background-color: lightgreen;
         color: black;
       }
       input[type=number]{
        text-align: center;
       }
      
       
</style>

</head>
<body>
  <form name="aform" method="POST">
   <input type="hidden" name="tclasshidden" id="tclasshidden" value="">
  <center><h2><u><p id="sname"></p></u></h2></center>
                      <table align="center" id="table2">
                           <tr>
                               <td colspan=3><h3>CHOOSE DATE:
                               <input type="date" name="date"></h3></td>
                           </tr>
                           <tr class=row2>
                               <th><u>ROLL NO.</u></th>
                               <th><u>NAME</u></th>
                               <th><u>ATTENDANCE</u></th>
                           </tr>
                          <?php
                
                          if($sub1 != ""){
                          $stmt="SELECT * FROM $sub1";
                          $data=$conn->query($stmt);

                        $count=0; 
                        $i=0;
                         foreach($data as $row){

                            echo '<tr>
                               <td>'.$row['rollnumber'].'</td>
                               <td>'.$row['name'].'</td>
                               <td>Present:<input type="radio" name='.$i.' onclick="add('.$i.')">Absent:<input type="radio" name='.$i.' onclick="minus('.$i.')"></td>
                            </tr>';
                            $i++;
                            $count++;
                        }
                      }
                      
                        ?>
                         
                           <tr>
                               <td colspan=3><h3>TOTAL PRESENT:     
                                    <input type="number" name="number" value=0 id="number" ></h3>
                               </td>
                           </tr>
                           <tr>
                              <td colspan=3><input type="submit" value="Submit" name="submit" class="submit" onclick="check()"></td>
                           </tr>
     </table>

     

     

</form>

<script type="text/javascript">
  
    var arr=<?php echo json_encode($tclass); ?>;
    
    var arr2=JSON.parse(JSON.stringify(arr));
    //++arr[1];
    //alert(arr2[1]);
    //arr2[1]++;
    //alert(arr2[3]);
    //alert("typeof b");
    /*var b=["7","8"];
    
    var c=JSON.parse(JSON.stringify(b));
    c[1]=9;
    alert( b);*/

    function add(n){
     // alert(arr[n]);
      //++arr2[1];
      //alert(arr2[n]);
      if(arr[n] == arr2[n]){//alert(n);
        arr2[n]++;
        ++document.getElementById("number").value;
      }
      
    }
    

    function minus(n){
      //alert(n);
      //alert(arr2);
      
     
      if(arr[n]<arr2[n]){
        arr2[n]--;
        document.getElementById("number").value-=1;
      }
     
    }


    function check(){
      //alert(arr2);
      document.getElementById("tclasshidden").value= arr2;
       //alert(document.getElementById("tclasshidden").value);

    }

</script>


</body>
<?php 
//echo "string";
if(isset($_POST['submit'])){//echo "string";

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "FACULTY";

   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $tpresent=$_POST['number'];
  $date=$_POST['date'];
  $tabsent=$count-$tpresent;
  //echo $date;
  //echo $tabsent;


  $stmt="INSERT INTO sub1presentabsent(date,totalpresent,totalabsent) VALUES('$date','$tpresent','$tabsent');";
   $conn->exec($stmt);

  $classes=$_POST['tclasshidden'];  
  //var_dump($tclass);
  //echo($tclass[0]);
  $j=0;
  for($i=0;$i< strlen($classes);$i+=2){
    $tclass[$j]=$classes[$i];
    $j++;
  }
//var_dump($tclass);
  //echo (count($tclass));
  //$k=1;
  //echo (++$k);
  for ($i=0; $i < count($tclass); $i++) { 
    $j=$i;
    $j+=1;
    $update=$conn->prepare("UPDATE $sub1 SET totalclass=$tclass[$i] where rollnumber=$j");
    $update->execute();
  }
  $sub1tclass+=1;
  $update=$conn->prepare("UPDATE subjects SET totalclass='$sub1tclass' where subname='$sub1'");
  $update->execute();
  /*if ($update->rowCount() >0) {
   echo $update->rowCount()." records updated successfully";
  }
  echo $update->rowCount()." records updated successfully";
  $update="UPDATE sub3 SET totalclass="
  $stmt->execute();*/
}
$conn =null;
?>
</html>