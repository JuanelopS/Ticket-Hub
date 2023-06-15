let btnDelete = document.querySelectorAll(".btn_delete");
let btnUpdate = document.querySelectorAll(".btn_update");

btnDelete.forEach(element => {
  element.addEventListener("click", e => {
    console.log(e.currentTarget.attributes['del'].value);
  });
});

btnUpdate.forEach(element => {
  element.addEventListener("click", e => {
    console.log(e.currentTarget.attributes['upd'].value);
  });
});
