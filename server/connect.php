<?php

/**
 * @author Adonis Mendoza, 000789894
 * I, Adonis Mendoza, 000789894 certify that this material is my original work. No other person's work has been used without due acknowledgement.
 * This file connects to the database
 */


try {
    $dbh = new PDO(
        "mysql:host=localhost;dbname=000789894",
        "root",
        ""
    );
} catch (Exception $e) {
    die("ERROR: Couldn't connect. {$e->getMessage()}");
}
