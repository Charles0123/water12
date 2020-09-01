"use strict";

(function () {
  var dataPicture_content_buttons = document.getElementsByClassName("dataPicture_content_button"); //targets: 控制範圍, clicked , 被點或要加class者

  console.log("123");

  function singleExclusiveClassController(targets, clicked, classControlled) {
    for (var E = 0; E < targets.length; E++) {
      if (clicked.classList.contains(classControlled)) {} else {
        for (var F = 0; F < targets.length; F++) {
          if (targets[F].classList.contains(classControlled)) {
            targets[F].classList.remove(classControlled);
            break;
          }
        }

        clicked.classList.add(classControlled);
      }
    }
  }

  console.log(dataPicture_content_buttons);

  for (var E = 0; E < dataPicture_content_buttons.length; E++) {
    dataPicture_content_buttons[E].onclick = function () {
      console.log(123);
      singleExclusiveClassController(dataPicture_content_buttons, this, "dataPicture_content_button-active");
    };
  }
})();

(function () {
  function singleExclusiveClassController(targets, clicked, classControlled) {
    for (var E = 0; E < targets.length; E++) {
      // var target = clicked.parentElement
      if (clicked.classList.contains(classControlled)) {
        clicked.classList.remove(classControlled);
      } else {
        for (var F = 0; F < targets.length; F++) {
          if (targets[F].parentElement.classList.contains(classControlled)) {
            targets[F].parentElement.classList.remove(classControlled);
            break;
          }
        }

        clicked.classList.add(classControlled);
      }
    }
  } //targets: 控制範圍, clicked , 被點或要加class者


  function singleExclusiveClassController_1(targets, clicked, classControlled) {
    for (var _E = 0; _E < targets.length; _E++) {
      if (clicked.classList.contains(classControlled)) {} else {
        for (var F = 0; F < targets.length; F++) {
          if (targets[F].classList.contains(classControlled)) {
            targets[F].classList.remove(classControlled);
            break;
          }
        }

        clicked.classList.add(classControlled);
      }
    }
  }

  var menucontents = document.getElementsByClassName("menu_content_title");

  for (var E = 0; E < menucontents.length; E++) {
    menucontents[E].onclick = function (e) {
      e.stopPropagation();
      singleExclusiveClassController(menucontents, this.parentElement, "menu_content-active");
    };
  }

  var submenu_contents = document.getElementsByClassName("menu_content_submenu_content");

  for (var E = 0; E < submenu_contents.length; E++) {
    submenu_contents[E].onclick = function (e) {
      e.stopPropagation();
      singleExclusiveClassController_1(submenu_contents, this, "menu_content_submenu_content-active");

      if (document.getElementsByClassName("menu_content_submenu_wrapper-active")[0]) {
        document.getElementsByClassName("menu_content_submenu_wrapper-active")[0].classList.remove('menu_content_submenu_wrapper-active');
      }

      this.parentElement.classList.add('menu_content_submenu_wrapper-active');
    };
  }
})();