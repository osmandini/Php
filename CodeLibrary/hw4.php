<!DOCTYPE html>
<html lang="en">
<body>
<h1>String Results
</h1>
<br>

<?php

$yourName = $_REQUEST["yourName"];
$len = strlen($yourName);
$pos = strpos($yourName, ",");
$firstN = substr($yourName,$pos+1);
$lastN = substr($yourName,0,$pos);

 print "The field lenght is: $len<br>";
 print "The comma is at: $pos<br>";
 print "First name is: $firstN <br>";
 print "Last name is: $lastN <br>";
 
<p><a href="index.html">Return to Index</a></p>

?>
