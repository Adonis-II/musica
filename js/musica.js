/**
 * @author Adonis Mendoza, 000789894
 * I, Adonis Mendoza, 000789894 certify that this material is my original work. 
 * No other person's work has been used without due acknowledgement
 * 
 * This files deals with the interaction of the heart icon.
 * If the user clicks on the heart icon of its corresponding song on the main page, then fetch an AJAX request to insert the song to the user's library. 
 * If the user is on the library page and "unlikes" the song by clicking the activated heart icon, then fetch an AJAX request to delete the song from the user's library
 */
$(document).ready(function () {

  /**
   * this function deals with fetching AJAX requests depending on the value attribute of the class heart in library.php and musica.php. 
   * The value -1 is set to the heart class in library.php and 
   * the value 1 is set to the heart class in musica.php
   * 
   * @param {String} songid Recieves the songid to send as a paramater.
   */
  function ajax(songid) {

    // console.log($('.heart').attr('value'));
    let x = $('.heart').attr('value');

    // if the heart in library.php is being clicked then fetch request to deletefromlibrary.php
    if (x == -1) {
      let userid = $('.heart').data('user-id');
      let url = "../ajax/deletefromlibrary.php?song_id=" + songid + "&user_id=" + userid;
      console.log(url);
      fetch(url, {
          credentials: 'include',
        })
        .then(response => response.text())
        .then(success);
    }

    // If the heart in musica.php is being clicked then fetch request to inserttolibrary.php
    if (x == 1) {
      let url = "../ajax/inserttolibrary.php?songid=" + songid;
      fetch(url, {
          credentials: 'include',
        })
        .then(response => response.text())
        .then(success);
    }
  }

  /**
   * Depending on which AJAX call has been completed, deletefromlibrary.php will only return a songid to the response
   * inserttolibrary.php can return 0 if there were no rows affected by the fetch request or a songid.
   * 
   * If the text that has been extracted from the response is a songid, then perform a jquery animation to fade out the specific song. 
   * if the text is 0 then alert users within the main page (musica.php) that the song is in their library.
   * @param {String} text 
   */
  function success(text) {
    console.log("songid= " + text);
    if (text == 0) {
      alert("REMINDER: This song is already in your library.");
      $('.heart').removeClass("is_animating").addClass("off").css("background-position", "left");
    } else {
      $('.gridViewItem[name=' + text + ']').fadeOut(500);
    }

  }


  /**
   *  Perform jquery event when heart icon is clicked
   */
  $(".heart").on('click', function () {

    let songid = $(this).attr('name');
    let value = "off";
    // if the heart icon is off, then set to on when clicked.
    // if the heart icon is on, then set to off when clicked.
    if ($(this).attr("class").indexOf('off') !== -1) {
      value = "on";
    } else {
      value = "off";
    }


    // console.log(value);
    // set heart icon to on and fetch an AJAX request with the songid value.
    if (value === "on") {
      $(this).removeClass("off").addClass("is_animating").addClass("on");
      ajax(songid);
    }
    // set heart icon to off and fetch an AJAX request with the songid value
    if (value === "off") {
      $(this).removeClass("is_animating").addClass("off").css("background-position", "left");
      ajax(songid);
    }


  });


  // When the animation is over, set heart to "liked"
  $(".heart").on('animationend', function () {
    $(this).toggleClass('is_animating');
    $(this).css('background-position', 'right');
  });

});