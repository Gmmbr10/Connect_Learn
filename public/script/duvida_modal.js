const modal = document.getElementById("modal_duvida");
const close_btn = document.getElementsByClassName("close_duvida");
const open_btn = document.getElementById("open_duvida");

open_btn.addEventListener("click",()=>{
  modal.showModal();
  modal.style.display = "grid";
});

for (let index = 0; index < close_btn.length; index++) {
  close_btn[index].addEventListener("click",()=>{
  modal.style.display = "none";
  modal.close();
  });
}