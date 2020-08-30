<?php

/**
 * @author Adonis Mendoza, 000789894
 * I, Adonis Mendoza, 000789894 certify that this material is my original work. 
 * No other person's work has been used without due acknowledgement.
 * 
 * Takes two paramaters and echoes a value of  1 if there is a match within the database that contains an existing username or password 
 * or -1 if there are no matches.
 */
include "../server/connect.php";
session_start();

// get the parameter
$username = filter_input(INPUT_POST, "loginusername", FILTER_SANITIZE_SPECIAL_CHARS);
$password = filter_input(INPUT_POST, "loginpassword", FILTER_SANITIZE_SPECIAL_CHARS);

// validation check
if ($username !== null && $username !== "" && $password !== null && $password !== "") {

    // Select username that user has entered in datavase
    $getPasswordCommand =
        "SELECT username,password 
        FROM users 
        WHERE BINARY username= ?";

    $verifyCommand =
        "SELECT username, password 
        FROM users 
        WHERE BINARY username=? AND password=?";

    $stmt = $dbh->prepare($getPasswordCommand);
    $params = [$username];
    $success = $stmt->execute($params);

    $verifyStmt = $dbh->prepare($verifyCommand);

    // If there is a result from query proceed to verify password, else echo -1
    if ($row = $stmt->fetch()) {
        $hash = $row["password"];
        $params1 = [$username, $hash];
        $success1 = $verifyStmt->execute($params1);

        if ($row2 = $verifyStmt->fetch()) {
            // check if password entered by user matches the hashed and salted version in database, else echo -1
            if (password_verify($password, $hash)) {
                $_SESSION["loginusername"] = $username;
                echo "1";
            } else {
                echo "-1";
            }
        }
    } else {
        echo -1;
    }
}
