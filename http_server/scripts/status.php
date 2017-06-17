<?php


// Get system uptime
echo exec('uptime');
echo "\n<br>";

// Get IP information
//system("ip addr show | grep 'global eth0'");

// Get service information
echo exec('systemctl status mysql | grep Active');
//system("systemctl status apache2 | grep Active");

// Get disk information
//system("df -h | grep /dev/sda1");



?>
