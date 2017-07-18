
var interval;

function showPage(page) {
  if (page == "home") {
    $("#navbox a").removeClass("active");
    $(".background").removeClass("inactive");
    $("div.page").hide();
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
  } else if ($("div.page#" + page + "Page").css("display") == "none") {
    $("#navbox a").removeClass("active");
    $("div.page").css("display", "none");
    var openPage = function() {
      $("div.page#" + page + "Page").fadeIn("fast");
      $("#navbox a#" + page + "Nav").addClass("active");
      $(".background").addClass("inactive");
    };
    if ($("#bottombox").css("display") == "none") openPage();
    $("#bottombox").fadeOut("fast", openPage);
  }
  return false;
}

/*
$(document).ready(function() {
  var interval = window.setInterval(function() {
    $(".background").fadeToggle(500);
  }, 5000);
});
*/

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
