<?php
header("Content-Type: text/plain");
exit(file_get_contents("version.txt"));
?>