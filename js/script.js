const toggleButton = document.getElementsByClassName("toggle-button")[0];
const navItems = document.getElementsByClassName("nav-items")[0];

toggleButton.addEventListener("click", () => {
  navItems.classList.toggle("active");
});
