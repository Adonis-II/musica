<?php

/**
 * @author Adonis Mendoza, 000789894
 * I, Adonis Mendoza, 000789894 certify that this material is my original work. 
 * No other person's work has been used without due acknowledgement.
 * This file displays the songs from database into the main page.
 * 
 */
include "header.php"; ?>
<?php if ($access) { ?>

  <h1 class="pageHeading"> Browse </h1>
  <p> Click on a heart to add the song to your library </p>
  <div class="gridViewContainer">

    <?php
      $username = $_SESSION["loginusername"];;
      $songsCommand = ("SELECT * FROM songs");
      $useridCommand = "SELECT userid FROM users where username = ?";
      $user_stmt = $dbh->prepare($useridCommand);
      $stmt = $dbh->prepare($songsCommand);
      $params = [$username];
      $useridSuccess = $user_stmt->execute($params);
      $success = $stmt->execute();
      while ($row = $stmt->fetch()) {
        echo
          "<div class='gridViewItem' name='" . $row['song_id'] . "'>
          <img src='" . $row['coverart'] . "'>
          <div class='gridViewInfo'>"
            . $row['title'] . "<div name='" . $row['song_id'] . "'value='1' class='heart off'></div>
          </div>
        </div>";
      }
      ?>
  </div> <!-- Main Content -->

  </div> <!-- Main View Container -->

<?php }
include "footer.php"; ?>