<html>
<head>
<title>Customer Status</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>

<body>
<h1>Customer Status</h1>
<p>&nbsp;</p>
<?php 

// DATABASE CONNECTION
$hostname = "localhost";
$username = "odini01";        
$password = "Nscc240!@#";     
$dbname   = "odini01";   

$conn = new mysqli($hostname, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// GET ACTION AND ID
$action = isset($_REQUEST["action"]) ? $_REQUEST["action"] : '';
$id     = isset($_REQUEST["id"]) ? $_REQUEST["id"] : null;

// Only read customer fields if action is add or update
if ($action == 'a' || $action == 'u') {
    $custLast    = isset($_REQUEST["custLast"]) ? $_REQUEST["custLast"] : '';
    $custFirst   = isset($_REQUEST["custFirst"]) ? $_REQUEST["custFirst"] : '';
    $custAddress = isset($_REQUEST["custAddress"]) ? $_REQUEST["custAddress"] : '';
    $custCity    = isset($_REQUEST["custCity"]) ? $_REQUEST["custCity"] : '';
    $custState   = isset($_REQUEST["custState"]) ? $_REQUEST["custState"] : '';
    $custZip     = isset($_REQUEST["custZip"]) ? $_REQUEST["custZip"] : '';
    $custEmail   = isset($_REQUEST["custEmail"]) ? $_REQUEST["custEmail"] : '';
    $custPhone   = isset($_REQUEST["custPhone"]) ? $_REQUEST["custPhone"] : '';
}

$dt = date('Y-m-d');

// ADD CUSTOMER
if ($action == 'a') {
    $query = "INSERT INTO custTab VALUES (
        null, 
        '$custLast', 
        '$custFirst', 
        '$custAddress', 
        '$custCity', 
        '$custState', 
        '$custZip', 
        '$custEmail', 
        '$custPhone',
        '$dt', 
        null
    )";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo "<h3>Thanks $custFirst $custLast for entering your information.</h3>";
}

// UPDATE CUSTOMER
elseif ($action == 'u') {
    $query = "UPDATE custTab SET
        custLast = '$custLast',
        custFirst = '$custFirst', 
        custAddress = '$custAddress', 
        custCity = '$custCity', 
        custState = '$custState', 
        custZip = '$custZip', 
        custEmail = '$custEmail',
        custPhone = '$custPhone',
        custChangeDate = '$dt' 
        WHERE custNo = '$id'";
    mysqli_query($conn, $query) or die(mysqli_error($conn));
    echo "<h3>Update Successful</h3>";
}

// DELETE CUSTOMER
elseif ($action == 'd') {
    if ($id !== null && is_numeric($id)) {
        $query = "DELETE FROM custTab WHERE custNo = $id";
        mysqli_query($conn, $query) or die(mysqli_error($conn));
        echo "<h3>Customer deleted successfully.</h3>";
    } else {
        echo "<h3>No valid customer ID specified for deletion.</h3>";
    }
}

// INVALID ACTION
else {
    echo "<h3>No valid action specified.</h3>";
}

mysqli_close($conn);
?>

<p><a href="customer_list4.php">Return</a></p>
<p>&nbsp; </p>
</body>
</html>