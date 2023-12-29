<?php
// Start the session
session_start();
// Check if the session variable is set
if(isset($_SESSION["tableValues"])){
  // Use the array directly, without decoding
  $tableValues = $_SESSION["tableValues"];
  // Print the array as a table
  echo "<table border='1'>";
  foreach($tableValues as $row){
    echo "<tr>";
    foreach($row as $cell){
      echo "<td>$cell</td>";
    }
    echo "</tr>";
  }
  echo "</table>";
}
else{
  // Print a message if the session variable is not set
  echo "Session variable is not set.";
}
?>