<?php
session_start();

session_unset();   //  unset the data

session_destroy();

header('location: sign up.php');

exit();