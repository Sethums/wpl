<?php
$conn=mysqli_connect('localhost','root','','dbdemo');
if(!$conn)
die('Connection error'.mysqli_connect_error());
else
echo "Connected successfully";
$sql="CREATE TABLE tbl_movie( book_id INT NOT NULL AUTO_INCREMENT , movie_name VARCHAR(50) NOT NULL , seatno INT NOT NULL , book_date DATE NOT NULL , no_of_seats INT NOT NULL , PRIMARY KEY(book_id) )";
if(mysqli_query($conn,$sql))
echo "Table created Successfully";
else
echo "Error creating table:".mysqli_error($conn);
mysqli_close($conn)

	
?>