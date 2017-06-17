<?php
//
// Set global values
//
function setGlobal() {
  date_default_timezone_set("America/Detroit");
  $GLOBALS['dbhost'] = 'localhost';
  $GLOBALS['dbname'] = 'report';
  $GLOBALS['ddbuser'] = 'reportuser';
  $GLOBALS['dbuserpass'] = 'password';
}


//
// Function displays X amount of records
//
function readLast20($numOfReports) {
  // Set vars & connect to the db
  setGlobal();
  $sqlconn =  mysqli_connect($GLOBALS['dbhost'], $GLOBALS['ddbuser'], $GLOBALS['dbuserpass'], $GLOBALS['dbname']);

  // Build query
  if ($numOfReports != "") {
    $sql = "SELECT * FROM reports ORDER BY id DESC LIMIT $numOfReports";
  } else {
    $sql = "SELECT * FROM reports ORDER BY id DESC LIMIT 20";
  }

  // Execute query & close
  $result = mysqli_query($sqlconn,$sql);
  $sqlconn->close();

  // Display result
  echo "<tr><th>Report ID</th><th>Hostname</th><th>Status</th><th>Timestamp</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>", $row['id'],"         </td>";
    echo "<td>", $row['hostname'],"   </td>";
    echo "<td>", $row['status'],"     </td>";
    echo "<td>", date('m.d.Y H:i', $row['timestamp'])," </td>";
    echo "</tr>";
  }
}


//
// Function displays most recent row
//
function showLast() {
  setGlobal();
  $sqlconn =  mysqli_connect($GLOBALS['dbhost'], $GLOBALS['ddbuser'], $GLOBALS['dbuserpass'], $GLOBALS['dbname']);
  $sql = "SELECT * FROM reports ORDER BY id DESC LIMIT 1";
  $result = mysqli_query($sqlconn,$sql);
  $sqlconn->close();

  // Display row
  echo "<div class='content'>";
  echo "<br>";
  echo "<table>";
  echo "<tr><th>Report ID</th><th>Hostname</th><th>Status</th><th>Timestamp</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>", $row['id'],"         </td>";
    echo "<td>", $row['hostname'],"   </td>";
    echo "<td>", $row['status'],"     </td>";
    echo "<td>", date('m.d.Y H:i', $row['timestamp'])," </td>";
    echo "</tr>";
  }
  echo "</table>";
  echo "</div>";
}



//
// Function allows the user to perform any query
//
function customQuery($customSQL) {
  // Set vars & connect to the db
  setGlobal();
  $sqlconn =  mysqli_connect($GLOBALS['dbhost'], $GLOBALS['ddbuser'], $GLOBALS['dbuserpass'], $GLOBALS['dbname']);
  $result = mysqli_query($sqlconn, $customSQL);
  $sqlconn->close();

  // Display result
  echo "<table><tbody>";
  echo "<tr><th>Report ID</th><th>Hostname</th><th>Status</th><th>Timestamp</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>", $row['id'],"         </td>";
    echo "<td>", $row['hostname'],"   </td>";
    echo "<td>", $row['status'],"     </td>";
    echo "<td>", date('m.d.Y H:i', $row['timestamp'])," </td>";
    echo "</tr>";
  }
  echo "</tbody></table>";
}


//
// Function allows user to perform an INSERT
//
function manualReport($hostname, $status, $timestamp) {
  // Set vars & connect to the db
  setGlobal();
  $sqlconn =  mysqli_connect($GLOBALS['dbhost'], $GLOBALS['ddbuser'], $GLOBALS['dbuserpass'], $GLOBALS['dbname']);

  // Build INSERT statement
  $sql = "INSERT INTO report.reports (hostname,status,timestamp) VALUES ($hostname,$status,$timestamp)";

  // Execute INSERT & close
  $result = mysqli_query($sqlconn,$sql);
  $sqlconn->close();
}


//
// Function allows user to perform an UPDATE
//
function updateReport($id, $hostname, $status, $timestamp) {
  // Set vars & connect to the db
  setGlobal();
  $sqlconn =  mysqli_connect($GLOBALS['dbhost'], $GLOBALS['ddbuser'], $GLOBALS['dbuserpass'], $GLOBALS['dbname']);

  // Build INSERT statement
  $sql = "UPDATE reports SET hostname=$hostname, status=$status, timestamp=$timestamp WHERE id=$id";
  $result = mysqli_query($sqlconn,$sql);

  $sql = "SELECT * FROM report WHERE (id=$id)";
  $result = mysqli_query($sqlconn,$sql);

  $sqlconn->close();


  // Display row
  echo "<div class='content'>";
  echo "<br>";
  echo "<table>";
  echo "<tr><th>Report ID</th><th>Hostname</th><th>Status</th><th>Timestamp</th></tr>";
  while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>", $row['id'],"         </td>";
    echo "<td>", $row['hostname'],"   </td>";
    echo "<td>", $row['status'],"     </td>";
    echo "<td>", date('m.d.Y H:i', $row['timestamp'])," </td>";
    echo "</tr>";
  }
  echo "</table>";
  echo "</div>";
}


//
// Function prints the nav list
//
function printNav() {
  echo '<li><a href="/">Home</a></li>';
  echo '<li><a href="quick-stats.php">Quick Stats</a></li>';
  echo '<li><a href="custom-query.php">Custom Query</a></li>';
  echo '<li><a href="manual-report.php">Manual Report</a></li>';
}
?>
