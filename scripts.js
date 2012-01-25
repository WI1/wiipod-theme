/**
 * Uses the label for input text which hides on blur
 * usage http://remysharp.com/2007/03/19/a-few-more-jquery-plugins-crop-labelover-and-pluck/#labelOver
 * It's important to enclose the label and input within a div that has the following CSS applied:
 *
 * DIV { position: relative; float: left; }
 * LABEL.over-apply { color: #ccc; position: absolute; top: 5px; left: 5px;}
 * Obviously the top and left will depend on your own CSS, but it's easy to play with in Firbug to get the CSS just right.
 *
 * Then apply the plugin using:
 *
 * $('label').labelOver('over-apply')
 */
jQuery.fn.labelOver = function(overClass) {
  return this.each(function() {
    var label = jQuery(this);
    var f = label.attr('for');
    if (f) {
      var input = jQuery('#' + f);

      this.hide = function() {
        label.css({
          textIndent: -10000
        });
      };

      this.show = function() {
        if (input.val() == '') label.css({
          textIndent: 0
        });
      };

      // handlers
      input.focus(this.hide);
      input.blur(this.show);

      label.addClass(overClass).click(function() {
        input.focus();
      });
      if (input.val() != '') this.hide();
    }
  });
};

$('label', '#user-login-form').labelOver('over-apply');
$('label', '#edit-search-block-form-1-wrapper').labelOver('over-apply');

$(document).ready(function() {
  $('#block-nice_menus-1 li').hover(
    function() {
      $('ul:first', $(this)).show();
    },
    function() {
      $('ul', $(this)).hide();
    }
  );
  // the apache solr search result titles for user profiles are not linked correctly. I replace the link with the correct one with javascript until https://github.com/SupermanScott/apachesolr_users/issues/issue/1 is solved.
  $('dt.title a[href="http://' + window.location.host + '/"]', 'dl.apachesolr_search-results').attr('href', function() {
    return $(this).parent().next().find('a').attr('href');
  });
});
