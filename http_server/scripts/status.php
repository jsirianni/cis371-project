<?php


// Get system uptime
echo "<p>System Uptime</p>";
echo exec('uptime');
echo "\n<br>";

// Get IP information
//system("ip addr show | grep 'global eth0'");

// Get service information
echo "<p>MySQL Status</p>";
echo exec('systemctl status mysql | grep Active');
echo "\n<br>";

echo "<p>Apache Status</p>";
echo exec('systemctl status apache2 | grep Active');
echo "\n<br>";

// Get disk information
echo "<p>Disk Usage</p>";
echo exec('df -h | grep /dev/sda1');



?>
