<?php

/**
 * @author Adonis Mendoza, 000789894
 * I, Adonis Mendoza, 000789894 certify that this material is my original work. 
 * No other person's work has been used without due acknowledgement
 * Destorys session and logs user out
 */
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html>

<head>
    <title>Logout</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/musica.css">
</head>

<body>
    <h1>You are logged out</h1>
    <h1><a href="../index.html" style="color:#badabb;cursor:pointer;">Log in again</a></h1>
</body>

</html>