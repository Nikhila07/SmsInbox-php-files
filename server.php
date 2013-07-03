<?php

$connect = mysqli_connect("127.0.0.1","root","nikki","sms");

if(mysqli_connect_errno($connect))
{
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
else
{
    echo "success";
}


$sql="CREATE TABLE sms(  id INT NOT NULL AUTO_INCREMENT,
						 PRIMARY KEY (id),
                         user VARCHAR(15) NOT NULL,
                         sender VARCHAR(155) NOT NULL,
                         sms_body TEXT(1000) NOT NULL,
                        
                         time VARCHAR(20) NOT NULL )";

// Execute query
if (mysqli_query($connect,$sql))
  {
  echo "Table persons created successfully";
  }
else
  {
  echo "Error creating table: " . mysqli_error($connect);
  }
mysqli_close($connect);
?> 



