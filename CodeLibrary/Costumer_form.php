<!DOCTYPE html>
<html>
<head>
  <title>Customer Form</title>
</head>
<body>
  <h2>Customer Form</h2>

  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $address = $_POST["address"];
    $state = $_POST["state"];
    $zip = $_POST["zip"];

    if ($name == NULL) {
      echo "Name is required.<br>";
    }
    if ($address == NULL) {
      echo "Address is required.<br>";
    }
    if ($state == NULL) {
      echo "State is required.<br>";
    }
    if ($zip == NULL) {
      echo "Zip is required.<br>";
    }
    else if (!is_numeric($zip)) {
      echo "Zip must be numeric.<br>";
    }

    if ($name != NULL && $address != NULL && $state != NULL && $zip != NULL && is_numeric($zip)) {
      echo "<h3>Form Submitted Successfully!</h3>";
      echo "Name: $name<br>";
      echo "Address: $address<br>";
      echo "State: $state<br>";
      echo "Zip: $zip<br>";
    }
  }
  ?>

  <form method="post" action="">
    Name: <input type="text" name="name"><br><br>
    Address: <input type="text" name="address"><br><br>
    State: <input type="text" name="state"><br><br>
    Zip: <input type="text" name="zip"><br><br>

    <input type="submit" value="Submit">
  </form>
  <p><a href="index.html">Return to Index</a></p>
</body>
</html>