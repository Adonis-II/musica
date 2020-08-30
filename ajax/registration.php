<?php

/**
 * @author Adonis Mendoza, 000789894
 * I, Adonis Mendoza, 000789894 certify that this material is my original work. 
 * No other person's work has been used without due acknowledgement.
 * 
 * Registers users into database
 * Takes three paramaters and if there are no matches from the select query, Insert the user information into database and echo back 1 into the response, else echo -1
 */
include "../server/connect.php";
session_start();

$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, "email", FILTER_VALIDATE_EMAIL);

if (
  $username !== null and  $username !== "" and
  $password !== null and  $password !== "" and
  $email !== null and $email !== false
) {

  $command = "SELECT username, email FROM users WHERE BINARY username=? OR email=?";
  $stmt = $dbh->prepare($command);
  $params  = [$username, $email];
  $success = $stmt->execute($params);
  // If no match in database then create account and insert to database
  if ($stmt->rowCount() === 0) {
    // Hash password for security
    $hash  = password_hash($password, PASSWORD_DEFAULT);
    $command = "INSERT INTO users(username,password,email) VALUES(?,?,?)";
    $stmt = $dbh->prepare($command);
    $params  = [$username, $hash, $email];
    $success = $stmt->execute($params);
    echo "1";
  } 
  // If theres an existing email or username
  else {
    echo "-1";
  }
} 
  else {
  // echo error message
  echo "2";
}
