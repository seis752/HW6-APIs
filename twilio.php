<html>
<meta http-equiv="refresh" content="1">
<body>
<br />
<a href="index.php">Link to index page  </a>
<table border="1">
<?php
include_once("config.php");

$sql = "SELECT * FROM twilio order by ts desc limit 50";

print "";
if ($result=mysqli_query($db,$sql))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
  {
    printf("<tr><td>%s</td><td><pre>%s</pre></td></tr>",$row[0],$row[1]);
  }
  // Free result set
  mysqli_free_result($result);
}
mysqli_close($db);
?>
</table>

</body>
</html>

