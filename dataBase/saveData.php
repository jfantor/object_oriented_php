<?php
include "dataBase.php";
$obj = new DataBase();

$fname= $_POST["fname"];

$lname= $_POST["lname"];

$uname= $_POST["uname"];

$pass= $_POST["pass"];

$role= $_POST["role"];


$value = ["first_name"=>$fname,"last_name "=>$lname,"username"=>$uname,
"password "=>$pass,"role"=>$role];

if($obj->insert("user",$value)){
    echo "<h2> Data Is Inserted Successfully . </h2>";
}else{
    echo "<h2> Data Is Not Inserted Successfully . </h2>";
}
?>