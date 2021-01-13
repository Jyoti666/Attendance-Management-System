<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "FACULTY";
try{
$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT * FROM f_information");
        $stmt->execute();
        $dbemail=$stmt->fetchColumn(1);
        
        $stmt = $conn->prepare("SELECT * FROM f_information");
        $stmt->execute(); 
        $dbdob=$stmt->fetchColumn(3); 
 }        
        

catch(PDOException $e){
    echo $stmt."<br>".$e->getMessage();
}

$conn = null;


?> 




<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
<title>FORGOT PASSWORD</title>
<style>
       body{
            background-color:green;
            }
       table{
        margin-top: 100px;
            margin-left:400px;
            width:50%;
            border-radius: 15px;
       }

       input[type=email],input[type=date]{
            width: 90%;
            padding: 12px 20px;
            margin: 8px 8px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius:10px;
        }
        input[type=submit]{

            width: 30%;
            padding: 12px 20px;
            margin: 8px 8px;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
            border-radius:10px;
            background-color: green;
            color:white;
        }
        input[type=submit]:hover{
          background-color: lightgreen;
          color: black;
        }
        p{
          color: red;
        }
        
</style>
</head>
<body>
      <form name="form"  method ="POST" action="PASSWORD CREATION.php" target="_self" onsubmit="return validate(document.form.email,document.form.dob)">
            <table align="center" frame="box" bgcolor="white" >
                                  <tr>
                                      <td>Enter Your E-mail Id:<br>
                                      <input type="email" name="email"  placeholder="Write your email-id here..." autofocus required><p id="wemail"></p></td>
                                   </tr>
                                   <tr>
                                      <td>Enter Your D.O.B:<br>
                                      <input type="date" name="dob" id="dob" required><p id=wotp></p></td>
                                   </tr>
                                  <tr>
                                       <td align=center><input type="submit" name="submit"  value="submit"></td>
                                  </tr>
                                                    
             </table>
        </form>


        <script type="text/javascript">
              

            function validate(emailvalue,dob)
                            {
                                emailvalue.value=emailvalue.value.toUpperCase();   
                                if(emailvalue.value != ""){
                                       
                                           if (emailvalue.value == "<?php echo $dbemail; ?>" && dob.value == "<?php echo $dbdob; ?>") {
                                                return true;
                                                
                                            }
                                            else{
                                                   if(emailvalue.value != "<?php echo $dbemail; ?>" && dob.value != "<?php echo $dbdob; ?>"){
                                                      alert("You have entered an wrong Email-id and wrong D.O.B");
                                                      return false;
                                                   }
                                                   else{
                                                      if(emailvalue.value != "<?php echo $dbemail; ?>"){
                                                        alert("You have entered an wrong Email-id");
                                                        return false;
                                                      }
                                                      else{
                                                          alert("You have entered an wrong D.O.B");
                                                          return false;
                                                      }
                                                   }
                                            }
                                  }
                                  
                                
                              }
         
                       
        </script>
</body>
</html>

                   