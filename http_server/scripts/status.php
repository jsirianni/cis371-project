<?php


// Get system uptime
echo exec('uptime');
echo "\n<br>";

// Get IP information
//system("ip addr show | grep 'global eth0'");

// Get service information
echo exec('systemctl status mysql | grep Active');
echo "\n<br>";
echo exec('systemctl status apache2 | grep Active');

// Get disk information
echo "\n<br>";
echo exec('df -h | grep /dev/sda1');



?>
