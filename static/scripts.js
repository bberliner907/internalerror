
var interval;
var qs = "?page=";

function showPage(page, pop) {
  $("#navbox a").removeClass("active");
  $("div.page").hide();
  if (page == "home") {
    if (!pop) {
      history.pushState(null, null, "/");
      ga('send', 'pageview', location.pathname);
    }
    $(".background").removeClass("inactive");
    $("#bottombox").fadeIn("fast");
    /*
    $("div.page").fadeOut("fast", function() {
      setTimeout(function() {
        $("#bottombox").fadeIn("fast", function() {
          //$("body").css("overflow", "auto");
        });
      }, 50);
    });
    */
  } else if ($("div.page#" + page).css("display") == "none") {
    if (!pop) {
      history.pushState(null, null, qs + page);
      ga('send', 'pageview', location.pathname + location.search);
    }
    var openPage = function() {
      $("div.page#" + page).fadeIn("fast");
      $("#navbox a#" + page + "Nav").addClass("active");
      $(".background").addClass("inactive");
    };
    if ($("#bottombox").css("display") == "none") openPage();
    $("#bottombox").fadeOut("fast", openPage);
  }
  return false;
}

$(window).on('popstate', function(e) {
  var index = location.search.lastIndexOf(qs);
  var to;
  if (index == -1) to = "home";
  else to = location.search.substr(index + qs.length, location.search.length);
  showPage(to, true);
});

$(document).ready(function() {
  var count = $(".background").length;
  var image = 1;
  interval = window.setInterval(function() {
    if (image < count) {
      $("#background" + image).fadeToggle(500);
      $("#background" + (image + 1)).fadeToggle(500);
      image++;
    } else {
      $("#background" + count).fadeToggle(500);
      $("#background1").fadeToggle(500);
      image = 1;
    }
  }, 5000);
});
