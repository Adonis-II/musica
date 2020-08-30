/**
 * @author Adonis Mendoza, 000789894
 * I, Adonis Mendoza, 000789894 certify that this material is my original work. 
 * No other person's work has been used without due acknowledgement.
 * 
 * This files interacts with the login page to determine if user inputs the correct credentials. 
 * 
 */


$(document).ready(function() {

  $('#login-form').submit(function (event) {
    event.preventDefault();

    // get username and password from the index.html form
    let username = document.getElementById("loginusername").value;
    let password = document.getElementById("loginpassword").value;
    // construct the parameter string
    let params = "loginusername=" + username + "&loginpassword=" + password;
    console.log(params); //debug
    let url = "ajax/login.php"
    console.log(url);

    // fetch an AJAX request to login.php
    fetch(url, {
        method: 'POST',
        credentials: 'include',
        headers: {
          'Content-Type': "application/x-www-form-urlencoded"
        }, // parameter format
        body: params // POST params are sent in the body
      })
      .then(response => response.text()) // retrieves the response
      .then(success); // calls the success function

    /**
     * This function should be called when the AJAX call is complete
     * and the text has been extracted from the response. If the text is 1, then direct to musica.php
     * @param {String} text 
     */
    function success(text) {
      console.log(text);
      if (text === "1") {
        window.location.replace("server/musica.php");
      }
      if (text === "-1") {
        $('#loginerrormessage').html("<p>The username and password you entered did not match our records. Please double-check and try again.</p>").css("color", "red");
        console.log("Fail");
      }

    }
  });
});