<?php
include 'query.php'

// Get system uptime
system('uptime');

// Get IP information
system("ip addr show | grep 'global eth0'");

// Get service information
system("systemctl status mysql | grep Active");
system("systemctl status apache2 | grep Active");

// Get disk information
system("df -h | grep /dev/sda1");



?>
