﻿<!DOCTYPE html>
<html>
<head>
  <title>便捷查詢</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- 新 Bootstrap 核心 CSS 文件 -->
  <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/css/bootstrap.min.css">
  <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
  <script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
  <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
  <script src="https://cdn.staticfile.org/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "stock";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }
 
  $ItemCode = $_POST["ItemCode"];
  $BatchNo = $_POST["BatchNo"];
  $InQty = $_POST["InQty"];
  $OutQty = $_POST["OutQty"];
  

 
  

  
  function search($type){
      global $conn,$ItemCode,$BatchNo,$InQty,$OutQty;
    if(!empty($ItemCode)){
        $sql_s = "select * from stkbalancebybatch where ItemCode = '".$ItemCode."';" ;
        $result_s = mysqli_query($conn, $sql_s);
    }
    else if(!empty($BatchNo)){
        $sql_s = "select * from stkbalancebybatch where ItemCode = '".$ItemCode."';" ;
        $result_s = mysqli_query($conn, $sql_s);
    }
    
    while($row = mysqli_fetch_assoc($result_s)){
        
            echo
            "<table class=\"table\">
          <thead>
          <tr>
          <th>Search Deadline</th>
          </tr>
          </thead>
          <tbody>
          <tr> <td>ItemCode : </td><td>".$row["ItemCode"]."</td></tr>
          <tr> <td>BatchNo :</td><td>".$row["BatchNo"]."</td></tr>
          <tr> <td>InQty :</td><td>".$row["InQty"]."</td></tr>
          <tr> <td>OutQty :</td><td>".$row["OutQty"]."</td></tr>
          <tr> <td>inventory :</td><td>".$row["Balence"]."</td></tr>
            
          </tbody>
          </table>";
        }
    
  }
?>
</div>

</body>
</html>
