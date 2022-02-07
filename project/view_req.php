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
         <h3 id="header">view requests details</h3>
         <?php
         $sql="SELECT * FROM book";
         $res=$db->query($sql);
         if($res->num_rows>0)
         {
             echo"<table>
             <tr>
             <th> SNO</th>
             <th>BOOK NAME </th>
             <th>KEYWORDS</th>
             <th> VIEW </th>
             </tr>
             
             "; 
             $i=0;
             while($row=$res->fetch_assoc())
             {
                 $i++;
                 echo"<tr>";
                 echo"<td>{$i}</td>";
                 echo"<td>{$row["BTITLE"]}</td>";
                 echo"<td>{$row["KEYWORDS"]}</td>";
                 echo"<td><a href='{$row["FILE"]}'target='_blank'>view  </a></td>";
                 echo"<tr>";

             }
             echo"</table>";
         }
         else{
             echo"<p class='error'>no students records found</p>";
         }
         ?>
           
           
            
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