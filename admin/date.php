<?php
$now = time();
$email = "admin@gmail.com";
$connction = mysqli_connect("localhost", "root", "", "adminpanel");
$query = "SELECT date FROM deposit where memberid='$email'";
$query_run = mysqli_query($connction, $query);
if (mysqli_num_rows($query_run) > 0) {
while ($row = mysqli_fetch_assoc($query_run)) {
    $ddate = $row['date'];
     }
 } else {
   echo "No Record Found";
  }
$then = strtotime($ddate);
$intval = ceil($now - $then)/86400;
echo $intval;

?>

<?php   



?>