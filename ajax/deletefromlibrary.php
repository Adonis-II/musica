<?php

/**
 * @author Adonis Mendoza, 000789894
 * I, Adonis Mendoza, 000789894 certify that this material is my original work. 
 * No other person's work has been used without due acknowledgement.
 * 
 * This file deletes a song from the user's library. Returns the song_id into the response
 * 
 */
include "../server/connect.php";
session_start();
// get the paramaters
$song_id = filter_input(INPUT_GET, "song_id", FILTER_VALIDATE_INT);
$user_id = filter_input(INPUT_GET, "user_id", FILTER_VALIDATE_INT);

// validation check
if ($song_id !== null && $song_id !== false && $user_id !== null && $user_id !== false) {


  // grab the user's username from the SESSION superglobal
  $username = $_SESSION["loginusername"];
  $command = "DELETE FROM userlibrary WHERE user_id = ? AND song_id = ?";
  $stmt = $dbh->prepare($command);
  $params = [$user_id, $song_id];
  $success = $stmt->execute($params);
  if ($success) {
    echo "$song_id";
  } else {
    echo "Fail";
  }
}
