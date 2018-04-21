/*Show and hide menu */

$(document).ready(function () {
  'use strict';
  $(window).scroll(function () {
    'use strict';

    if ($(window).scrollTop() > 80) {
      $('.navbar').css({});
    } else {

      $('.navbar').css({});

      $('.navbar-default').css({

      });

      $('.navbar-brand img').css({});

      $('.navbar-nav > li > a').css({});
    }
  });
});



function autocomplete(inp, id_input) {
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function (e) {
    if (!this.value) {
      return false;
    }
    searchUsers(this.value, result_arr => {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < result_arr.length; i++) {
        /*create a DIV element for each matching element:*/
        b = document.createElement("DIV");
        /*make the matching letters bold:*/
        b.innerHTML = "<strong>" + result_arr[i].name.substr(0, val.length) + "</strong>";
        b.innerHTML = "<a data-id='" + result_arr[i].id + "' data-value='" + result_arr[i].name + "' href='#" + result_arr[i].id + "'>" + result_arr[i].name + "</a>"; //.substr(val.length);
        /*insert a input field that will hold the current array item's value:*/
        //        b.innerHTML += "<input type='hidden' data-id='"+  result_arr[i].id +"' value='" + result_arr[i].name + "'>";
        /*execute a function when someone clicks on the item value (DIV element):*/
        b.addEventListener("click", (e) => {
          /*insert the value for the autocomplete text field:*/
          inp.value = e.srcElement.getAttribute('data-value');
          var user_id_input = document.getElementById(id_input);
          if (user_id_input) {
            user_id_input.value = e.srcElement.getAttribute('data-id');
          }

          /*close the list of autocompleted values,
          (or any other open lists of autocompleted values:*/
          closeAllLists();
        });
        a.appendChild(b);
      }
    });
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function (e) {
    var x = document.getElementById(this.id + "autocomplete-list");
    if (x) x = x.getElementsByTagName("div");
    if (e.keyCode == 40) {
      /*If the arrow DOWN key is pressed,
      increase the currentFocus variable:*/
      currentFocus++;
      /*and and make the current item more visible:*/
      addActive(x);
    } else if (e.keyCode == 38) { //up
      /*If the arrow UP key is pressed,
      decrease the currentFocus variable:*/
      currentFocus--;
      /*and and make the current item more visible:*/
      addActive(x);
    } else if (e.keyCode == 13) {
      /*If the ENTER key is pressed, prevent the form from being submitted,*/
      e.preventDefault();
      if (currentFocus > -1) {
        /*and simulate a click on the "active" item:*/
        if (x) x[currentFocus].click();
      }
    }
  });

  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }

  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }

  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
    closeAllLists(e.target);
  });
}

/*add smooth scrolling */
// $(document).ready(function () {
//   'use strict';
//   $('.nav-item').click(function () {

//     if (
//       location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') &&
//       location.hostname == this.hostname
//     ) {
//       var target = $(this.hash);
//       target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
//       if (target.length) {
//         // Only prevent default if animation is actually gonna happen
//         event.preventDefault();
//         $('html, body').animate({
//           scrollTop: target.offset().top
//         }, 1000);
//         return false;
//       }
//     }
//   });
// });

function searchUsers(needle, callback) {
  var xhr = new XMLHttpRequest();

  xhr.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      callback(JSON.parse(this.responseText));
    }
  };
  xhr.open('get', '/user/search/' + needle, true);
  xhr.send();
}


/* active menu item on click */
$(document).ready(function () {
  'use strict';

  $('.navbar-nav li a').click(function () {
    'use strict';
    $('.navbar-nav li a').parent().removeClass("active");

    $(this).parent().addClass("active");
  });


});

/* highlight menu item on scroll */
$(document).ready(function () {
  'use strict';
  $(window).scroll(function () {
    'use strict';
    $("section").each(function () {
      'use strict';
      var bb = $(this).attr("id");
      var height = $(this).outerHeight();
      var grttop = $(this).offset().top - 70;
      if ($(window).scrollTop() > grttop && $(window).scrollTop() < grttop + height) {
        $("navbar-nav li a[href='#" + bb + "']").parent().addClass("active");
      } else {
        $("navbar-nav li a[href='#" + bb + "']").parent().removeClass("active");
      }
    });
  });
});


/* Silders */

/*
$(document).ready(function(){
$('.carousel[data-type="multi"] .item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));
  
  for (var i=0;i<4;i++) {
    next=next.next();
    if (!next.length) {
        next = $(this).siblings(':first');
    }
    
    next.children(':first-child').clone().appendTo($(this));
  }
});
});

*/