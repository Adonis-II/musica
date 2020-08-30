<?php

/** 
 * @author Adonis Mendoza, 000789894
 * I, Adonis Mendoza, 000789894 certify that this material is my original work. 
 * No other person's work has been used without due acknowledgement
 * This file creates the top view of the app which contains the navbar and the main content
 */
session_start();
include "connect.php";
echo "."; // If I remove this, the css styling for some reason, breaks, So I left it there as I do not know why this happens.
$access = isset($_SESSION["loginusername"]);
?>
<!DOCTYPE html>
<html>

<head>
  <title>Musica</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/musica.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="../js/musica.js"></script>

</head>
<?php
if (!$access) {
  die("<h1>Login Error! Access denied.</h1>
      <a href='../index.html'>Log In.</a>");
} else { ?>

  <body>


    <div id="mainContainer">
      <div id="topContainer">
        <div id="navBarContainer">
          <nav class="navBar">
            <a href="musica.php" class="logo">
              <img src="../images/musicaLogo.png" alt="Musica" title="Home Page">
            </a>
            <div class="group">
              <div class="navitem">
                <a href="musica.php" class="navItemLink" title="Home Page">Logged in: <?= $_SESSION["loginusername"] ?></a>
              </div>
            </div>
            <div class="group">
              <div class="navitem">
                <a href="library.php" class="navItemLink" title="My Library">My library</a>
              </div>
            </div>
            <div class="group">
              <div class="navitem">
                <a href="logout.php" class="navItemLink">Log Out</a>
              </div>
            </div>
          </nav>
        </div>
        <div id="mainViewContainer">
          <div id="mainContent">
          <?php } ?>