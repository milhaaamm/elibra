<?php
$param = isset($_GET['d']) ? $_GET['d'] : "apa lo %0A what the fuck";

echo '<img src="php/qr_img.php?d='.$param.'" width="200" height="200">';

?>