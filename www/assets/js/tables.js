
let btnDelete = document.querySelectorAll(".btn_delete");
let btnUpdate = document.querySelectorAll(".btn_update");


const delete_item = (id) => {
  let data = {
    item: id,
  };

  let url = `/user/delete`;

  fetch(url, {
    method: "POST",
    headers: {
      'Accept': "application/json",
      'Content-Type': "application/json",
    },
    body: JSON.stringify(data),
  })
    .then(resp => resp.text(), e => {
      console.log("Error", e);
    })
    .then(() => location.reload());

};

btnDelete.forEach(element => {
  element.addEventListener("click", e => {
    delete_item(e.currentTarget.attributes['del'].value);
  });
});

btnUpdate.forEach(element => {
  element.addEventListener("click", e => {
    console.log(e.currentTarget.attributes['upd'].value);
  });
});

