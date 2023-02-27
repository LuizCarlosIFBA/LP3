<!DOCTYPE html>
<?php
$value = "Hello world!";

// cookie will expire when the browser closes
setcookie("myCookie", $value);

// cookie will expire in 1 hour
setcookie("myCookie", $value, time()+3600);

// cookie will expire in 1 hour, and will only be available
// within the php directory + all sub-directories of php
setcookie("myCookie", $value, time()+3600, "/php/");
?> 
<html>
<body>

</body>
</html>
