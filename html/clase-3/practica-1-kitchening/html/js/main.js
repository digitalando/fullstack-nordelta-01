let toggleNav = document.querySelector(".toggle-nav");
let mainNav = document.querySelector(".main-nav");

console.log(toggleNav);
console.log(mainNav);

toggleNav.addEventListener('click', () => {
  mainNav.classList.toggle('active');
})
