
var interval;
var qs = "?page=";
var first = (location.search.indexOf(qs.replace("?", "") + "audio") != -1) ? false : true;

function ajax(action, record) {
  action = action.replace(/(\'|\"|\W)/g, "");
  record = record.replace(/\D/g, "");
  if (action && record) {
    var data = { "action": action, "record": record };
    $("#results").load("ajax.php", data, function() {
      $("#results").parents(".content").scrollTop(0);
    });
  }
}

function expose(elem) {
  $(elem).parents('.wrapper').children('.expose').fadeToggle(250);
  var icon = $(elem).parents('.wrapper').find('.toggle a');
  $(icon).html(($(icon).html() == "+") ? "-" : "+");
}

function showPage(path, pop) {
  var paths = path.split("#");
  page = paths[0];
  var element;
  if (paths.length > 1) element = paths[1];
  $("#navbox a").removeClass("active");
  $("div.page").hide();
  if (page == "home") {
    if (!pop) {
      history.pushState(null, null, "/");
      ga('send', 'pageview', location.pathname);
    }
    $(".background").removeClass("inactive");
    $("#bottombox").fadeIn("fast");
  } else if ($("div.page#" + page).css("display") == "none") {
    if (!pop) {
      history.pushState(null, null, qs + page);
      ga('send', 'pageview', location.pathname + location.search);
    }
    var openPage = function() {
      $("div.page#" + page).fadeIn("fast", function() {
        if (element) scrollTo(element);
      });
      $("#navbox a#" + page + "Nav").addClass("active");
      $(".background").addClass("inactive");
      if (page == "audio" && first) {
        $("div.page#audio iframe.bandcamp").each(function() {
          $(this).on('load', function() {
            history.replaceState(null, null, qs + "audio");
          }).attr("src", $(this).attr("data-src"));
        });
        first = false;
      }
    };
    $("#bottombox").fadeOut("fast", openPage);
  }
  return false;
}

function scrollTo(id) {
  var element = document.getElementById(id);
  if (element) {
    element.scrollIntoView();
    var body = document.getElementsByTagName("body")[0];
    if (body) body.scrollIntoView();
  }
}

function expand(to) {
  var chosen = $("img[name='" + to + "']").attr("src").replace("thumbs", "full");
  $("#zoom").children("img").attr("src", "").attr("src", chosen).parent().fadeIn(250);
  $("body").css("overflow", "hidden");
}

function collapse() {
  $('#zoom').scrollTop(0).toggle();
  $('body').css('overflow', 'auto');
}

$(window).on('popstate', function(e) {
  var index = location.search.lastIndexOf(qs);
  var to;
  if (index == -1) to = "home";
  else to = location.search.substr(index + qs.length, location.search.length);
  if (location.hash) to += "#" + location.hash;
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
