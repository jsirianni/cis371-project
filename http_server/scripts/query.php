<?php
//
// Function returns a mysql connection
//
function dbConnect() {
  $c =  mysqli_connect('localhost', 'reportuser', 'password', 'report');
  return $c;
}


//
// Function allows user to perform an INSERT
//
function manualReport($hostname, $status, $timestamp) {
  $sqlconn = dbConnect();
  $sql = "INSERT INTO reports (hostname,status,timestamp) VALUES ($hostname,$status,$timestamp)";

  // Execute query and then close connection
  $result = mysqli_query($sqlconn,$sql);
  $sqlconn->close();
}


//
// Function returns true if sql is valid
//
function checkSql($sql) {
  $sqlconn = dbConnect();

  // Execute query
  $result = mysqli_query();
  $sqlconn->close();

  // Return true if result is not false
  if ($result != 'FALSE') {
    echo "true";
  }
  else {
    echo "false";
  }
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


//
// Function displays X amount of records
//
function readLast20($numOfReports) {
  $sqlconn = dbConnect();

  // Determine how many rows to show
  if ($numOfReports != "") {
    $sql = "SELECT * FROM reports ORDER BY id DESC LIMIT $numOfReports";
  } else {
    $sql = "SELECT * FROM reports ORDER BY id DESC LIMIT 20";
  }

  // Execute query and then close connection
  $result = mysqli_query($sqlconn,$sql);
  $sqlconn->close();

  // Display the result
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
  $sqlconn = dbConnect();

  // Build and run query, then close connection
  $sql = "SELECT * FROM reports ORDER BY id DESC LIMIT 1";
  $result = mysqli_query($sqlconn,$sql);
  $sqlconn->close();

  // Show the result
  echo "<div class='content'>";
  echo "<br>";
  echo "<p>Report submitted</p>";
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
  $sqlconn = dbConnect();

  // Run user define query, then close connection
  $result = mysqli_query($sqlconn, $customSQL);
  $sqlconn->close();

  // Display the result
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
// Function allows user to perform an UPDATE
//
function updateReport($id, $hostname, $status, $timestamp) {
  $sqlconn = dbConnect();

  // Update an existing row
  $sql = "UPDATE reports SET hostname=$hostname, status=$status, timestamp=$timestamp WHERE id=$id";
  $result = mysqli_query($sqlconn,$sql);

  // Get the updated row then close connection
  $sql = "SELECT * FROM reports WHERE id=$id";
  $result = mysqli_query($sqlconn,$sql);
  $sqlconn->close();

  // Display updated row
  echo "<div class='content'>";
  echo "<br>";
  echo "<p>Report updated</p>";
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
?>
