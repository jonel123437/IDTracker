<?php
session_start();
session_unset();
session_destroy();
header("Location: ?page=home"); // or just: header("Location: index.php");
exit();
