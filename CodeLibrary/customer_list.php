<html>
<head>
<title>List Customers</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>

<h1>List Customers</h1>
<p><br>
  <br>
  
  
  <?php

// this connects To database
$hostname = "localhost";
$username = "odini01";        
$password = "Nscc240!@#";     
$dbname   = "odini01"; 

$conn = new mysqli($hostname, $username, $password, $dbname );

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$query = "select * from custTab";
$result = mysqli_query($conn, $query);
// this function returns how many rows (hits) were in the query
$num = mysqli_num_rows($result);
print "There are currently $num customers on file<br><br>";

// and this loop proccess the records from the query
// they were written into an associative array
// and are now returned by key
// then the results are printed on one line
while ($row = mysqli_fetch_assoc($result)) {
	$custNo = $row['custNo'];
	$custFirst = $row['custFirst'];
	$custLast = $row['custLast'];
	$custAddress = $row['custAddress'];
	$custCity = $row['custCity'];
// this is the same basic print line as before	
	print "$custNo $custFirst $custLast $custAddress $custCity ";
// the next 3 lines create a dynamic link to the update program
// indicating that this is a change and passing the customer no
	print "<a href=customer_update3.php?action=u&id=";
	print $custNo;
	print ">Change</a><br>";	
// or you could do it in a single line (commented out below)
//	print "<a href=customer_update2.php?action=c&id=" . $custNo . ">Change</a><br>";	
}

?>
</p>
<!-- this gives us a link to add a customer -->
<p><a href="customer_update3.php?action=a">Add a Customer</a></p>
<p><a href="index.html">Return </a></p>
</body>
</html>
