/**
 * Attached drupal behavior that defines the functionality to create a cookie
 * on a user's browser if drupalSettings contains any cookies for the current request.
 */

(function ($, Drupal, drupalSettings) {
  Drupal.behaviors.simpleCookies = {
    attach: function attach(context) {

      //@TODO logic is flawed if there are more than one cookies being sent
      // through the request..

      if(drupalSettings.hasOwnProperty("cookies")) {
        var cookies = document.cookie.split(";");
        var arr = new Array();
        $.each(cookies, function(index, element) {
          var cookie_name = element.substr(0, element.indexOf('='));
          arr.push(cookie_name);
        });

        drupalSettings.cookies.forEach(function(cookie) {
          var new_cookie = cookie.substr(0, cookie.indexOf('='));
          if (!(arr.includes(new_cookie))) {
            document.cookie = cookie;
          }
        });
      }
    }
  };
})(jQuery, Drupal, drupalSettings);
