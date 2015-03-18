<?php
include_once('settings.php')
?>
<ol>
    <?php
    $name=$_GET['nameSearch'];
        $result = mysql_query("Select * from user where name like '%$name%' limit 20");
        while($row=mysql_fetch_array($result)){
            //header("Content-type: image/png");
            echo '<li>'."<img src=".$row['profile_img_url']."  width='48' height='48'/>" .' ' .$row['name']."-".$row['username'];
            //echo "<img src=".$row['profile_img_url']."/>";

        }
        mysql_close($con);
    ?>
</ol>


