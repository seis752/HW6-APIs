<?php
    include_once('settings.php');

if(isset($_POST['sending'])){
    $data = mysql_real_escape_string($_POST['sending']);
    if(!empty($data)){
        $query = mysql_query("SELECT * FROM user WHERE name LIKE '%$data%' limit 20");
        if(mysql_num_rows($query)!=0){
            while($row = mysql_fetch_assoc($query)){
                //header("Content-type: image/png");
                echo '<li>'."<img src=".$row['profile_img_url']."  width='48' height='48'/>" .' ' .$row['name']."-".$row['username'];
            }
        }
        else
        {
            echo "No users found!";
        }
    }
    else
    {
        echo "ERROR";
    }
}
else
{
    echo "ERROR";
}
?>


