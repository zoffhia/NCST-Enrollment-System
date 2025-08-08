<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$dbname = 'ncst_enrollment_system';

$db = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($db->connect_error) {
    die('Error: '. $db->connect_error);
}
?>