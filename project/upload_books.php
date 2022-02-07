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
         <h3 id="header">upload book </h3>
         <div id="center">
         <?php
         if(isset($_POST["submit"]))
         {
            
           $target_dir="upload/";
          $target_file=$target_dir.basename($_FILES["efile"] ["name"]);
          if(move_uploaded_file($_FILES["efile"]["tmp_name"],$target_file))
          {
              $sql="insert into book(BTITLE,KEYWORDS,FILE) values ('{$_POST["bname"]}','{$_POST["keys"]}','{$target_file}')";
              $db->query($sql);
              echo"<p class='sucess'>sucessfully upoaded</p>";
          }
              else
              {
                  echo "<p class='error'> failed to upload </p>";
              }
        }
         ?>

         <form action="<?php echo $_SERVER["PHP_SELF"];?> method="post" enctype="multipart/form-data">
         <label>book tilte</label>
         <input type="text" name="bname" required>
         <label> keyword</label>
         <textarea name="keys" required></textarea>
         <label> upload file</label>
         <input type="file" name="efile required">
         <button type="submit" name="submit"> upload books</button>
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