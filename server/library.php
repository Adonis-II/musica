<?php

/**
 * @author Adonis Mendoza, 000789894
 * I, Adonis Mendoza, 000789894 certify that this material is my original work. 
 * No other person's work has been used without due acknowledgement.
 * This file displays all the songs that the user has liked from the main page.
 */
include "header.php"; ?>
<h1 class="pageHeading"> Library </h1>
<?php
// get userid, username and songid
$libraryCommand = ("SELECT * FROM userlibrary WHERE user_id = ?");
$songCommand = "SELECT * FROM songs WHERE song_id = ?";
$userCommand = "SELECT userid FROM users WHERE username= ?";

$userStmt = $dbh->prepare($userCommand);
$username = $_SESSION["loginusername"];
$params = [$username];
$success = $userStmt->execute($params);


if ($userRow = $userStmt->fetch()) {
  $userid = $userRow["userid"];
  $params = [$userid];
  $libraryStmt = $dbh->prepare($libraryCommand);
  $success = $libraryStmt->execute($params);

  // inside user library, display all songs that that the user has liked
  while ($libraryRow = $libraryStmt->fetch()) {
    $songid = $libraryRow["song_id"];
    $params = [$songid];
    $songStmt = $dbh->prepare($songCommand);
    $success = $songStmt->execute($params);
    while ($songRow = $songStmt->fetch()) {
      echo
        "<div class='gridViewItem' name='" . $songRow['song_id'] . "'>
      <img src='" . $songRow['coverart'] . "'>
      <div class='gridViewInfo'>"
          . $songRow['title'] . "<div name='" . $songRow['song_id'] . "'value='-1' data-user-id='" . $userid . "' class='heart on'></div>
      </div>
      
    </div>";
    }
  }
}

?>
<?php include "footer.php"; ?>