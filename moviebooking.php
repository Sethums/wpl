<?php
$conn=mysqli_connect('localhost','root','','dbdemo');
if(!$conn)
die('Connecction error'.mysqli_connect_error());

	
?>

<html>
<head></head>
<style>
	body{
		margin:2%;
		background-color:#b8a3bf;

	}
	table
	{
		margin:auto;
		border-spacing:25px;
		border-style:insert;
	}
	th{
		text-align:left;
		color:blue;
	}
	input[type=text],
	input[type=number],
	input[type=date]
	{
		width:200%;
		box-sizing: border-box;
		height: 30px;
	}
	input[type=submit]{
		width:140px;
		background-color: #bf2ea2;
		color:white;
		height: 40px;

	}
</style>
<script language="javascript" type="text/javascript">
	function Validation()
	{
		var book=document.form1.sno.value;
		var nos=document.form1.seat.value;
		var format=/^[a-zA-Z0-9]+$/;
if(document.form1.mname.value=" " && document.form1.sno.value=" " && document.form1.bdate.value=" " && document.form1.seat.value=" ")
	
	{
		alert("Must fill all fields");
window.location='moviecreation.php'
}
if(!(document.form1.mname.value.match(format))
{
	alert("Movie name can't contain special symbols")
	window.location='moviecreation.php'
	}
if(isNaN(book) && isNaN(nos))
{
alert("Seat Number and number of seats must be digits");
window.location='moviecreation.php'
}
}
</script>
<body>
<form method="POST" name="form1" onsubmit="return Validation()">
	<h2 style="color:#bf2ea2;"><center>MOVIE BOOKING</center></h2>
	<table>
		<tr>
			<td>
Movie Name:</td><td><input type="text" name="mname"></td></tr>
<tr><td>Seat Number:</td><td><input type="number" name="sno"></td></tr>
<tr><td>Booking Date:</td><td><input type="date" name="bdate"></td></tr>
<tr><td>No.of Seats:</td><td><input type="number" name="seat"></td></tr>
<tr><td>
	
<input type="submit" name="sub" value="Submit"></td></tr>
</table>
</form>
</body>
</html>
<?php
if(isset($_POST['sub']))
{
	$m=$_POST['mname'];
	$s=$_POST['sno'];
	$b=$_POST['bdate'];
	$n=$_POST['seat'];
	$ins="insert into tbl_movie(movie_name,seatno,book_date,no_of_seats) values('$m',$s,'$b',$n)";
$r=mysqli_query($conn,$ins);
if(!$r)
echo"Error creating in insertion".mysqli_error($conn);
else
{
$sql="select * from tbl_movie";
$res=$conn->query($sql);
?>
<html>
<table border='1'>
	<tr>
		<td>Booking Id</td>
		<td>Movie Name</td>
		<td>Seat number</td>
		<td>Booking Date</td>
		<td>No.of Seats</td>
	</tr>
	<?php
	if($res->num_rows>0)
	{
		while($row=$res->fetch_assoc()){
			?>
			<tr>
				<td><?php echo $row["book_id"]?></td>
				<td><?php echo $row["movie_name"]?></td>
				<td><?php echo $row["seatno"]?></td>
				<td><?php echo $row["book_date"]?></td>
				<td><?php echo $row["no_of_seats"]?></td>
				</tr><?php
		}
	}

$conn->close();
?>
</table></html>


<?php
}
}
?>