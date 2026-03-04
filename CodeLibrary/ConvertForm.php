<?php

function findTemp($type,$temp) {

    if ($type == 'c') {
        $holdTemp = (($temp - 32) / 9) * 5;
    } else {
        $holdTemp = (($temp * 9) / 5) + 32;
    } // end if
    return $holdTemp;    
} 

$temp = $_REQUEST['temp'];
$type = $_REQUEST['type'];


$theTemp = round(findTemp($type,$temp),1);

if ($type == 'f') {
    echo "You converted " . $temp . " Celcius to " . $theTemp . " Fahrenheit<br>";
    } else {
    echo "You converted " . $temp . " Fahrenheit to " . $theTemp . " Celcius<br>";
    } // end if
    

?>
</p>
<p><a href='index.html'>Return to form</a></p>
