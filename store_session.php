<?php
// Start the session
session_start();
// Check if the POST data is set and not empty
if(isset($_POST["tableValues"]) && !empty($_POST["tableValues"])){
  // Get the table values from the POST data
  $tableValues = $_POST["tableValues"];
  // Validate and sanitize the input data
  // For example, you can use filter_var() or filter_input() functions
  // See https://www.php.net/manual/en/filter.filters.sanitize.php for more details
  $tableValues = filter_var($tableValues, FILTER_SANITIZE_STRING);
  // Convert the table values from a JSON string to an array
  $tableValues = json_decode($tableValues, true);
  // Do something with the table values, such as storing them in a session
  $_SESSION["tableValues"] = $tableValues;
  // Send a JSON response back to the client
  header("Content-Type: application/json");
  echo json_encode(array("message" => "Table values stored successfully"));
  // Exit the script
  exit();
}
else{
  // Handle the case when the POST data is not set or empty
  // For example, you can send an error message or redirect to another page
  // See https://www.php.net/manual/en/function.http-response-code.php for more details
  http_response_code(400); // Bad request
  echo "Invalid or missing input data";
  exit();
}
?>