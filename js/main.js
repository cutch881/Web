window.addEventListener('load', () => {

  nav = document.querySelector('#main_nav');
  menu_button = document.querySelector('#menu_icon');
  show = false

  menu_button.addEventListener('click', () => {
    show = !show;
    if (show) {
      nav.style.display = "flex";
      nav.style.opacity = "1";
      nav.style.visibility = "visible";
    } else {
      nav.style.display = "none";
      nav.style.opacity = "0";
      nav.style.visibility = "hidden";
    }
  });

});
