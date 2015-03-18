<?php 
 //echo date("H:i:s");  
$searchName = $_GET['searchName'];
echo "in AJAXquery.php   ";
echo 'searchName= ' ; echo $searchName; 

    if (!($connection = mysql_connect("mysql.seis752.com","seis752john","ySAw48qrLe")))  {
       die("Error at mysql_connect" . mysql_error()); 
     }
    if (!mysql_select_db("seis752john_db",$connection))  {
        die("Error at select_db" . mysql_errorno() .": " . mysql_error()); }

    $query = "SELECT `id`, `name` FROM `users` WHERE `name` LIKE '%" . $searchName . "%' LIMIT 0, 30 ";
  // $query = "SELECT `id`, `name` FROM `users` WHERE `name` LIKE '%Lael Tillman%' LIMIT 0, 30 ";
    if (!($result = mysql_query($query,$connection))) {
        die("Error at insert_query");  }
  
    print("<TABLE BORDER>\n");
    printf("<TR><TD>ID</TD><TD>userName</TD></TR>\n");
    while ($row = mysql_fetch_array($result)) {
    printf ("<TR><TD>%s</TD><TD>%s</TD></TR>\n", $row[0], $row[1]);
 //       echo $row[0];
}
printf("</TABLE>\n");
   
mysql_free_result($result);
    if (!mysql_close($connection))  {
        die("Error " . mysql_errorno() .": " . mysql_error()); }
  
?>