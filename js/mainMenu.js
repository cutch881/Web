//Add click events to main menu cards
window.addEventListener('load', () => {
  document.getElementById("about").addEventListener("click", () => {
    clickEvent("about");
  });
  document.getElementById("companies").addEventListener("click", () => {
    clickEvent("list");
  });
  if (document.getElementById("portfolio")) {
    document.getElementById("portfolio").addEventListener("click", () => {
      clickEvent("portfolio");
    });
    document.getElementById("favourites").addEventListener("click", () => {
      clickEvent("favourites");
    });
    document.getElementById("profile").addEventListener("click", () => {
      clickEvent("profile");
    });
    document.getElementById("logout").addEventListener("click", () => {
      clickEvent("logout");
    });
  } else {
    document.getElementById("login").addEventListener("click", () => {
      clickEvent("login");
    });
    document.getElementById("signup").addEventListener("click", () => {
      clickEvent("signup");
    });
  }
});
function clickEvent(redirect) {
  window.location.href = "./" + redirect + ".php";
}
