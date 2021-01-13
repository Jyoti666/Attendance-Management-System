<!DOCTYPE html>
<html>
<head>
      <meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>PASSWORD CREATION</title>
<style type="text/css">
  body{
    background-color: green;
  }
  table{
    background-color: white;
    margin-top: 150px;
    width: 30%;
    padding: 2;
    border-radius: 15px;
  }
  td{
    font-size: 20px;
  }
input[type=password]{
  width: 50%;
  border-radius: 5px;
  margin-left: 15px;
  font-size: 15px;
}
input[type=submit]{
  background-color: green;
  width:30%;
  margin-left: 40px;
  border-radius: 15px;
  color: white;
  font-size: 25px;
}
input[type=submit]:hover{
   background-color: lightgreen;
   color:black;
}
p{
  color: red;
}
</style>
</head>
<body>
      <form name="form" target="_self" method="POST">
            <table align="center">
                                  <tr>
                                      <td>Enter Your New Password:<br>
                                         <input type="password" name="npassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Write your password here..." required>
                                      </td>
                                   </tr>
                                  <tr>
                                      <td>Confirm Your New Password:<br>
                                         <input type="password" name="cpassword" id="cpassword" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" placeholder="Write your password here..." required>
                                      <p id="wpass"></p></td>
                                  </tr>
                                  <tr>
                                     <td colspan=2 align="center"><input type="submit" name="submit1" value="SUBMIT" onclick="return validpassword()"></td>
                              </tr>                        
             </table>
             <input type="hidden" name="hidden" value="" id="hidden">
        </form>
        <script type="text/javascript">
        
          document.getElementById("hidden").value= "<?php echo $_POST['email']; ?>";
           
          function validpassword(){
           if(document.form.npassword.value != "" && document.form.cpassword.value !=""){
            npass=document.form.npassword.value;
            cpass=document.form.cpassword.value;
            if (npass == cpass) {
              alert("Password changed successfully");
              return true;
            }
            else{
              document.getElementById("wpass").innerHTML="Mismatch between your Newpassword and Confirm password";
              return false;
            }
          }
          
          }
        </script>
</body>
</html>

  



<?php

if(isset($_POST['submit1'])){
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "FACULTY";

   $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    //$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  
  $password=$_POST['cpassword'];
  $email=$_POST['hidden'];

  $stmt="UPDATE f_information SET password= '$password' where email='$email';";
   $conn->exec($stmt);
   header("location:LOGIN PAGE.php");

}
$conn =null;  
?>                                 