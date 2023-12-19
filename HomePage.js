const mobileMenuButton = document.getElementById("mobile-menu");
const menuList = document.querySelector(".menu");
  
mobileMenuButton.addEventListener("click", function () {
menuList.classList.toggle("show-menu");
})
  