<?php
include "dataBase.php";
$obj = new DataBase();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From </title>
</head>
<body>
   <form action="saveData.php" method='post'>
        
            <label>Fast Name</label>
            <input type="text" name="fname" require>
            <br><br>
        
        <div class="dataIn">
            <label>last Name</label>
            <input type="text" name="lname"require>
            <br><br>
        </div>
        <div class="dataIn">
            <label>User Name</label>
            <input type="text" name="uname">
            <br><br>
        </div>
        <div class="dataIn">
            <label>Password</label>
            <input type="password" name="pass">
            <br><br>
        </div>
        <div class="dataIn">
            <label>Role</label>
            <input type="number" name="role">
            <br><br>
        </div>
        <input type="submit" name="save" value="save data">
   </form> 
</body>
</html>