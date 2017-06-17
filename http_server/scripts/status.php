<?php
include 'query.php'

// Get system uptime
$uptime = exec("uptime");

// Get IP information
$ifconfig = exec("ip addr show | grep 'global eth0'");

// Get service information
$mysqlStatus = exec("systemctl status mysql | grep Active");
$apacheStatus = exec("systemctl status apache2 | grep Active");

// Get disk information
$disk = exec("df -h | grep /dev/sda1");

echo "$uptime";
echo "<br>";
echo "$ifconfig";
echo "<br>";
echo "$mysqlStatus";
echo "<br>";
echo "$apacheStatus";
echo "<br>";
echo "$disk";


?>
