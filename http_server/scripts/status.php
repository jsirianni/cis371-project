<?php
include 'query.php'

// Get system uptime
echo exec("uptime");

// Get IP information
echo "<br>";
echo exec("ip addr show | grep 'global eth0'");

// Get service information
echo "<br>";
echo exec("systemctl status mysql | grep Active");
echo "<br>";
echo exec("systemctl status apache2 | grep Active");

// Get disk information
echo "<br>";
echo exec("df -h | grep /dev/sda1");



?>
