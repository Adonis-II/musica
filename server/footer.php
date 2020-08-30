<?php

/**
 * @author Adonis Mendoza, 000789894
 * I, Adonis Mendoza, 000789894 certify that this material is my original work. 
 * No other person's work has been used without due acknowledgement.
 * This file contains the bottom portion of the web page which is the media player.
 * 
 */
$access = isset($_SESSION["loginusername"]);
if (!$access) {
  die("<h1>Login Error! Access denied.</h1>
    <a href='../index.html'>Log In.</a>");
} else { ?>

  </div>
  </div>
  </div>

  <div id="nowPlayingBarContainer">
    <div id="nowPlayingBar">
      <div id="nowPlayingLeft">
        <div class="content">
          <span class="albumLink">
            <img src="../images/Houdini.jpg" class="albumArtwork">
          </span>
          <div class="trackInfo">
            <span class="trackName">
              <span>Test</span>
            </span>
            <span class="artistName">
              <span>Travis Scott</span>
            </span>
          </div>
        </div>
      </div>
      <div id="nowPlayingCenter">

        <div class="content playerControls">

          <div class="buttons">

            <button class="controlButton shuffle" title="Shuffle button">
              <img src="../images/icons/shuffle.png" alt="Shuffle">
            </button>

            <button class="controlButton previous" title="Previous button">
              <img src="../images/icons/previous.png" alt="Previous">
            </button>

            <button class="controlButton play" title="Play button">
              <img src="../images/icons/play.png" alt="Play">
            </button>

            <button class="controlButton pause" title="Pause button" style="display: none;">
              <img src="../images/icons/pause.png" alt="Pause">
            </button>

            <button class="controlButton next" title="Next button">
              <img src="../images/icons/next.png" alt="Next">
            </button>

            <button class="controlButton repeat" title="Repeat button">
              <img src="../images/icons/repeat.png" alt="Repeat">
            </button>

          </div>

          <div class="playbackBar">
            <span class="progressTime current">0.00</span>
            <div class="progressBar">
              <div class="progressBarBg">
                <div class="progress"></div>
              </div>
            </div>
            <span class="progressTime remaining">0.00</span>
          </div>
        </div>
      </div>
      <div id="nowPlayingRight">
        <div class="volumeBar">

          <button class="controlButton volume" title="Volume button">
            <img src="../images/icons/volume.png" alt="Volume">
          </button>

          <div class="progressBar">
            <div class="progressBarBg">
              <div class="progress"></div>
            </div>
          </div>

        </div>
      </div>

    </div>
  </div>


  </div>

  </body>

  </html>
<?php
} ?>