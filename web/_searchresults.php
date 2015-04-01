<?php
include_once('_settings.php');
?>
<ol>
    <?php
    $name = $_GET['nameSearch'];
    $result = mysql_query("SELECT * FROM user where name like '%$name%' limit 20");
    while ($row = mysql_fetch_array($result)) {
        echo '<li>' . $row['name'] . " - " . $row['username'];
        echo "</li>";
    }
    //    mysql_close($con);
    ?>
</ol>
<?php include_once('_close.php'); ?>
