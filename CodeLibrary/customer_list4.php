<html>
<head>
<title>List Customers</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>

<h1>List Customers</h1>

<?php
$hostname="localhost";
$username="odini01";
$password="Nscc240!@#";
$dbname="odini01";

$conn = new mysqli($hostname, $username, $password, $dbname);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }

$query = "SELECT * FROM custTab ORDER BY custNo";
$result = mysqli_query($conn, $query);
$num = mysqli_num_rows($result);

echo "<p>There are currently $num customers on file.</p>";

echo "<ul>"; // start unordered list

while($row = mysqli_fetch_assoc($result)) {
    $custNo     = $row['custNo'];
    $custFirst  = $row['custFirst'];
    $custLast   = $row['custLast'];
    $custCity   = $row['custCity'];

    echo "<li>";
    echo "$custNo - $custFirst $custLast ($custCity) ";
    echo "<a href='customer_update3.php?action=u&id=$custNo'>Change</a> | ";
    echo "<a href='customer_action_4.php?action=d&id=$custNo' onclick=\"return confirm('Are you sure you want to delete this customer?');\">Delete</a>";
    echo "</li>";
}

echo "</ul>";

echo "<p><a href='customer_update3.php?action=a'>Add a Customer</a></p>";
?>

<p><a href="index.html">Return</a></p>

</body>
</html>