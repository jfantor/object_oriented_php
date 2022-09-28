<?php
include "dataBase.php";
$obj = new DataBase;
// $obj->insert('user',['first_name'=>'jf','last_name'=>'antor',
// 'username'=>'jfantor2','password'=>'12345','role'=>'1']);
// echo "Insert result is : ";
// echo "<pre>";
// print_r($obj->get_result());
// echo "</pre>";


// $obj->update('post',['title'=>'jft'],"post_id='58'");
// echo "update result is : ";
// echo "<pre>";
// print_r($obj->get_result());
// echo "</pre>";


// $obj->delete('user',"user_id='72'");
// echo "delete result is : ";
// echo "<pre>";
// print_r($obj->get_result());
// echo "</pre>";


// $obj->sql('SELECT * FROM user ');
// echo "delete result is : ";
// echo "<pre>";
// print_r($obj->get_result());
// echo "</pre>";

$join ="post ON user.user_id=post.author";
$col_name = "*";
$limit= 3;
$where = null;
$order= null;


$obj->select('user',$col_name,$join,$where,$order,$limit);
echo "delete result is : ";
echo "<pre>";
print_r($obj->get_result());
echo "</pre>";

$obj->pagination('user',$join,$where,$limit);

?>