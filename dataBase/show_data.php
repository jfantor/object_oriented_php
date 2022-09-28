<?php
include "dataBase.php";
$obj = new DataBase;
$join ="post ON user.user_id=post.author";
$col_name = "*";
$limit= 3;
$where = null;
$order= null;


$obj->select('user',$col_name,null,$where,$order,$limit);
$result = $obj->get_result();
// echo "<pre>";
// print_r($result);
// echo "</pre>";
// ,"post_id"=>$p_id,"title"=>$p_tital,
// "description"=>$p_descrip,"category"=>$p_cat,"post_date"=>$p_date,"author"=>$p_author,"post_img"=>$p_img

echo "<table border='1' width='90%'>
    <tr>
        <th>User Id</th>
        <th>User Name</th>
        <th>User Role</th>
    </tr>
";
foreach($result as list("user_id"=>$u_id,"first_name"=>$u_fname,"last_name"=>$u_lname,
"username"=>$u_uname,"password"=>$u_pass,"role"=>$u_role)){
echo "<tr>
        <td>$u_id</td>
        <td>$u_uname</td>
        <td>$u_role</td>
     </tr>
";

}
echo '</table>';

$obj->pagination('user',$join,$where,$limit);
?>