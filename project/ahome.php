<?php
session_start();
include"database.php";
function countRecord($sql,$db)
{
    $res=$db->query($sql);
    return $res->num_rows;
}
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

         <h3 id="header">welcome admin</h3>
            <div id="center">
            <ul class="record">
            <li>Total Students:<?php echo countRecord("select * from student",$db); ?></li>
            <li>Total Books :<?php echo countRecord("select * from book",$db); ?></li>
            <li>Total Request:<?php echo countRecord("select * from request",$db); ?></li>
            <li>Total Comments:<?php echo countRecord("select * from comment",$db); ?></li>
            </ul>
           
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