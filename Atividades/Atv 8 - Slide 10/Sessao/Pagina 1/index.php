<?php
// Página 01

session_start();
?>

<!DOCTYPE html>
<html>
<body>
<?php
$_SESSION['favcolor'] = 'Yellow';
$_SESSION['favanimal'] = 'Dog';

echo 'Session variables are set';

?>

</body>
</html>
