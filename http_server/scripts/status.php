<?php
include 'query.php'

// Get system uptime
echo shell_exec("uptime");

// Get IP information
echo "<br>";
echo shell_exec("ip addr show | grep 'global eth0'");

// Get service information
echo "<br>";
echo shell_exec("systemctl status mysql | grep Active");
echo "<br>";
echo shell_exec("systemctl status apache2 | grep Active");

// Get disk information
echo "<br>";
echo shell_exec("df -h | grep /dev/sda1");



?>
