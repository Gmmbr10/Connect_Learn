const open_termos_uso = document.getElementById("open_termos_uso");
const modal_termos_uso = document.getElementById("modal_termos_uso");
const close_termos_uso = document.getElementsByClassName("close_termos_uso");

open_termos_uso.addEventListener("click", () => {

	modal_termos_uso.showModal();
	modal_termos_uso.style.display = "grid";
	modal_termos_uso.style.gridTemplateRows = "auto 1fr auto";

});

for (let i = 0; i < close_termos_uso.length; i++) {

	close_termos_uso[i].addEventListener("click", () => {
		modal_termos_uso.style.display = "none";
		modal_termos_uso.close();
	});

}