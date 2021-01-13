<?php

$pdo=new PDO("mysql:host=localhost","root","");
$exist=$pdo->query("SELECT COUNT(*) FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME='faculty'");

if((bool) $exist->fetchColumn()){
    $dbstatus="true";
}
else{
    $dbstatus="false";
}


$error="";
$success="";
if(isset($_POST['submit'])){
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FACULTY";
//try{
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $email=$_POST['mail'];  
        $pass=$_POST['pass'];

        $stmt = $conn->prepare("SELECT * FROM f_information");
        $stmt->execute();
        $dbemail=$stmt->fetchColumn(1);
        
        $stmt = $conn->prepare("SELECT * FROM f_information");
        $stmt->execute(); 
        $dbpass=$stmt->fetchColumn(2); 
         
        if($dbemail == $email ){
            if($dbpass == $pass){
                $error="";
                
                $success="LOG-IN SUCCESSFUL";
                header("Location:HOME PAGE.php");
           }
           else{
               $error="Wrong Password";
               $success="";
           }
        }
        else{
             $error="Wrong Email";
             $success="";
         }
    //}

/*catch(PDOException $e){
    echo $stmt."<br>".$e->getMessage();
}*/
}
$conn = null;


?> 


<!DOCTYPE html>
<html>
 <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
 <title>LOGIN PAGE </title>
<style type="text/css">
        body{
		    background-color:green;
		}
        a:link{
            color:red;
        }
        a:visited{
            color:red;
        }
        a:hover{
            color:purple;
        }
        a:active{
            color:blue;
        }
        table{
            margin-top:160px;
            margin-left: 380px;
            width:50%;
            border-radius:15px;
        }
        input[type=email],input[type=password]{
            width: 90%;
            padding: 12px 20px;
            margin: 8px 8px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius:10px;
        }
        input[type=submit]{
            background-color: green;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            border-radius: 15px;
        }
        a{
            color: red;
        }
        input[type=submit]:hover{
            background-color: lightgreen;
            color:black;
        }
        p{
            text-align: center;
            color: red;
        }

</style>		
 </head>
 <body>
     <form  name="form"  method="POST"  target="_self">
          <table align="center" bgcolor=white>
                 <tr> 
                <td>Enter Email:<br>
                <input type="email" name="mail" id="email" placeholder="Write Email" autofocus required><p id="mail"><?php if($error=="Wrong Email"){ echo $error;} ?></p>
                </td>
                </tr>
                <tr>
                <td>Enter Password:<br>
                 <input type="password" name="pass" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Write your password here..." required>
                <p id="pass"><?php if($error=="Wrong Password"){echo $error;} ?></p>
                </td>
                </tr>
                <tr>
                <td colspan=2 align="center"><input type="submit" name="submit" value="Login" onclick="return valid()"></td>
                </tr>
                <tr><td colspan=2 align="center"><a href="LOG UP.html" target=_blank>LOG UP</a></td></tr>
                <tr><td colspan=2 align="center"><a href="FORGOT PASSWORD.php" target=_blank>FORGET PASSWORD</a></td></tr>
          </table>
    </form>
     <script type="text/javascript">
        function valid(){
         document.getElementById("email").value=document.getElementById("email").value.toUpperCase();
         if(<?php echo $dbstatus; ?> == true){
            return true;
         }
         else{
            alert("First you create your account.");
            return false;
         }
        }
     </script>               
 </body>
 </html>         