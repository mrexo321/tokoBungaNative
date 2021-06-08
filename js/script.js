const main = document.querySelector(".main");
const bukamenu = document.querySelector(".bukamenu");
const tutupmenu = document.querySelector(".tutupmenu");

bukamenu.addEventListener("click", tampilkan);
tutupmenu.addEventListener("click", tutup);

function tampilkan() {
  main.style.display = "flex";
  main.style.top = "0";
}

function tutup() {
  main.style.top = "-100%";
}

function showmodal(id) {
  var modal = document.querySelector("#modal" + id);
  var modalParent = modal.parentNode;
  console.log(id);
  modalParent.classList.add("tampil");

  window.onclick = function (event) {
    if (event.target == modalParent) {
      modalParent.classList.remove("tampil");
    }
  };
}
