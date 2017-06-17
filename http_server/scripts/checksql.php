<?php

include 'query.php';

// Connect to db
$sqlconn = dbConnect();

// Get sql
$sql = $GET_['sql'];

// Execute query
$result = mysqli_query($sqlconn,$sql);
$sqlconn->close();

// Return true if result is not false
if ($result != 'FALSE') {
  echo "true";
}
else {
  echo "false";
}
