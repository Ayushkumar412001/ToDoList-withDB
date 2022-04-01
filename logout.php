<?php

header("Location: /TDL/index.php");
session_start();
echo "Logging you out. Please wait..";
session_unset();
session_destroy()

?>