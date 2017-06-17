<?php
include 'query.php'

// Get system uptime
shell_exec('uptime');

// Get IP information
shell_exec("ip addr show | grep 'global eth0'");

// Get service information
shell_exec("systemctl status mysql | grep Active");
shell_exec("systemctl status apache2 | grep Active");

// Get disk information
shell_exec("df -h | grep /dev/sda1");



?>
