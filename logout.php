<?php

session_start();

$_SESSION['NetworkZoneF_userid'] =NULL;
unset($_SESSION['NetworkZoneF_userid']);
header("Location: login.php");