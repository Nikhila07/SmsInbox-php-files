<?php
$connect = mysqli_connect("127.0.0.1","root","nikki","sms");
$user = $_GET["user"];

if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$sql = "SELECT sender,time from (select sender,time,max(time) from sms where user='" . $user . "' group by sender) as T;";
$result = mysqli_query($connect,$sql);

$sync_info=  array();
$sync_info['@123hash321@'] = '1'; 
while ($row = mysqli_fetch_assoc($result)) {
    $sync_info[$row['sender']] = $row['time'];
}

$json = array('sync_info' => $sync_info);
mysqli_close($connect);
//echo the json string 
echo json_encode($json);

?>
