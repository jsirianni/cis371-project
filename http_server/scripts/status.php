<?php
echo "<div id='status'>";

// Get system uptime
echo "<h4>System Uptime</h4>";
echo exec('uptime');
echo "\n<br>";

// Get IP information
echo "<h4>System IP</h4>";
echo exec('ip addr show | grep "global eth0"');
echo "\n<br>";

// Get service information
echo "<h4>MySQL Status</h4>";
echo exec('systemctl status mysql | grep Active');
echo "\n<br>";

echo "<h4>Apache Status</h4>";
echo exec('systemctl status apache2 | grep Active');
echo "\n<br>";

// Get disk information
echo "<h4>Disk Usage</h4>";
echo exec('df -h | grep /dev/sda1');
echo "\n<br>";

echo "</div>";
?>
