let btnDelete = document.querySelectorAll(".btn_delete");
let btnUpdate = document.querySelectorAll(".btn_update");

btnDelete.forEach(element => {
  element.addEventListener("click", e => {
    delete_item(e.currentTarget.attributes['upd'].value);
  });
});

btnUpdate.forEach(element => {
  element.addEventListener("click", e => {
    console.log(e.currentTarget.attributes['upd'].value);
  });
});


const delete_item = id => {

  let data = {
    item: id
  }

  

  fetch('',{
    method: 'POST',
    body: data
  })
  .then(resp => resp.json)
  .then(json => console.log(json));

}
