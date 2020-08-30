<?php

/**
 * @author Adonis Mendoza, 000789894
 * I, Adonis Mendoza, 000789894 certify that this material is my original work. 
 * No other person's work has been used without due acknowledgement.
 * 
 * This file deals with inserting a specific song to a specific user's library in the database.
 * Receives 1 get parameter which contains the id of a specific song.
 * If the song is already in the user's library then echo back that no rows were affected. else, echo back the songid into the response. 
 * 
 */
include "../server/connect.php";
session_start();
// get the paramater
$songid = filter_input(INPUT_GET, "songid", FILTER_VALIDATE_INT);

// validation check
if ($songid !== null && $songid !== false) {

  // grab the user's username from the SESSION superglobal
  $username = $_SESSION["loginusername"];
  // Grab the userid from the users database that matches the username from the SESSION superglobal 
  $getUserCommand = "SELECT userid FROM users WHERE username=?";
  // Insert the specific song's song id with the userid into their library. If it is already in the library, then ignore. 
  $insertCommand = "INSERT IGNORE INTO userlibrary(user_id, song_id) VALUES (?,?)";
  $userstmt = $dbh->prepare($getUserCommand);
  $insertstmt = $dbh->prepare($insertCommand);

  $params = [$username];
  $success = $userstmt->execute($params);

  if ($row = $userstmt->fetch()) {

    $userid = $row["userid"];
    $insertParams = [$userid, $songid];
    $success = $insertstmt->execute($insertParams);
    if ($success) {
      $rowaffected = $insertstmt->rowCount();
      if ($rowaffected == 0) {
        echo "$rowaffected";
      } else {
        echo "$songid";
      }
    } else {
      echo "There is something wrong with the paramarers";
    }
  }
}
