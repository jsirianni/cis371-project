<?php

echo "<div id='status'>";
// Get system uptime
echo "<p>System Uptime</p>";
echo "<a>";
echo exec('uptime');
echo "</a>";
echo "\n<br>";

// Get IP information
echo "<p>System IP</p>";
echo exec('ip addr show | grep "global eth0"');
echo "\n<br>";

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

echo "</div>";

?>
