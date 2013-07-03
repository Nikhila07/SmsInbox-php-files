<?php
$connect = mysqli_connect("127.0.0.1","root","nikki","sms");

$json = json_decode($_REQUEST['myjson'], true);


$user = $json['user'];
$smses = $json['smses'];

foreach ($smses as $sms){
	$sql = "INSERT INTO sms(user,sender,sms_body,time)
			VALUES
			('" . $user . "', '" . $sms['sender'] . "','" . $sms['sms'] .  "',' " . $sms['date'] . "');";

	echo $sql;
	
if (mysqli_query($connect,$sql))
  {
  echo "Inserted successful";
  }
else
  {
  echo "Failed to insert: " . mysqli_error($connect);
  }


}
mysqli_close($connect);
?>
