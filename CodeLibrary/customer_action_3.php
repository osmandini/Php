<html>
<head>
<title>Customer Update 4</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<h1>Customer Status</h1>
<p>&nbsp;</p>
<?php 

// this connects to database
$hostname="localhost";    
$username="odini01";   
$password="Nscc240!@#";    
$dbname="odini01";    

$conn = new mysqli($hostname, $username, $password, $dbname );
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

// ------------------------------
// GET ACTION AND ID (exact lines as requested)
$action = $_REQUEST["action"];
$id     = $_REQUEST["id"];

// ------------------------------
// GET FORM DATA
$custFirst   = $_REQUEST["custFirst"];
$custLast    = $_REQUEST["custLast"];
$custAddress = $_REQUEST["custAddress"];
$custCity    = $_REQUEST["custCity"];
$custState   = $_REQUEST["custState"];
$custZip     = $_REQUEST["custZip"];
$custEmail   = $_REQUEST["custEmail"];
$custPhone   = $_REQUEST["custPhone"];
$dt          = date('Y-m-d');

// ------------------------------
// ADD CUSTOMER
if ($action == 'a') {
    $query = "INSERT INTO custTab (
                custLast, custFirst, custAddress, custCity, custState,
                custZip, custEmail, custPhone
              ) VALUES (
                '$custLast', '$custFirst', '$custAddress', '$custCity', '$custState',
                '$custZip', '$custEmail', '$custPhone'
              )";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    print "<h3>Thanks $custFirst $custLast — Customer Added.</h3>";
}

// ------------------------------
// UPDATE CUSTOMER
if ($action == 'u') {
    $query = "UPDATE custTab SET
                custLast    = '$custLast',
                custFirst   = '$custFirst',
                custAddress = '$custAddress',
                custCity    = '$custCity',
                custState   = '$custState',
                custZip     = '$custZip',
                custEmail   = '$custEmail',
                custPhone   = '$custPhone',
                custChangeDate = '$dt'
              WHERE custNo = $id";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    print "<h3>Customer $custFirst $custLast Updated Successfully.</h3>";
}

// ------------------------------
// DELETE CUSTOMER
if ($action == 'd') {
    $query = "DELETE FROM custTab WHERE custNo = $id";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    print "<h3>Customer $id Deleted Successfully.</h3>";
}

?>

<p><a href="customer_list4.php">Return</a></p>
<p>&nbsp;</p>
</body>
</html>