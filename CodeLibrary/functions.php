<?php

function signChange ($changeIt) {
$changeIt = -$changeIt;
return $changeIt;
}

$changeIt = $_REQUEST['changeIt'];

$newNum = signChange($changeIt);
print "<h3>The new number is: $newNum</h3>";

?>
<p><a href='index.html'>Return to form</a></p>