/**
 * @author Adonis Mendoza, 000789894
 * I, Adonis Mendoza, 000789894 certify that this material is my original work. 
 * No other person's work has been used without due acknowledgement
 */
$(document).ready(function () {
  $('#register-form').submit(function (event) {
    event.preventDefault();

    // get username, password and email value from register form
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let email = document.getElementById("email").value;
    // construct the parameter string
    let params = "username=" + username + "&password=" + password + "&email=" + email;
    console.log(params);
    let url = "ajax/registration.php";
    console.log(url);
    // fetch an AJAX request to register.php
    fetch(url, {
        method: 'POST',
        credentials: 'include',
        headers: {
          "Content-Type": "application/x-www-form-urlencoded"
        }, // Parameter format
        body: params // POST params are sent in the body
      })
      .then(response => response.text())
      .then(success);


    /**
     *  This function should be called when the AJAX call is complete and the text has been extracted from the response. If the text is 1, then the account has been created. If the text is -1, the username has already been taken.
     * @param {String} text 
     */
    function success(text) {
      console.log(text);

      if (text === "1") {
        $('.message').first().html("Your account has been created. <a id='link' href='index.html'>Login</a>");
        $('#createbutton').fadeOut(100);
        $('#registererrormessage').html("");
      }

      if (text === "-1") {
        // Insert error message
        $('#registererrormessage').html("<p>Username or Email has already been taken, Try again</p>").css("color", "red").css("padding", "0").css("margin", "0");
        console.log("ALREADY TAKEN");
      }

      if (text === "2") {
        $('#registererrormessage').html("<p>Incorrect Email</p>");
      }
    }

  });

  // When the user clicks on the link, animate to go to the login form.
  $('.message a').click(function () {
    $('#createbutton').fadeIn(100);
    $('form').animate({
      height: "toggle",
      opacity: "toggle"
    }, "slow");
    $('#loginerrormessage').html("");
    $('#registererrormessage').html("");
  });

});