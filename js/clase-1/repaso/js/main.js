// console.log('Hola desde main.js');

var registerForm = document.querySelector('.register-form');
// registerForm.style.background = "tomato";
// registerForm.style.color = "white";

var changeColor = document.querySelector('#changeColor');

changeColor.addEventListener('mouseover', (event) => {
  event.preventDefault();
  registerForm.classList.toggle('bg-tomato');
})

// document.querySelectorAll();
// document.getElementById();
