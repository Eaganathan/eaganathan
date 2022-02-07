<?php
session_start();
include"database.php";

if(!isset($_SESSION["AID"]))
{
    header("location:alogin.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin page</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div id="container">
        <div id="headding">
            <h1> admin page</h1>
        </div>
        <div id="wrapper">
         <h3 id="header">change password </h3>
         <div id="center">
         <?php
         if(isset($_POST["submit"]))
         {
             $sql="SELECT * from admin WHERE APASS='{$_POST["OPASS"]}' and AID='{$_SESSION["AID"]}'";
             $res=$db->query($sql);
             if($res->num_rows>0)
             {
                 $s="update admin set APASS='{$_POST["NPASS"]}'WHERE AID=".$_SESSION["AID"];
                 $db->query($s);
                 echo"<p class='sucess'>password changed sucess </p>";
             }
             else
             {
                 echo"<p class='error'> invalid password </p>";
             }
        }
         ?>

         <form action="<?php echo $_SERVER["PHP_SELF"];?> method="post">
         <label>old password</label>
         <input type="password" name="opass" required>
         <label> new password</label>
         <input type="password" name="npass" required>
         <button type="submit" name="submit"> update password</button>
         </form>

         </div>
        
           
            
             </div>
                 <div id="navi">
                     <?php 
                          include "adminsidebar.php"
                     ?>

                </div>
           <div id="copyrights">
            <p>copyrights &copy; Eaganathan 2021 </p>
            </div>
    </div>


</body>

</html>