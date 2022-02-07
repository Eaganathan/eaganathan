<?php
session_start();
include"database.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin login</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="container">
        <div id="headding">
            <h1>digital library</h1>
        </div>
        <div id="wrapper">

         <h3 id="header">Admin login here</h3>
         <div id="center">
             <?php
             if(isset($_POST ["submit"]))
             {
               $sql="SELECT * FROM admin where ANAME='{$_POST["aname"]} ' and  APASS='{$_POST["apass"]}' ";
               $res=$db->query($sql);
               if($res->num_rows>0)
               {
                   $row=$res->fetch_assoc();
                   $_SESSION["AID"]=$row["AID"];
                   $_SESSION["ANAME"]=$row["ANAME"];

                  header("location:ahome.php") ;              }
                else
               {
                   echo"<p class='error'>invalid user details</p> ";
               }
             }

             ?>
         <form action="alogin.php" method="post">
             <label>Name</label>    
             <input type="text" id="st" name="aname" required>
             <label>Password</label>
             <input type="password" id="st" name="apass" required> <br>
             <button type="submit" id="sm" name="submit">login now</button>
                           
         </form>
         </div>
         </div>
        <div id="navi">
        <?php 
            include "sidebar.php"
            ?>

        </div>
        <div id="copyrights">
            <p>copyrights &copy; Eaganathan 2021 </p>
        </div>
    </div>

</body>

</html>