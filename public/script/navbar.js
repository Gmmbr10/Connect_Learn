const btn_navbar = document.getElementById("btn_navbar");
const navbar = document.getElementById("navbar");
const main = document.querySelector("body>main");

btn_navbar.addEventListener("click",()=>{
	navbar.classList.toggle("open");
	main.classList.toggle("open_navbar");
});