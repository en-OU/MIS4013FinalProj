<?php
$pageTitle = "Home";
include "header.php";
?>

<!DOCTYPE html> 
<html lang="en">
<head>
<div style="text-align: center; padding: 50px;">
  <span style="background-color: white; font-weight: bold; color: #006400; font-size: 50px; border-style: dashed; border-radius: 10px; border-width: 2px; display: inline-block; padding: 10px;">Home</span>
  <br/>
  <br/>
</div>
  
<link rel="stylesheet" href="grid-styles.css">
  <style>
        body {
            background-image: url('Bookpile.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            margin: 0;
            background-color: rgba(255, 255, 255, 0.5); 
        }
    </style>
  
</head>
<body>
  <div style="display: flex; flex-direction: row; gap: 20px; justify-content: center; align-content: center;">
     <div>
          <span style="background-color: white; width: 400px; color: #006400; font-size: 25px; border-style: dashed; border-radius: 10px; border-width: 2px; display: inline-block; padding: 10px;">
          Tattered Cover offers local book clubs offering popular books! Find out more by clicking the image.
          </span>
     </div>
     <div>
       <a href="https://www.tatteredcover.com/pages/tattered-cover-book-clubs"> 
         <img src="TC_Book_Clubs_New_Website_Blo" alt="Button Image" style="width: 100px; height: auto;">
       </a>
     </div>
</div>

</body>
